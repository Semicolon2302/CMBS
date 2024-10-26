<?php

namespace App\Exports;

use App\Models\Barangay;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BarangayExport implements FromCollection, WithHeadings, WithEvents
{
    protected $exportData = []; // Store export data here

    public function collection()
    {
        // Collect all barangay data with all facility types
        $barangays = Barangay::with(['healthFacilities', 'educationFacilities', 'servicesFacilities', 'agricultureFacilities',
        'waterFacilities','electricitySources','financialInstitutions','wasteDisposalFacilities','touristSites','transportationModes',
        'ictsQ','wifi_providers'])->get();

        foreach ($barangays as $barangay) {
            // Gather barangay information
            $barangayInfo = [
                $barangay->id,
                $barangay->region,
                $barangay->province,
                $barangay->city_municipality,
                $barangay->barangay,
            ];

            // Count the total facilities across all sections for merging
            $totalFacilities = 0;

            // Process health facilities
            $totalFacilities += $this->processFacilities($barangayInfo, $barangay->healthFacilities, 'Health Facilities');

            // Process education facilities
            $totalFacilities += $this->processFacilities($barangayInfo, $barangay->educationFacilities, 'Education Facilities');

            // Process services facilities
            $totalFacilities += $this->processFacilities($barangayInfo, $barangay->servicesFacilities, 'Services Facilities');

            // Process agriculture facilities
            $totalFacilities += $this->processFacilities($barangayInfo, $barangay->agricultureFacilities, 'Agriculture Facilities');

            // Process water facilities
            $totalFacilities += $this->processFacilities($barangayInfo, $barangay->waterFacilities, 'Water Facilities');

            // Process electricity sources
            $totalFacilities += $this->processFacilities($barangayInfo, $barangay->electricitySources, 'Electricity Sources');

            // Process financial institutions
            $totalFacilities += $this->processFacilities($barangayInfo, $barangay->financialInstitutions, 'Financial Institutions');

            // Process waste disposal facilities
            $totalFacilities += $this->processFacilities($barangayInfo, $barangay->wasteDisposalFacilities, 'Waste Disposal Facilities');

            // Process tourist sites
            $totalFacilities += $this->processFacilities($barangayInfo, $barangay->touristSites, 'Tourist Sites');

            // Process transportation modes
            $totalFacilities += $this->processFacilities($barangayInfo, $barangay->transportationModes, 'Mode of Transportation');

            $totalFacilities += $this->processICT($barangayInfo, $barangay->ictsQ, $barangay->wifi_providers, 'ICT Facilities');


            // Adjust for merging
            if ($totalFacilities > 0) {
                // Merge barangay info for the rows added
                $this->mergeBarangayInfo(count($this->exportData) - $totalFacilities, $totalFacilities);
            }
        }

        return collect($this->exportData);
    }

    private function processFacilities($barangayInfo, $facilities, $section)
    {
        $facilityCount = 0; // Count of facilities in the current section

        if ($facilities !== null && $facilities->isNotEmpty()) {
            foreach ($facilities as $index => $facility) {
                // For the first facility, include barangay info
                if ($index === 0) {
                    $this->exportData[] = array_merge($barangayInfo, [
                        $section,
                        $facility->facility_type,
                        $facility->available ? 'Yes' : 'No',
                        $facility->distance ?? 'N/A',
                        $facility->name ?? 'N/A',
                        $facility->address ?? 'N/A',
                        $facility->dimension ?? 'N/A',
                        $facility->latitude ?? 'N/A',
                        $facility->longitude ?? 'N/A',
                    ]);
                } else {
                    // For subsequent facilities, keep barangay info but clear certain fields
                    $this->exportData[] = array_merge(array_fill(0, 5, ''), [
                        '',
                        $facility->facility_type,
                        $facility->available ? 'Yes' : 'No',
                        $facility->distance ?? 'N/A',
                        $facility->name ?? 'N/A',
                        $facility->address ?? 'N/A',
                        $facility->dimension ?? 'N/A',
                        $facility->latitude ?? 'N/A',
                        $facility->longitude ?? 'N/A',
                    ]);
                }
                $facilityCount++;
            }
        } else {
            // If no facilities are available, just add the barangay row with N/A for facilities
            $this->exportData[] = array_merge($barangayInfo, [
                $section,
                'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'
            ]);
        }

        return $facilityCount; // Return the count of facilities added
    }
    private function processTransportation($barangayInfo, $transpoModes, $section)
    {
        $facilityCount = 0; // To count transportation modes
    
        $transportationTypes = ['Jeepney', 'Tricycle', 'Pedicab', 'Motorized Banca']; // Add types of transportation here
    
        foreach ($transportationTypes as $type) {
            // Find the corresponding entry in the transportationModes
            $availableMode = $transpoModes->firstWhere('mode_of_transpo', $type);
    
            // If availableMode is null, the transport is not available, so show "No" and N/A
            if ($availableMode) {
                $this->exportData[] = array_merge($barangayInfo, [
                    $section,
                    $type,
                    $availableMode->available ? 'Yes' : 'No',
                    'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A',
                ]);
            } else {
                $this->exportData[] = array_merge($barangayInfo, [
                    $section,
                    $type,
                    'No',
                    'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A',
                ]);
            }
            $facilityCount++;
        }
    
        return $facilityCount;
    }
    
   private function processICT($barangayInfo, $ictFacilities, $wifiProviders, $section)
    {
        $facilityCount = 0;

        // Process ICT Questions (ictsQ)
        if ($ictFacilities !== null && $ictFacilities->isNotEmpty()) {
            foreach ($ictFacilities as $index => $ict) {
                $this->exportData[] = array_merge($barangayInfo, [
                    $section,
                    'ICT Facility',
                    $ict->ict_q ?? 'N/A',
                    $ict->available ? 'Yes' : 'No',
                    'what/how many/ coverage',
                    $ict->existing ?? 'N/A',
                     // Assuming ict_q represents some question/field for ICT
                    '', '', '', // Empty placeholders for dimensions, latitude, longitude
                ]);
                $facilityCount++;
            }
        }

        // Process WiFi Providers (wifi_providers)
        if ($wifiProviders !== null && $wifiProviders->isNotEmpty()) {
            foreach ($wifiProviders as $index => $wifi) {
                $this->exportData[] = array_merge($barangayInfo, [
                    $section,
                    'WiFi Provider',
                    $wifi->question ?? 'N/A',
                    $wifi->provider ?? 'N/A',  // Assuming provider_name is a field in wifi_providers
                    
                    '', '', '', // Empty placeholders for dimensions, latitude, longitude
                ]);
                $facilityCount++;
            }
        } 

        // If no ICT facilities are available, just add the barangay row with N/A for ICT section
        if ($facilityCount === 0) {
            $this->exportData[] = array_merge($barangayInfo, [
                $section,
                'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'
            ]);
        }

        return $facilityCount;
    }

    private function mergeBarangayInfo($startIndex, $rowCount)
    {
        for ($i = 0; $i < $rowCount; $i++) {
            if ($i > 0) {
                // Clear barangay info for subsequent rows
                $this->exportData[$startIndex + $i][0] = ''; // ID
                $this->exportData[$startIndex + $i][1] = ''; // Region
                $this->exportData[$startIndex + $i][2] = ''; // Province
                $this->exportData[$startIndex + $i][3] = ''; // City/Municipality
                $this->exportData[$startIndex + $i][4] = ''; // Barangay
            }
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
            'Distance to Brgy Hall',
            'Name of Facility',
            'Address',
            'Dimension',
            'Latitude',
            'Longitude',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Start merging from row 2
                $rowIndex = 2; // Adjust based on your starting row for data

                // Loop through the export data to merge rows
                foreach ($this->exportData as $index => $data) {
                    // Count the total facilities for the current barangay
                    $totalFacilities = 0; // Add logic here to count rows per barangay

                    if ($totalFacilities > 1) {
                        $sheet->mergeCells("A{$rowIndex}:A" . ($rowIndex + $totalFacilities - 1));
                        $sheet->mergeCells("B{$rowIndex}:B" . ($rowIndex + $totalFacilities - 1));
                        $sheet->mergeCells("C{$rowIndex}:C" . ($rowIndex + $totalFacilities - 1));
                        $sheet->mergeCells("D{$rowIndex}:D" . ($rowIndex + $totalFacilities - 1));
                        $sheet->mergeCells("E{$rowIndex}:E" . ($rowIndex + $totalFacilities - 1));

                        $rowIndex += $totalFacilities;
                    } else {
                        $rowIndex++;
                    }
                }
            },
        ];
    }
}
