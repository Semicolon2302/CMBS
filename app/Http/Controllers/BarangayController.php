<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Barangay; // Ensure you have the Barangay model
use App\Models\HealthFacility; // Import the HealthFacility model
use Maatwebsite\Excel\Facades\Excel; // Import the Excel facade
use App\Exports\BarangayExport;
use App\Models\EducationFacility;
use App\Models\ServicesFacility; 
use App\Models\AgricultureFacility;
use App\Models\WaterFacility; 
use App\Models\ElectricitySource; 
use App\Models\FinancialInstitution;
use App\Models\TouristSite;
use App\Models\WasteDisposalFacility;
use App\Models\TransportationMode;
use App\Models\WifiProvider;
use App\Models\Ict;

class BarangayController extends Controller
{
    public function store(Request $request)
    {
        \Log::info($request->all());
        // Validate the incoming request data for barangay
        $request->validate([
            'region' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city_municipality' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'health_facilities.*.facility_type' => 'required|string', // Validate facility type
            'health_facilities.*.available' => 'required|string', // Validate availability
            'health_facilities.*.distance' => 'nullable|string|max:255', // Validate distance
            'health_facilities.*.name' => 'nullable|string|max:255', // Validate name
            'health_facilities.*.address' => 'nullable|string|max:255', // Validate address
            'health_facilities.*.dimension' => 'nullable|string|max:255', // dimension
            'health_facilities.*.latitude' => 'nullable|string|max:255', 
            'health_facilities.*.longitude' => 'nullable|string|max:255', 
            'health_facilities.*.institution' => 'nullable|string|max:255', // Validate institution
            
            'education_facilities.*.facility_type' => 'required|string', 
            'education_facilities.*.available' => 'required|string', 
            'education_facilities.*.distance' => 'nullable|string|max:255', 
            'education_facilities.*.name' => 'nullable|string|max:255', 
            'education_facilities.*.address' => 'nullable|string|max:255', 
            'education_facilities.*.dimension' => 'nullable|string|max:255', 
            'education_facilities.*.latitude' => 'nullable|string|max:255', 
            'education_facilities.*.longitude' => 'nullable|string|max:255', 
            'education_facilities.*.institution' => 'nullable|string|max:255', 

            'services_facilities.*.facility_type' => 'required|string', 
            'services_facilities.*.available' => 'required|string', 
            'services_facilities.*.distance' => 'nullable|string|max:255', 
            'services_facilities.*.name' => 'nullable|string|max:255', 
            'services_facilities.*.address' => 'nullable|string|max:255', 
            'services_facilities.*.dimension' => 'nullable|string|max:255', 
            'services_facilities.*.latitude' => 'nullable|string|max:255', 
            'services_facilities.*.longitude' => 'nullable|string|max:255', 
            'services_facilities.*.institution' => 'nullable|string|max:255', 

            'agriculture_facilities.*.facility_type' => 'required|string', 
            'agriculture_facilities.*.available' => 'required|string', 
            'agriculture_facilities.*.distance' => 'nullable|string|max:255', 
            'agriculture_facilities.*.name' => 'nullable|string|max:255', 
            'agriculture_facilities.*.address' => 'nullable|string|max:255', 
            'agriculture_facilities.*.dimension' => 'nullable|string|max:255', 
            'agriculture_facilities.*.latitude' => 'nullable|string|max:255', 
            'agriculture_facilities.*.longitude' => 'nullable|string|max:255', 
            'agriculture_facilities.*.institution' => 'nullable|string|max:255',

            'water_facilities.*.facility_type' => 'required|string', 
            'water_facilities.*.available' => 'required|string', 
            'water_facilities.*.distance' => 'nullable|string|max:255', 
            'water_facilities.*.name' => 'nullable|string|max:255', 
            'water_facilities.*.address' => 'nullable|string|max:255', 
            'water_facilities.*.dimension' => 'nullable|string|max:255', 
            'water_facilities.*.latitude' => 'nullable|string|max:255', 
            'water_facilities.*.longitude' => 'nullable|string|max:255', 
            'water_facilities.*.institution' => 'nullable|string|max:255',

            'electricity_sources.*.facility_type' => 'required|string', 
            'electricity_sources.*.available' => 'required|string', 
            'electricity_sources.*.distance' => 'nullable|string|max:255', 
            'electricity_sources.*.name' => 'nullable|string|max:255', 
            'electricity_sources.*.address' => 'nullable|string|max:255', 
            'electricity_sources.*.dimension' => 'nullable|string|max:255', 
            'electricity_sources.*.latitude' => 'nullable|string|max:255', 
            'electricity_sources.*.longitude' => 'nullable|string|max:255', 
            'electricity_sources.*.institution' => 'nullable|string|max:255',

            'financial_institutions.*.facility_type' => 'required|string', 
            'financial_institutions.*.available' => 'required|string', 
            'financial_institutions.*.distance' => 'nullable|string|max:255', 
            'financial_institutions.*.name' => 'nullable|string|max:255', 
            'financial_institutions.*.address' => 'nullable|string|max:255', 
            'financial_institutions.*.dimension' => 'nullable|string|max:255', 
            'financial_institutions.*.latitude' => 'nullable|string|max:255', 
            'financial_institutions.*.longitude' => 'nullable|string|max:255', 
            'financial_institutions.*.institution' => 'nullable|string|max:255',

            'tourist_sites.*.facility_type' => 'required|string', 
            'tourist_sites.*.available' => 'required|string', 
            'tourist_sites.*.distance' => 'nullable|string|max:255', 
            'tourist_sites.*.name' => 'nullable|string|max:255', 
            'tourist_sites.*.address' => 'nullable|string|max:255', 
            'tourist_sites.*.dimension' => 'nullable|string|max:255', 
            'tourist_sites.*.latitude' => 'nullable|string|max:255', 
            'tourist_sites.*.longitude' => 'nullable|string|max:255', 
            'tourist_sites.*.institution' => 'nullable|string|max:255',

            'waste_disposal_facilities.*.facility_type' => 'required|string', 
            'waste_disposal_facilities.*.available' => 'required|string', 
            'waste_disposal_facilities.*.distance' => 'nullable|string|max:255', 
            'waste_disposal_facilities.*.name' => 'nullable|string|max:255', 
            'waste_disposal_facilities.*.address' => 'nullable|string|max:255', 
            'waste_disposal_facilities.*.dimension' => 'nullable|string|max:255', 
            'waste_disposal_facilities.*.latitude' => 'nullable|string|max:255', 
            'waste_disposal_facilities.*.longitude' => 'nullable|string|max:255', 
            'waste_disposal_facilities.*.institution' => 'nullable|string|max:255',

            'transportation_modes.*.mode_of_transpo' => 'required|string', 
            'transportation_modes.*.available' => 'required|string', 
            'transportation_modes.*.other' => 'nullable|string|max:255', 

            'icts.*.ict_q' => 'required|string', 
            'icts.*.available' => 'required|string', 
            'icts.*.existing' => 'nullable|string|max:255',

            'wifi_providers.*.provider' => 'nullable|string|max:255', 
        ]);

        // Check if we are updating an existing barangay
        if ($request->filled('id')) {
            
            $barangay = Barangay::findOrFail($request->input('id'));
            $barangay->update($request->except('_token', 'id'));
        } else {
            $barangay = Barangay::create($request->except('_token'));
            // \Log::info('Saving Barangay...');

        }
        // \Log::info('Barangay saved', ['barangay' => $barangay]);

        // Handle the health facility data
        if ($request->has('health_facilities')) {
            
            foreach ($request->input('health_facilities') as $facility) {
                // \Log::info($facility);
                // Create a data array for the health facility
                $facilityData = [
                    'barangay_id' => $barangay->id, // Associate with the barangay
                    'facility_type' => $facility['facility_type'], // Facility type
                    'available' => isset($facility['available']) && $facility['available'] === 'yes', // Availability; provide a default value to avoid undefined index
                    'distance' => $facility['distance'] ?? null, // Generic distance
                    'name' => $facility['name'] ?? null, // Generic name
                    'address' => $facility['address'] ?? null, // Generic address
                    'dimension' => $facility['dimension'] ?? null, // Generic dimension
                    'latitude' => $facility['latitude'] ?? null,
                    'longitude' => $facility['longitude'] ?? null,
                    'institution' => $facility['institution'] ?? null, // Generic institution

                ];
        
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $healthFacility = HealthFacility::findOrFail($facility['id']);
                    $healthFacility->update($facilityData);
                } else {
                    // Create a new health facility
                    HealthFacility::create($facilityData);
                }
            }
        }
        if ($request->has('education_facilities')) {
            foreach ($request->input('education_facilities') as $facility) {
                // Create a data array for the education facility
                $facilityData = [
                    'barangay_id' => $barangay->id, // Associate with the barangay
                    'facility_type' => $facility['facility_type'], // Facility type
                    'available' => isset($facility['available']) && $facility['available'] === 'yes', // Availability; provide a default value to avoid undefined index
                    'distance' => $facility['distance'] ?? null, // Generic distance
                    'name' => $facility['name'] ?? null, // Generic name
                    'address' => $facility['address'] ?? null, // Generic address
                    'dimension' => $facility['dimension'] ?? null, // Generic dimension
                    'latitude' => $facility['latitude'] ?? null,
                    'longitude' => $facility['longitude'] ?? null,
                    'institution' => $facility['institution'] ?? null, // Generic institution
                ];
        
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing education facility
                    $educationFacility = EducationFacility::findOrFail($facility['id']);
                    $educationFacility->update($facilityData);
                } else {
                    // Create a new education facility
                    EducationFacility::create($facilityData);
                }
            }
        }
        if ($request->has('services_facilities')) {
            // \Log::info($facility);
            foreach ($request->input('services_facilities') as $facility) {
                // Create a data array for the education facility
                $facilityData = [
                    'barangay_id' => $barangay->id, // Associate with the barangay
                    'facility_type' => $facility['facility_type'], // Facility type
                    'available' => isset($facility['available']) && $facility['available'] === 'yes', // Availability; provide a default value to avoid undefined index
                    'distance' => $facility['distance'] ?? null, // Generic distance
                    'name' => $facility['name'] ?? null, // Generic name
                    'address' => $facility['address'] ?? null, // Generic address
                    'dimension' => $facility['dimension'] ?? null, // Generic dimension
                    'latitude' => $facility['latitude'] ?? null,
                    'longitude' => $facility['longitude'] ?? null,
                    'institution' => $facility['institution'] ?? null, // Generic institution
                ];
        
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing education facility
                    $servicesFacility = ServicesFacility::findOrFail($facility['id']);
                    $servicesFacility->update($facilityData);
                } else {
                    // Create a new education facility
                    ServicesFacility::create($facilityData);
                }
            }
        }
        if ($request->has('agriculture_facilities')) {
            foreach ($request->input('agriculture_facilities') as $facility) {
                // Create a data array for the education facility
                $facilityData = [
                    'barangay_id' => $barangay->id, // Associate with the barangay
                    'facility_type' => $facility['facility_type'], // Facility type
                    'available' => isset($facility['available']) && $facility['available'] === 'yes', // Availability; provide a default value to avoid undefined index
                    'distance' => $facility['distance'] ?? null, // Generic distance
                    'name' => $facility['name'] ?? null, // Generic name
                    'address' => $facility['address'] ?? null, // Generic address
                    'dimension' => $facility['dimension'] ?? null, // Generic dimension
                    'latitude' => $facility['latitude'] ?? null,
                    'longitude' => $facility['longitude'] ?? null,
                    'institution' => $facility['institution'] ?? null, // Generic institution
                ];
        
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing education facility
                    $agricultureFacility = AgricultureFacility::findOrFail($facility['id']);
                    $agricultureFacility->update($facilityData);
                } else {
                    // Create a new education facility
                    AgricultureFacility::create($facilityData);
                }
            }
        }
        if ($request->has('water_facilities')) {
            foreach ($request->input('water_facilities') as $facility) {
                // Create a data array for the education facility
                $facilityData = [
                    'barangay_id' => $barangay->id, // Associate with the barangay
                    'facility_type' => $facility['facility_type'], // Facility type
                    'available' => isset($facility['available']) && $facility['available'] === 'yes', // Availability; provide a default value to avoid undefined index
                    'distance' => $facility['distance'] ?? null, // Generic distance
                    'name' => $facility['name'] ?? null, // Generic name
                    'address' => $facility['address'] ?? null, // Generic address
                    'dimension' => $facility['dimension'] ?? null, // Generic dimension
                    'latitude' => $facility['latitude'] ?? null,
                    'longitude' => $facility['longitude'] ?? null,
                    'institution' => $facility['institution'] ?? null, // Generic institution
                ];
        
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing education facility
                    $waterFacility = WaterFacility::findOrFail($facility['id']);
                    $waterFacility->update($facilityData);
                } else {
                    // Create a new education facility
                    WaterFacility::create($facilityData);
                }
            }
        }
        if ($request->has('electricity_sources')) {
            foreach ($request->input('electricity_sources') as $facility) {
                // Create a data array for the education facility
                $facilityData = [
                    'barangay_id' => $barangay->id, // Associate with the barangay
                    'facility_type' => $facility['facility_type'], // Facility type
                    'available' => isset($facility['available']) && $facility['available'] === 'yes', // Availability; provide a default value to avoid undefined index
                    'distance' => $facility['distance'] ?? null, // Generic distance
                    'name' => $facility['name'] ?? null, // Generic name
                    'address' => $facility['address'] ?? null, // Generic address
                    'dimension' => $facility['dimension'] ?? null, // Generic dimension
                    'latitude' => $facility['latitude'] ?? null,
                    'longitude' => $facility['longitude'] ?? null,
                    'institution' => $facility['institution'] ?? null, // Generic institution
                ];
        
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing education facility
                    $electricitySources = ElectricitySource::findOrFail($facility['id']);
                    $electricitySources->update($facilityData);
                } else {
                    // Create a new education facility
                    ElectricitySource::create($facilityData);
                }
            }
        }if ($request->has('financial_institutions')) {
            foreach ($request->input('financial_institutions') as $facility) {
                // Create a data array for the education facility
                $facilityData = [
                    'barangay_id' => $barangay->id, // Associate with the barangay
                    'facility_type' => $facility['facility_type'], // Facility type
                    'available' => isset($facility['available']) && $facility['available'] === 'yes', // Availability; provide a default value to avoid undefined index
                    'distance' => $facility['distance'] ?? null, // Generic distance
                    'name' => $facility['name'] ?? null, // Generic name
                    'address' => $facility['address'] ?? null, // Generic address
                    'dimension' => $facility['dimension'] ?? null, // Generic dimension
                    'latitude' => $facility['latitude'] ?? null,
                    'longitude' => $facility['longitude'] ?? null,
                    'institution' => $facility['institution'] ?? null, // Generic institution
                ];
        
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing education facility
                    $financialInstitutions = FinancialInstitution::findOrFail($facility['id']);
                    $financialInstitutions->update($facilityData);
                } else {
                    // Create a new education facility
                    FinancialInstitution::create($facilityData);
                }
            }
        }
        if ($request->has('tourist_sites')) {
            foreach ($request->input('tourist_sites') as $facility) {
                // Create a data array for the education facility
                $facilityData = [
                    'barangay_id' => $barangay->id, // Associate with the barangay
                    'facility_type' => $facility['facility_type'], // Facility type
                    'available' => isset($facility['available']) && $facility['available'] === 'yes', // Availability; provide a default value to avoid undefined index
                    'distance' => $facility['distance'] ?? null, // Generic distance
                    'name' => $facility['name'] ?? null, // Generic name
                    'address' => $facility['address'] ?? null, // Generic address
                    'dimension' => $facility['dimension'] ?? null, // Generic dimension
                    'latitude' => $facility['latitude'] ?? null,
                    'longitude' => $facility['longitude'] ?? null,
                    'institution' => $facility['institution'] ?? null, // Generic institution
                ];
        
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing education facility
                    $touristSites = TouristSite::findOrFail($facility['id']);
                    $touristSites->update($facilityData);
                } else {
                    // Create a new education facility
                    TouristSite::create($facilityData);
                }
            }
        }
        if ($request->has('waste_disposal_facilities')) {
            foreach ($request->input('waste_disposal_facilities') as $facility) {
                // Create a data array for the education facility
                $facilityData = [
                    'barangay_id' => $barangay->id, // Associate with the barangay
                    'facility_type' => $facility['facility_type'], // Facility type
                    'available' => isset($facility['available']) && $facility['available'] === 'yes', // Availability; provide a default value to avoid undefined index
                    'distance' => $facility['distance'] ?? null, // Generic distance
                    'name' => $facility['name'] ?? null, // Generic name
                    'address' => $facility['address'] ?? null, // Generic address
                    'dimension' => $facility['dimension'] ?? null, // Generic dimension
                    'latitude' => $facility['latitude'] ?? null,
                    'longitude' => $facility['longitude'] ?? null,
                    'institution' => $facility['institution'] ?? null, // Generic institution
                ];
        
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing education facility
                    $wasteDisposalFacilities = WasteDisposalFacility::findOrFail($facility['id']);
                    $wasteDisposalFacilities->update($facilityData);
                } else {
                    // Create a new education facility
                    WasteDisposalFacility::create($facilityData);
                }
            }
        }
        if ($request->has('transportation_modes')) {
            foreach ($request->input('transportation_modes') as $facility) {
                Log::info('Processing Facility:', $facility);
    
                $facilityData = [
                    'barangay_id' => $barangay->id, 
                    'mode_of_transpo' => $facility['mode_of_transpo'], 
                    'available' => isset($facility['available']) && $facility['available'] === 'yes', 
                    'other' => $facility['other'] ?? null, 
                ];
    
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing education facility
                    $transportationModes = TransportationMode::findOrFail($facility['id']);
                    $transportationModes->update($facilityData);
                } else {
                    Log::info('Facility Data to Save:', $facilityData);
                    // Create a new education facility
                    TransportationMode::create($facilityData);
                }
            }
        }
        if ($request->has('icts')) {
            foreach ($request->input('icts') as $facility) {
    
                $facilityData = [
                    'barangay_id' => $barangay->id, 
                    'ict_q' => $facility['ict_q'], 
                    'available' => isset($facility['available']) && $facility['available'] === 'yes', 
                    'existing' => $facility['existing'] ?? null, 
                ];
    
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing education facility
                    $ictsQ = Ict::findOrFail($facility['id']);
                    $ictsQ->update($facilityData);
                } else {

                    // Create a new education facility
                    Ict::create($facilityData);
                }
            }
        }
        if ($request->has('wifi_providers')) {
            foreach ($request->input('wifi_providers') as $facility) {
    
                $facilityData = [
                    'barangay_id' => $barangay->id, 
                    'question' => $facility['question'], 
                    'provider' => $facility['provider']?? null, 
                ];
    
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing education facility
                    $wifiprovider = WifiProvider::findOrFail($facility['id']);
                    $wifiprovider->update($facilityData);
                } else {
                    // Create a new education facility
                    WifiProvider::create($facilityData);
                }
            }
        }
        return redirect()->back()->with('success', 'Data saved successfully!');
    }
    // -------------------------------------------------------------------------------------------export
    public function export()
    {
        return Excel::download(new BarangayExport, 'barangays.csv');
    }
    // -------------------------------------------------------------------------------------------admindl
    public function adminDownload()
    {
        return view('admin.download'); // Create this view in the next step
    }
    // -------------------------------------------------------------------------------------------search
    public function search(Request $request)
    {
        // Fetch the query parameter from the request
        $query = $request->input('query');

        // Search the 'barangays' table for matching names
        $barangays = Barangay::where('barangay', 'LIKE', "%{$query}%")->get();

        // Return the results as a JSON response
        return response()->json($barangays);
    }
    // -------------------------------------------------------------------------------------------edit
    public function edit($id) {
        // Fetch the barangay along with all related facilities
        $barangay = Barangay::with([
            'healthFacilities',
            'educationFacilities',    // Eager load education facilities
            'waterFacilities',        // Eager load water facilities
            'electricitySources',      // Eager load electricity sources
        ])->findOrFail($id);
    
        // Return the edit view with barangay and all facilities data
        return view('edit', [
            'barangay' => $barangay,
            'healthFacilities' => $barangay->healthFacilities,
            'educationFacilities' => $barangay->educationFacilities,  // Pass education facilities
            'waterFacilities' => $barangay->waterFacilities,          // Pass water facilities
            'electricitySources' => $barangay->electricitySources     // Pass electricity sources
        ]);
    }
    
    // -------------------------------------------------------------------------------------------update
    public function update(Request $request, $id) {
        // Validate barangay info
        $request->validate([
            'region' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city_municipality' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
        ]);
    
        // Fetch the barangay
        $barangay = Barangay::findOrFail($id);
        
        // Update the barangay information
        $barangay->update($request->except('_token', 'health_facilities','education_facilities','services_facilities','water_facilities','electricity_sources','financial_institutions', 'id'));
    
        // Handle health facilities updates
        if ($request->has('health_facilities')) {
            foreach ($request->input('health_facilities') as $facility) {
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $healthFacility = HealthFacility::findOrFail($facility['id']);
                    $healthFacility->update([
                        'facility_type' => $facility['facility_type'],
                        'available' => isset($facility['available']) && $facility['available'] === 'yes',
                        'distance' => $facility['distance'] ?? null,
                        'name' => $facility['name'] ?? null,
                        'address' => $facility['address'] ?? null,
                        'dimension' => $facility['dimension'] ?? null,
                        'latitude' => $facility['latitude'] ?? null,
                        'longitude' => $facility['longitude'] ?? null,
                        'institution' => $facility['institution'] ?? null,
                    ]);
                } else {
                    // Optionally handle new facilities here if needed
                    
                }
            }
        }if ($request->has('education_facilities')) {
            foreach ($request->input('education_facilities') as $facility) {
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $educationFacility = EducationFacility::findOrFail($facility['id']);
                    $educationFacility->update([
                        'facility_type' => $facility['facility_type'],
                        'available' => isset($facility['available']) && $facility['available'] === 'yes',
                        'distance' => $facility['distance'] ?? null,
                        'name' => $facility['name'] ?? null,
                        'address' => $facility['address'] ?? null,
                        'dimension' => $facility['dimension'] ?? null,
                        'latitude' => $facility['latitude'] ?? null,
                        'longitude' => $facility['longitude'] ?? null,
                        'institution' => $facility['institution'] ?? null,
                    ]);
                } else {
                    // Optionally handle new facilities here if needed
                }
            }
        }
        if ($request->has('services_facilities')) {
            foreach ($request->input('services_facilities') as $facility) {
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $servicesFacility = ServicesFacility::findOrFail($facility['id']);
                    $servicesFacility->update([
                        'facility_type' => $facility['facility_type'],
                        'available' => isset($facility['available']) && $facility['available'] === 'yes',
                        'distance' => $facility['distance'] ?? null,
                        'name' => $facility['name'] ?? null,
                        'address' => $facility['address'] ?? null,
                        'dimension' => $facility['dimension'] ?? null,
                        'latitude' => $facility['latitude'] ?? null,
                        'longitude' => $facility['longitude'] ?? null,
                        'institution' => $facility['institution'] ?? null,
                    ]);
                } else {
                    // Optionally handle new facilities here if needed
                }
            }
        }if ($request->has('agriculture_facilities')) {
            foreach ($request->input('agriculture_facilities') as $facility) {
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $agricultureFacility = AgricultureFacility::findOrFail($facility['id']);
                    $agricultureFacility->update([
                        'facility_type' => $facility['facility_type'],
                        'available' => isset($facility['available']) && $facility['available'] === 'yes',
                        'distance' => $facility['distance'] ?? null,
                        'name' => $facility['name'] ?? null,
                        'address' => $facility['address'] ?? null,
                        'dimension' => $facility['dimension'] ?? null,
                        'latitude' => $facility['latitude'] ?? null,
                        'longitude' => $facility['longitude'] ?? null,
                        'institution' => $facility['institution'] ?? null,
                    ]);
                } else {
                    // Optionally handle new facilities here if needed
                }
            }
        }if ($request->has('water_facilities')) {
            foreach ($request->input('water_facilities') as $facility) {
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $waterFacility = WaterFacility::findOrFail($facility['id']);
                    $waterFacility->update([
                        'facility_type' => $facility['facility_type'],
                        'available' => isset($facility['available']) && $facility['available'] === 'yes',
                        'distance' => $facility['distance'] ?? null,
                        'name' => $facility['name'] ?? null,
                        'address' => $facility['address'] ?? null,
                        'dimension' => $facility['dimension'] ?? null,
                        'latitude' => $facility['latitude'] ?? null,
                        'longitude' => $facility['longitude'] ?? null,
                        'institution' => $facility['institution'] ?? null,
                    ]);
                } else {
                    // Optionally handle new facilities here if needed
                }
            }
        }
        if ($request->has('electricity_sources')) {
            foreach ($request->input('electricity_sources') as $facility) {
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $electricitySources = ElectricitySource::findOrFail($facility['id']);
                    $electricitySources->update([
                        'facility_type' => $facility['facility_type'],
                        'available' => isset($facility['available']) && $facility['available'] === 'yes',
                        'distance' => $facility['distance'] ?? null,
                        'name' => $facility['name'] ?? null,
                        'address' => $facility['address'] ?? null,
                        'dimension' => $facility['dimension'] ?? null,
                        'latitude' => $facility['latitude'] ?? null,
                        'longitude' => $facility['longitude'] ?? null,
                        'institution' => $facility['institution'] ?? null,
                    ]);
                } else {
                    // Optionally handle new facilities here if needed
                }
            }
        }
        if ($request->has('financial_institutions')) {
            foreach ($request->input('financial_institutions') as $facility) {
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $financialInstitutions = FinancialInstitution::findOrFail($facility['id']);
                    $financialInstitutions->update([
                        'facility_type' => $facility['facility_type'],
                        'available' => isset($facility['available']) && $facility['available'] === 'yes',
                        'distance' => $facility['distance'] ?? null,
                        'name' => $facility['name'] ?? null,
                        'address' => $facility['address'] ?? null,
                        'dimension' => $facility['dimension'] ?? null,
                        'latitude' => $facility['latitude'] ?? null,
                        'longitude' => $facility['longitude'] ?? null,
                        'institution' => $facility['institution'] ?? null,
                    ]);
                } else {
                    // Optionally handle new facilities here if needed
                }
            }
        }
        if ($request->has('tourist_sites')) {
            foreach ($request->input('tourist_sites') as $facility) {
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $touristSites = TouristSite::findOrFail($facility['id']);
                    $touristSites->update([
                        'facility_type' => $facility['facility_type'],
                        'available' => isset($facility['available']) && $facility['available'] === 'yes',
                        'distance' => $facility['distance'] ?? null,
                        'name' => $facility['name'] ?? null,
                        'address' => $facility['address'] ?? null,
                        'dimension' => $facility['dimension'] ?? null,
                        'latitude' => $facility['latitude'] ?? null,
                        'longitude' => $facility['longitude'] ?? null,
                        'institution' => $facility['institution'] ?? null,
                    ]);
                } else {
                    // Optionally handle new facilities here if needed
                }
            }
        }
        if ($request->has('waste_disposal_facilities')) {
            foreach ($request->input('waste_disposal_facilities') as $facility) {
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $wasteDisposalFacilities = WasteDisposalFacility::findOrFail($facility['id']);
                    $wasteDisposalFacilities->update([
                        'facility_type' => $facility['facility_type'],
                        'available' => isset($facility['available']) && $facility['available'] === 'yes',
                        'distance' => $facility['distance'] ?? null,
                        'name' => $facility['name'] ?? null,
                        'address' => $facility['address'] ?? null,
                        'dimension' => $facility['dimension'] ?? null,
                        'latitude' => $facility['latitude'] ?? null,
                        'longitude' => $facility['longitude'] ?? null,
                        'institution' => $facility['institution'] ?? null,
                    ]);
                } else {
                    // Optionally handle new facilities here if needed
                }
            }
        }
        if ($request->has('transportation_modes')) {
            foreach ($request->input('transportation_modes') as $facility) {
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $transportationModes = TransportationMode::findOrFail($facility['id']);
                    $transportationModes->update([
                        
                        'available' => isset($facility['available']) && $facility['available'] === 'yes',
                    ]);
                } else {
                    // Optionally handle new facilities here if needed
                }
            }
        }
        if ($request->has('icts')) {
            foreach ($request->input('icts') as $facility) {
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $ictsQ = Ict::findOrFail($facility['id']);
                    $ictsQ->update([
                        'ict_q' => $facility['ict_q'],
                        'available' => isset($facility['available']) && $facility['available'] === 'yes',
                        'existing' => $facility['existing'] ?? null,
                    ]);
                } else {
                    // Optionally handle new facilities here if needed
                }
            }
        }
        if ($request->has('wifi_providers')) {
            foreach ($request->input('wifi_providers') as $facility) {
                if (isset($facility['id']) && !empty($facility['id'])) {
                    // Update existing health facility
                    $wifiprovider = WifiProvider::findOrFail($facility['id']);
                    $wifiprovider->update([
                    'question' => $facility['question'], 
                    'provider' => $facility['provider']?? null
                    ]);
                } else {
                    // Optionally handle new facilities here if needed
                }
            }
        }


        return redirect()->route('barangay.input')->with('success', 'Barangay Information updated successfully!');
    }    
}
