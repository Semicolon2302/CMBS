<?php

namespace App\Exports;

use App\Models\Barangay;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BarangayExport1 implements FromCollection, WithHeadings, WithEvents
{
    public function collection()
    {
        // Retrieve all barangay data along with their associated facilities
        $barangays = Barangay::with(['healthFacilities', 'educationFacilities'])->get();
        $exportData = [];

        foreach ($barangays as $barangay) {
            $barangayInfo = [
                $barangay->id,
                $barangay->region,
                $barangay->province,
                $barangay->city_municipality,
                $barangay->barangay,
            ];

            // Process health and education facilities
            $this->processFacilities($barangayInfo, $barangay->healthFacilities, 'Health Facilities', $exportData);
            $this->processFacilities($barangayInfo, $barangay->educationFacilities, 'Education Facilities', $exportData);
        }

        return collect($exportData);
    }

    private function processFacilities($barangayInfo, $facilities, $section, &$exportData)
    {
        if ($facilities->isNotEmpty()) {
            foreach ($facilities as $index => $facility) {
                // For the first facility, include barangay info
                if ($index === 0) {
                    $exportData[] = array_merge($barangayInfo, [
                        $section,
                        $facility->facility_type,
                        $facility->available ? 'Yes' : 'No',
                        $facility->distance ?? 'N/A',
                        $facility->name ?? 'N/A',
                        $facility->address ?? 'N/A',
                        $facility->remarks ?? 'N/A',
                    ]);
                } else {
                    // For subsequent facilities, leave barangay info blank
                    $exportData[] = array_merge(array_fill(0, 5, ''), [
                        '', // Section will be merged later
                        $facility->facility_type,
                        $facility->available ? 'Yes' : 'No',
                        $facility->distance ?? 'N/A',
                        $facility->name ?? 'N/A',
                        $facility->address ?? 'N/A',
                        $facility->remarks ?? 'N/A',
                    ]);
                }
            }
        } else {
            // If no facilities are available, add placeholder rows
            $exportData[] = array_merge($barangayInfo, [
                $section,
                'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A',
            ]);
        }
    }

    public function headings(): array
    {
        return [
            'ID',
            'Region',
            'Province',
            'City/Municipality',
            'Barangay',
            'Section',
            'Facility Type',
            'Available',
            'Distance',
            'Name of Facility',
            'Address',
            'Remarks',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;
                $rowIndex = 2; // Start after the header
                $barangays = Barangay::with(['healthFacilities', 'educationFacilities'])->get();

                foreach ($barangays as $barangay) {
                    $startRow = $rowIndex;
                    $rowCount = $barangay->healthFacilities->count() + $barangay->educationFacilities->count();

                    // Merge barangay info across rows
                    $sheet->mergeCells("A{$startRow}:A" . ($startRow + $rowCount - 1));
                    $sheet->mergeCells("B{$startRow}:B" . ($startRow + $rowCount - 1));
                    $sheet->mergeCells("C{$startRow}:C" . ($startRow + $rowCount - 1));
                    $sheet->mergeCells("D{$startRow}:D" . ($startRow + $rowCount - 1));
                    $sheet->mergeCells("E{$startRow}:E" . ($startRow + $rowCount - 1));

                    // Merge section column for each section
                    if ($barangay->healthFacilities->count() > 0) {
                        $healthFacilityRows = $barangay->healthFacilities->count();
                        $sheet->mergeCells("F{$startRow}:F" . ($startRow + $healthFacilityRows - 1));
                        $sheet->getStyle("A{$startRow}:F" . ($startRow + $healthFacilityRows - 1))
                            ->getAlignment()->setHorizontal('center')
                            ->setVertical('center');
                    }

                    if ($barangay->educationFacilities->count() > 0) {
                        $educationFacilityRows = $barangay->educationFacilities->count();
                        $sheet->mergeCells("F" . ($startRow + $healthFacilityRows) . ":F" . ($startRow + $rowCount - 1));
                        $sheet->getStyle("A{$startRow}:F" . ($startRow + $rowCount - 1))
                            ->getAlignment()->setHorizontal('center')
                            ->setVertical('center');
                    }

                    $rowIndex += $rowCount;
                }
            }
        ];
    }
}
