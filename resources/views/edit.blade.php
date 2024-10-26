
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/sass/edit.scss'])
    <title>CBMS</title>
</head>
<body>
    <div class="form-container">
        <form method="POST" action="{{ route('barangay.update', $barangay->id) }}">
            @csrf <!-- CSRF token -->
            @method('PUT')
            <input type="hidden" name="id" id="barangay_id" value="{{ $barangay->id ?? '' }}"> <!-- Hidden ID field for editing -->
            <div class="two-column-layout "> <!-- First category shown by default -->
                <div class="form-group">
                    <label for="region">Region</label>
                    <input type="text" name="region" id="region" required value="{{ $barangay->region ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="province">Province</label>
                    <input type="text" name="province" id="province" required value="{{ $barangay->province ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="city_municipality">City/Municipality</label>
                    <input type="text" name="city_municipality" id="city_municipality" required value="{{ $barangay->city_municipality ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="barangay">Barangay</label>
                    <input type="text" name="barangay" id="barangay" required value="{{ $barangay->barangay ?? '' }}">
                </div>
            </div>
            <div> <!-- Example second category -->
                <table>
                    
                    <thead>
                        <tr style="position: sticky; top: 0; background-color: #3498db; color: white; z-index: 1;">
                            <th>Facilities</th>
                            <th>Does this barangay have at least one?</th>
                            <th>What is the distance if the brgy hall to the nearest facility?</th>
                            <th>What is the name of the facility(ies)?</th>
                            <th>What is the address of the facility?</th>
                            <th>Dimension(sqm)</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Type of Institution</th>
                        </tr>
                    </thead>
                    <tbody>
                        <thead>
                        <tr style="background-color: #4CAF50; color: white;">
                            <th colspan="9" style="border: 1px solid #4CAF50; padding: 8px; text-align: center;font-size: 30px;">HEALTH FACILITY</th>
                        </tr>
                        </thead>
                        @foreach($barangay->healthFacilities as $facility)
                        <tr>
                            <input type="hidden" name="health_facilities[{{ $loop->index }}][id]" value="{{ $facility->id }}">
                            <input type="hidden" name="health_facilities[{{ $loop->index }}][facility_type]" value="{{ $facility->facility_type ?? '' }}">
                            <td>
                                {{ $facility->facility_type }} <!-- Use the actual type of the facility -->
                            </td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="health_facilities[{{ $loop->index }}][available]" id="available_yes_{{ $loop->index }}" value="yes" {{ $facility->available ? 'checked' : '' }} required>
                                    <label for="available_yes_{{ $loop->index }}">Yes</label>
                                    <input type="radio" name="health_facilities[{{ $loop->index }}][available]" id="available_no_{{ $loop->index }}" value="no" {{ !$facility->available ? 'checked' : '' }}>
                                    <label for="available_no_{{ $loop->index }}">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="health_facilities[{{ $loop->index }}][distance]" value="{{ $facility->distance }}"></td>
                            <td><input type="text" name="health_facilities[{{ $loop->index }}][name]" value="{{ $facility->name ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[{{ $loop->index }}][address]" value="{{ $facility->address ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[{{ $loop->index }}][dimension]" value="{{ $facility->dimension ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[{{ $loop->index }}][latitude]" value="{{ $facility->latitude ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[{{ $loop->index }}][longitude]" value="{{ $facility->longitude ?? '' }}"></td>
                            <td>
                                <select name="health_facilities[{{ $loop->index }}][institution]">
                                    <option value="private" {{ $facility->institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ $facility->institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ $facility->institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ $facility->institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ $facility->institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ $facility->institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
{{--------------------------------------------------------------------------------------------------------------------------
--------------------------------------------educ faci                                    --------------------------------------------}}
                        
                        <thead>
                            <tr style="background-color: #4CAF50; color: white;">
                                <th colspan="9" style="border: 1px solid #4CAF50; padding: 8px; text-align: center;font-size: 35px;">EDUCATION FACILITY</th>
                            </tr>
                        </thead>
                        @foreach($barangay->educationFacilities as $facility)
                        <tr>
                            <td>
                            <input type="hidden" name="education_facilities[{{ $loop->index }}][id]" value="{{ $facility->id }}">
                            <input type="hidden" name="education_facilities[{{ $loop->index }}][facility_type]" value="{{ $facility->facility_type ?? '' }}">
                                {{ $facility->facility_type }} <!-- Use the actual type of the facility -->
                            </td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="education_facilities[{{ $loop->index }}][available]" id="available_yes_{{ $loop->index }}" value="yes" {{ $facility->available ? 'checked' : '' }} required>
                                    <label for="available_yes_{{ $loop->index }}">Yes</label>
                                    <input type="radio" name="education_facilities[{{ $loop->index }}][available]" id="available_no_{{ $loop->index }}" value="no" {{ !$facility->available ? 'checked' : '' }}>
                                    <label for="available_no_{{ $loop->index }}">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="education_facilities[{{ $loop->index }}][distance]" value="{{ $facility->distance }}"></td>
                            <td><input type="text" name="education_facilities[{{ $loop->index }}][name]" value="{{ $facility->name ?? '' }}"></td>
                            <td><input type="text" name="education_facilities[{{ $loop->index }}][address]" value="{{ $facility->address ?? '' }}"></td>
                            <td><input type="text" name="education_facilities[{{ $loop->index }}][dimension]" value="{{ $facility->dimension ?? '' }}"></td>
                            <td><input type="text" name="education_facilities[{{ $loop->index }}][latitude]" value="{{ $facility->latitude ?? '' }}"></td>
                            <td><input type="text" name="education_facilities[{{ $loop->index }}][longitude]" value="{{ $facility->longitude ?? '' }}"></td>
                            <td>
                                <select name="education_facilities[{{ $loop->index }}][institution]">
                                    <option value="private" {{ $facility->institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ $facility->institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ $facility->institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ $facility->institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ $facility->institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ $facility->institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                        {{--------------------------------------------------------------------------------------------------------------------------
--------------------------------------------Service facility                                   --------------------------------------------}}
                        
                        <thead>
                            <tr style="background-color: #4CAF50; color: white;">
                                <th colspan="9" style="border: 1px solid #4CAF50; padding: 8px; text-align: center;font-size: 35px;">SERVICES FACILITY</th>
                            </tr>
                        </thead>
                        @foreach($barangay->servicesFacilities as $facility)
                        <tr>
                            <td>
                            <input type="hidden" name="services_facilities[{{ $loop->index }}][id]" value="{{ $facility->id }}">
                            <input type="hidden" name="services_facilities[{{ $loop->index }}][facility_type]" value="{{ $facility->facility_type ?? '' }}">
                                {{ $facility->facility_type }} <!-- Use the actual type of the facility -->
                            </td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="services_facilities[{{ $loop->index }}][available]" id="available_yes_{{ $loop->index }}" value="yes" {{ $facility->available ? 'checked' : '' }} required>
                                    <label for="available_yes_{{ $loop->index }}">Yes</label>
                                    <input type="radio" name="services_facilities[{{ $loop->index }}][available]" id="available_no_{{ $loop->index }}" value="no" {{ !$facility->available ? 'checked' : '' }}>
                                    <label for="available_no_{{ $loop->index }}">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="services_facilities[{{ $loop->index }}][distance]" value="{{ $facility->distance }}"></td>
                            <td><input type="text" name="services_facilities[{{ $loop->index }}][name]" value="{{ $facility->name ?? '' }}"></td>
                            <td><input type="text" name="services_facilities[{{ $loop->index }}][address]" value="{{ $facility->address ?? '' }}"></td>
                            <td><input type="text" name="services_facilities[{{ $loop->index }}][dimension]" value="{{ $facility->dimension ?? '' }}"></td>
                            <td><input type="text" name="services_facilities[{{ $loop->index }}][latitude]" value="{{ $facility->latitude ?? '' }}"></td>
                            <td><input type="text" name="services_facilities[{{ $loop->index }}][longitude]" value="{{ $facility->longitude ?? '' }}"></td>
                            <td>
                                <select name="services_facilities[{{ $loop->index }}][institution]">
                                    <option value="private" {{ $facility->institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ $facility->institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ $facility->institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ $facility->institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ $facility->institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ $facility->institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                        {{--------------------------------------------------------------------------------------------------------------------------
--------------------------------------------Agriculture                                  --------------------------------------------}}
                        <thead>
                            <tr style="background-color: #4CAF50; color: white;">
                                <th colspan="9" style="border: 1px solid #4CAF50; padding: 8px; text-align: center;font-size: 35px;">ACRICULTURE FACILITY</th>
                            </tr>
                        </thead>
                        @foreach($barangay->agricultureFacilities as $facility)
                        <tr>
                            <td>
                            <input type="hidden" name="agriculture_facilities[{{ $loop->index }}][id]" value="{{ $facility->id }}">
                            <input type="hidden" name="agriculture_facilities[{{ $loop->index }}][facility_type]" value="{{ $facility->facility_type ?? '' }}">
                                {{ $facility->facility_type }} <!-- Use the actual type of the facility -->
                            </td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="agriculture_facilities[{{ $loop->index }}][available]" id="available_yes_{{ $loop->index }}" value="yes" {{ $facility->available ? 'checked' : '' }} required>
                                    <label for="available_yes_{{ $loop->index }}">Yes</label>
                                    <input type="radio" name="agriculture_facilities[{{ $loop->index }}][available]" id="available_no_{{ $loop->index }}" value="no" {{ !$facility->available ? 'checked' : '' }}>
                                    <label for="available_no_{{ $loop->index }}">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="agriculture_facilities[{{ $loop->index }}][distance]" value="{{ $facility->distance }}"></td>
                            <td><input type="text" name="agriculture_facilities[{{ $loop->index }}][name]" value="{{ $facility->name ?? '' }}"></td>
                            <td><input type="text" name="agriculture_facilities[{{ $loop->index }}][address]" value="{{ $facility->address ?? '' }}"></td>
                            <td><input type="text" name="agriculture_facilities[{{ $loop->index }}][dimension]" value="{{ $facility->dimension ?? '' }}"></td>
                            <td><input type="text" name="agriculture_facilities[{{ $loop->index }}][latitude]" value="{{ $facility->latitude ?? '' }}"></td>
                            <td><input type="text" name="agriculture_facilities[{{ $loop->index }}][longitude]" value="{{ $facility->longitude ?? '' }}"></td>
                            <td>
                                <select name="agriculture_facilities[{{ $loop->index }}][institution]">
                                    <option value="private" {{ $facility->institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ $facility->institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ $facility->institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ $facility->institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ $facility->institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ $facility->institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach     
                        {{--------------------------------------------------------------------------------------------------------------------------
--------------------------------------------Water 7 arc                                 --------------------------------------------}}
                        <thead>
                            <tr style="background-color: #4CAF50; color: white;">
                                <th colspan="9" style="border: 1px solid #4CAF50; padding: 8px; text-align: center;font-size: 35px;">WATER FACILITY</th>
                            </tr>
                        </thead>
                        @foreach($barangay->waterFacilities as $facility)
                        <tr>
                            <td>
                            <input type="hidden" name="water_facilities[{{ $loop->index }}][id]" value="{{ $facility->id }}">
                            <input type="hidden" name="water_facilities[{{ $loop->index }}][facility_type]" value="{{ $facility->facility_type ?? '' }}">
                                {{ $facility->facility_type }} <!-- Use the actual type of the facility -->
                            </td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="water_facilities[{{ $loop->index }}][available]" id="available_yes_{{ $loop->index }}" value="yes" {{ $facility->available ? 'checked' : '' }} required>
                                    <label for="available_yes_{{ $loop->index }}">Yes</label>
                                    <input type="radio" name="water_facilities[{{ $loop->index }}][available]" id="available_no_{{ $loop->index }}" value="no" {{ !$facility->available ? 'checked' : '' }}>
                                    <label for="available_no_{{ $loop->index }}">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="water_facilities[{{ $loop->index }}][distance]" value="{{ $facility->distance }}"></td>
                            <td><input type="text" name="water_facilities[{{ $loop->index }}][name]" value="{{ $facility->name ?? '' }}"></td>
                            <td><input type="text" name="water_facilities[{{ $loop->index }}][address]" value="{{ $facility->address ?? '' }}"></td>
                            <td><input type="text" name="water_facilities[{{ $loop->index }}][dimension]" value="{{ $facility->dimension ?? '' }}"></td>
                            <td><input type="text" name="water_facilities[{{ $loop->index }}][latitude]" value="{{ $facility->latitude ?? '' }}"></td>
                            <td><input type="text" name="water_facilities[{{ $loop->index }}][longitude]" value="{{ $facility->longitude ?? '' }}"></td>
                            <td>
                                <select name="water_facilities[{{ $loop->index }}][institution]">
                                    <option value="private" {{ $facility->institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ $facility->institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ $facility->institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ $facility->institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ $facility->institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ $facility->institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach 
                 {{--------------------------------------------------------------------------------------------------------------------------
--------------------------------------------Electricity Sources                                 --------------------------------------------}}
                        <thead>
                            <tr style="background-color: #4CAF50; color: white;">
                                <th colspan="9" style="border: 1px solid #4CAF50; padding: 8px; text-align: center;font-size: 35px;">ELECTRICAL SOURCES</th>
                            </tr>
                        </thead>
                        @foreach($barangay->electricitySources as $facility)
                        <tr>
                            <td>
                            <input type="hidden" name="electricity_sources[{{ $loop->index }}][id]" value="{{ $facility->id }}">
                            <input type="hidden" name="electricity_sources[{{ $loop->index }}][facility_type]" value="{{ $facility->facility_type ?? '' }}">
                                {{ $facility->facility_type }} <!-- Use the actual type of the facility -->
                            </td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="electricity_sources[{{ $loop->index }}][available]" id="available_yes_{{ $loop->index }}" value="yes" {{ $facility->available ? 'checked' : '' }} required>
                                    <label for="available_yes_{{ $loop->index }}">Yes</label>
                                    <input type="radio" name="electricity_sources[{{ $loop->index }}][available]" id="available_no_{{ $loop->index }}" value="no" {{ !$facility->available ? 'checked' : '' }}>
                                    <label for="available_no_{{ $loop->index }}">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="electricity_sources[{{ $loop->index }}][distance]" value="{{ $facility->distance }}"></td>
                            <td><input type="text" name="electricity_sources[{{ $loop->index }}][name]" value="{{ $facility->name ?? '' }}"></td>
                            <td><input type="text" name="electricity_sources[{{ $loop->index }}][address]" value="{{ $facility->address ?? '' }}"></td>
                            <td><input type="text" name="electricity_sources[{{ $loop->index }}][dimension]" value="{{ $facility->dimension ?? '' }}"></td>
                            <td><input type="text" name="electricity_sources[{{ $loop->index }}][latitude]" value="{{ $facility->latitude ?? '' }}"></td>
                            <td><input type="text" name="electricity_sources[{{ $loop->index }}][longitude]" value="{{ $facility->longitude ?? '' }}"></td>
                            <td>
                                <select name="electricity_sources[{{ $loop->index }}][institution]">
                                    <option value="private" {{ $facility->institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ $facility->institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ $facility->institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ $facility->institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ $facility->institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ $facility->institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
    {{--------------------------------------------------------------------------------------------------------------------------
--------------------------------------------Financial institutot                                 --------------------------------------------}}
                        <thead>
                            <tr style="background-color: #4CAF50; color: white;">
                                <th colspan="9" style="border: 1px solid #4CAF50; padding: 8px; text-align: center;font-size: 35px;">FINANCIAL AND CREDIT INSTITUTION</th>
                            </tr>
                        </thead>
                        @foreach($barangay->financialInstitutions as $facility)
                        <tr>
                            <td>
                            <input type="hidden" name="financial_institutions[{{ $loop->index }}][id]" value="{{ $facility->id }}">
                            <input type="hidden" name="financial_institutions[{{ $loop->index }}][facility_type]" value="{{ $facility->facility_type ?? '' }}">
                                {{ $facility->facility_type }} <!-- Use the actual type of the facility -->
                            </td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="financial_institutions[{{ $loop->index }}][available]" id="available_yes_{{ $loop->index }}" value="yes" {{ $facility->available ? 'checked' : '' }} required>
                                    <label for="available_yes_{{ $loop->index }}">Yes</label>
                                    <input type="radio" name="financial_institutions[{{ $loop->index }}][available]" id="available_no_{{ $loop->index }}" value="no" {{ !$facility->available ? 'checked' : '' }}>
                                    <label for="available_no_{{ $loop->index }}">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="financial_institutions[{{ $loop->index }}][distance]" value="{{ $facility->distance }}"></td>
                            <td><input type="text" name="financial_institutions[{{ $loop->index }}][name]" value="{{ $facility->name ?? '' }}"></td>
                            <td><input type="text" name="financial_institutions[{{ $loop->index }}][address]" value="{{ $facility->address ?? '' }}"></td>
                            <td><input type="text" name="financial_institutions[{{ $loop->index }}][dimension]" value="{{ $facility->dimension ?? '' }}"></td>
                            <td><input type="text" name="financial_institutions[{{ $loop->index }}][latitude]" value="{{ $facility->latitude ?? '' }}"></td>
                            <td><input type="text" name="financial_institutions[{{ $loop->index }}][longitude]" value="{{ $facility->longitude ?? '' }}"></td>
                            <td>
                                <select name="financial_institutions[{{ $loop->index }}][institution]">
                                    <option value="private" {{ $facility->institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ $facility->institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ $facility->institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ $facility->institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ $facility->institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ $facility->institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                           {{--------------------------------------------------------------------------------------------------------------------------
                        --------------------------------------------Tourust sight                                --------------------------------------------}}
                        <thead>
                            <tr style="background-color: #4CAF50; color: white;">
                                <th colspan="9" style="border: 1px solid #4CAF50; padding: 8px; text-align: center;font-size: 35px;">TOURIST SITES</th>
                            </tr>
                        </thead>
                        @foreach($barangay->touristSites as $facility)
                        <tr>
                            <td>
                            <input type="hidden" name="tourist_sites[{{ $loop->index }}][id]" value="{{ $facility->id }}">
                            <input type="hidden" name="tourist_sites[{{ $loop->index }}][facility_type]" value="{{ $facility->facility_type ?? '' }}">
                                {{ $facility->facility_type }} <!-- Use the actual type of the facility -->
                            </td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="tourist_sites[{{ $loop->index }}][available]" id="available_yes_{{ $loop->index }}" value="yes" {{ $facility->available ? 'checked' : '' }} required>
                                    <label for="available_yes_{{ $loop->index }}">Yes</label>
                                    <input type="radio" name="tourist_sites[{{ $loop->index }}][available]" id="available_no_{{ $loop->index }}" value="no" {{ !$facility->available ? 'checked' : '' }}>
                                    <label for="available_no_{{ $loop->index }}">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="tourist_sites[{{ $loop->index }}][distance]" value="{{ $facility->distance }}"></td>
                            <td><input type="text" name="tourist_sites[{{ $loop->index }}][name]" value="{{ $facility->name ?? '' }}"></td>
                            <td><input type="text" name="tourist_sites[{{ $loop->index }}][address]" value="{{ $facility->address ?? '' }}"></td>
                            <td><input type="text" name="tourist_sites[{{ $loop->index }}][dimension]" value="{{ $facility->dimension ?? '' }}"></td>
                            <td><input type="text" name="tourist_sites[{{ $loop->index }}][latitude]" value="{{ $facility->latitude ?? '' }}"></td>
                            <td><input type="text" name="tourist_sites[{{ $loop->index }}][longitude]" value="{{ $facility->longitude ?? '' }}"></td>
                            <td>
                                <select name="tourist_sites[{{ $loop->index }}][institution]">
                                    <option value="private" {{ $facility->institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ $facility->institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ $facility->institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ $facility->institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ $facility->institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ $facility->institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach  
                            {{--------------------------------------------------------------------------------------------------------------------------
--------------------------------------------GARBAGE AND WASTE DISPOSAL FACILITY     --------------------------------------------}}
                        <thead>
                            <tr style="background-color: #4CAF50; color: white;">
                                <th colspan="9" style="border: 1px solid #4CAF50; padding: 8px; text-align: center;font-size: 35px;">GARBAGE AND WASTE DISPOSAL FACILITY</th>
                            </tr>
                        </thead>
                        @foreach($barangay->wasteDisposalFacilities as $facility)
                        <tr>
                            <td>
                            <input type="hidden" name="waste_disposal_facilities[{{ $loop->index }}][id]" value="{{ $facility->id }}">
                            <input type="hidden" name="waste_disposal_facilities[{{ $loop->index }}][facility_type]" value="{{ $facility->facility_type ?? '' }}">
                                {{ $facility->facility_type }} <!-- Use the actual type of the facility -->
                            </td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="waste_disposal_facilities[{{ $loop->index }}][available]" id="available_yes_{{ $loop->index }}" value="yes" {{ $facility->available ? 'checked' : '' }} required>
                                    <label for="available_yes_{{ $loop->index }}">Yes</label>
                                    <input type="radio" name="waste_disposal_facilities[{{ $loop->index }}][available]" id="available_no_{{ $loop->index }}" value="no" {{ !$facility->available ? 'checked' : '' }}>
                                    <label for="available_no_{{ $loop->index }}">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="waste_disposal_facilities[{{ $loop->index }}][distance]" value="{{ $facility->distance }}"></td>
                            <td><input type="text" name="waste_disposal_facilities[{{ $loop->index }}][name]" value="{{ $facility->name ?? '' }}"></td>
                            <td><input type="text" name="waste_disposal_facilities[{{ $loop->index }}][address]" value="{{ $facility->address ?? '' }}"></td>
                            <td><input type="text" name="waste_disposal_facilities[{{ $loop->index }}][dimension]" value="{{ $facility->dimension ?? '' }}"></td>
                            <td><input type="text" name="waste_disposal_facilities[{{ $loop->index }}][latitude]" value="{{ $facility->latitude ?? '' }}"></td>
                            <td><input type="text" name="waste_disposal_facilities[{{ $loop->index }}][longitude]" value="{{ $facility->longitude ?? '' }}"></td>
                            <td>
                                <select name="waste_disposal_facilities[{{ $loop->index }}][institution]">
                                    <option value="private" {{ $facility->institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ $facility->institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ $facility->institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ $facility->institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ $facility->institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ $facility->institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                                  
                    </tbody>
                </table>             
            </div>
                <div class="form-container">
                    <table>
                    <thead>
                        <tr style="background-color: #4CAF50; color: white;">
                            <th colspan="9" style="border: 1px solid #4CAF50; padding: 8px; text-align: center;font-size: 35px;">MODE OF TRANSPORTATION</th>
                        </tr>
                    </thead>
                    @foreach($barangay->transportationModes as $index => $facility)
                    <tr>
                        <td>
                        <input type="hidden" name="transportation_modes[{{ $loop->index }}][id]" value="{{ $facility->id }}">
                        <input type="hidden" name="transportation_modes[{{ $loop->index }}][mode_of_transpo]" value="{{ $facility->mode_of_transpo ?? '' }}">
                            {{ $facility->mode_of_transpo }} <!-- Use the actual type of the facility -->
                        </td>
                        <td>
                            <div class="radio-container">
                                <input type="radio" name="transportation_modes[{{ $index }}][available]" id="transportation_available_yes_{{ $index }}" value="yes" {{ $facility->available ? 'checked' : '' }} required>
                                <label for="transportation_available_yes_{{ $index }}">Yes</label>
                                <input type="radio" name="transportation_modes[{{ $index }}][available]" id="transportation_available_no_{{ $index }}" value="no" {{ !$facility->available ? 'checked' : '' }}>
                                <label for="transportation_available_no_{{ $index }}">No</label>
                            </div>
                            @if($facility->mode_of_transpo === 'Other') 
                                <input type="text" name="transportation_modes[{{ $index }}][other]" value="{{ $facility->other }}" placeholder="Specify if Other">
                            @endif
                        </td>
                        
                    </tr>
                    @endforeach   
                </table>                    
                </div>
                
                <div class="form-container">
                    <table>
                        <thead>
                            <tr style="background-color: #4CAF50; color: white;">
                                <th colspan="3" style="border: 1px solid #4CAF50; padding: 8px; text-align: center; font-size: 35px;">INFORMATION AND COMMUNICATIONS TECHNOLOGY</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangay->ictsQ as $facility)
                            <tr>
                                <td>
                                    
                                    <input type="hidden" name="icts[{{ $loop->index }}][id]" value="{{ $facility->id }}">
                                    {{ $facility->ict_q }} <!-- Display the question associated with the facility -->
                                </td>
                                <td>
                                    <div class="radio-container">
                                        <input type="radio" name="icts[{{ $loop->index }}][available]" id="available_yes_{{ $loop->index }}" value="yes" {{ $facility->available ? 'checked' : ''  }} >
                                        <label for="available_yes_{{ $loop->index }}">Yes</label>
                                        <input type="radio" name="icts[{{ $loop->index }}][available]" id="available_no_{{ $loop->index }}" value="no" {{ !$facility->available ? 'checked' : ''  }}>
                                        <label for="available_no_{{ $loop->index }}">No</label>
                                    </div>
                                </td>
                                <td>
                                    <input type="hidden" name="icts[{{ $loop->index }}][ict_q]" value="{{ $facility->ict_q }}">
                                    <input type="text" name="icts[{{ $loop->index }}][existing]" value="{{ $facility->existing ?? '' }}" placeholder="Specify if available">
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    
                    <div style="padding-top: 20px; width:40%; display: contents">
                        <table>
                            <thead>
                                <tr style="background-color: #4CAF50">
                                    <th colspan="2" style="text-align: center">IT4</th>
                                </tr>
                            </thead>
                            @foreach($barangay->wifi_providers as $index => $WifiProvider)
                            <tr>
                                <td>Who provides the free Wi-Fi in the barangay?</td>
                                <td>
                                    <input type="text" name="wifi_providers[{{ $index }}][provider]" value="{{ $WifiProvider->provider ?? '' }}">
                                </td>
                                <input type="hidden" name="wifi_providers[{{ $index }}][id]" value="{{ $WifiProvider->id ?? '' }}">
                                <input type="hidden" name="wifi_providers[{{ $index }}][barangay_id]" value="{{ $barangay->id }}"> <!-- Add this -->
                                <input type="hidden" name="wifi_providers[{{ $index }}][question]" value="Who provides the free Wi-Fi in the barangay?">
                            </tr>
                            @endforeach                            
                        </table>
                    </div>
                    <div>
                        <!-- Review or final details -->
                        <button type="submit">Update</button>
                        <input type="button" id="back-btn" value="Back" onclick="window.location.href='{{ route('barangay.input') }}'">
                    </div>
                </div>
                
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to handle radio button state and set input fields readonly
                function handleRadioChange(radioGroup) {
                    const inputs = radioGroup.closest('tr').querySelectorAll('input[type="text"], select');
                    const radio = radioGroup.querySelector('input[type="radio"]:checked');
        
                    if (radio) {
                        if (radio.value === 'no') {
                            inputs.forEach(input => {
                                input.readOnly = true; // Set fields to readonly
                                if (input.tagName.toLowerCase() === 'select') {
                                    input.disabled = true; // Enable dropdown
                                    
                                }
                                input.value = '';
                                
                            });
                        } else {
                            inputs.forEach(input => {
                                input.readOnly = false; // Set fields back to editable
                                if (input.tagName.toLowerCase() === 'select') {
                                    input.disabled = false; // Enable dropdown
                                }
                                
                            });
                        }
                    }
                }
        
                // Call this function for each set of health facility radio buttons
                const radioGroups = document.querySelectorAll('.radio-container');
                radioGroups.forEach(radioGroup => {
                    const radios = radioGroup.querySelectorAll('input[type="radio"]');
                    radios.forEach(radio => {
                        radio.addEventListener('change', function() {
                            handleRadioChange(radioGroup);
                        });
                    });
        
                    // Initialize readonly state based on current values
                    handleRadioChange(radioGroup);
                });
            });
        </script>           
    </div>
</body>
</html>
