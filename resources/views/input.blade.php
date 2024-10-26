<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/sass/app.scss'])
    <title>CBMS</title>
</head>
<body>
    @if (session('success'))
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif

    <div class="form-container">
        <form method="POST" action="{{ route('barangay.store') }}" name="barangay.form" id="barangay-form">
            @csrf <!-- CSRF token -->
            <input type="hidden" name="id" id="barangay_id" value="{{ $barangay->id ?? '' }}"> <!-- Hidden ID field for editing -->
            {{-- <input type="hidden" name="health_facilities[0][id]" value="{{ $healthFacility->id ?? '' }}"> --}}
            <div class="category" id="category-1"> <!-- First category shown by default -->
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
            
                <input type="button" id="proceedButton" value="Proceed" onclick="showCategory(2)">
                <button id="edit-btn" type="button">Edit</button> 
            </div>
            <!--Healthcare Categ- -->
            
            <div class="category" id="category-2" style="display: none;"> <!-- Example second category -->

               <h3 class="category-title">HEALTH FACILITY</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Health Facility</th>
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
                        <tr>
                            <td>Barangay Health Center</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="health_facilities[0][available]" id="bhc_yes" value="yes" {{ old('health_facilities.0.available', $healthFacility->available ?? '') == 'yes' ? 'checked' : '' }} required>
                                    <label for="bhc_yes">Yes</label>
                                    <input type="radio" name="health_facilities[0][available]" id="bhc_no" value="no" {{ old('health_facilities.0.available', $healthFacility->available ?? '') == 'no' ? 'checked' : '' }}>
                                    <label for="bhc_no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="health_facilities[0][distance]" value="{{ $healthFacility->distance ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[0][name]" value="{{ $healthFacility->name ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[0][address]" value="{{ $healthFacility->address ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[0][dimension]" value="{{ $healthFacility->dimension ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[0][latitude]" value="{{ $healthFacility->latitude ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[0][longitude]" value="{{ $healthFacility->longitude ?? '' }}"></td>
                            <td>
                                <select name="health_facilities[0][institution]">
                                    <option value="private" {{ isset($healthFacility) && $healthFacility->institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ isset($healthFacility) && $healthFacility->institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ isset($healthFacility) && $healthFacility->institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ isset($healthFacility) && $healthFacility->institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ isset($healthFacility) && $healthFacility->institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ isset($healthFacility) && $healthFacility->institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="health_facilities[0][id]" value="{{ $healthFacility->id ?? '' }}">
                            <input type="hidden" name="health_facilities[0][facility_type]" value="Barangay Health Center">
                        </tr>                        
                        <tr>
                            <td> Hospital </td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="health_facilities[1][available]" id="yes1" value="yes" {{ old('health_facilities.1.available', $healthFacility->available ?? '') == 'yes' ? 'checked' : '' }}>
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="health_facilities[1][available]" id="no21" value="no" {{ old('health_facilities.1.available', $healthFacility->available ?? '') == 'no' ? 'checked' : '' }}>
                                    <label for="no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="health_facilities[1][distance]" value="{{ $healthFacility->distance ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[1][name]" value="{{ $healthFacility->name ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[1][address]" value="{{ $healthFacility->address ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[1][dimension]" value="{{ $healthFacility->dimension ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[1][latitude]" value="{{ $healthFacility->latitude ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[1][longitude]" value="{{ $healthFacility->longitude ?? '' }}"></td>
                            <td>
                                <select name="health_facilities[1][institution]">
                                    <option value="private" {{ isset($healthFacility) && $healthFacility->hospital_institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ isset($healthFacility) && $healthFacility->hospital_institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ isset($healthFacility) && $healthFacility->hospital_institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ isset($healthFacility) && $healthFacility->hospital_institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ isset($healthFacility) && $healthFacility->hospital_institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ isset($healthFacility) && $healthFacility->hospital_institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="health_facilities[1][id]" value="{{ $healthFacility->id ?? '' }}">
                            <input type="hidden" name="health_facilities[1][facility_type]" value="Hospital">
                        </tr>
                       <tr>
                            <td>Rural Health Unit (RHU)/Urban Health Center</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="health_facilities[2][available]" id="yes2" value="yes" {{ old('health_facilities.2.available', $healthFacility->available ?? '') == 'yes' ? 'checked' : '' }}>
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="health_facilities[2][available]" id="no2" value="no" {{ old('health_facilities.2.available', $healthFacility->available ?? '') == 'no' ? 'checked' : '' }}>
                                    <label for="no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="health_facilities[2][distance]" value="{{ $healthFacility->distance ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[2][name]" value="{{ $healthFacility->name ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[2][address]" value="{{ $healthFacility->address ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[2][dimension]" value="{{ $healthFacility->services ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[2][latitude]" value="{{ $healthFacility->latitude ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[2][longitude]" value="{{ $healthFacility->longitude ?? '' }}"></td>
                            <td>
                                <select name="health_facilities[2][institution]">
                                    <option value="private" {{ isset($healthFacility) && $healthFacility->rhu_institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ isset($healthFacility) && $healthFacility->rhu_institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ isset($healthFacility) && $healthFacility->rhu_institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ isset($healthFacility) && $$healthFacility->rhu_institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ isset($healthFacility) && $healthFacility->rhu_institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ isset($healthFacility) && $healthFacility->rhu_institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="health_facilities[2][id]" value="{{ $healthFacility->id ?? '' }}">
                            <input type="hidden" name="health_facilities[2][facility_type]" value="RHU">

                        </tr>
                         <tr>
                            <td>Maternity/Living-in Clinic/Birthing Home</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="health_facilities[3][available]" id="yes3" value="yes" {{ old('health_facilities.3.available', $healthFacility->available ?? '') == 'yes' ? 'checked' : '' }}>
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="health_facilities[3][available]" id="no3" value="no" {{ old('health_facilities.3.available', $healthFacility->available ?? '') == 'no' ? 'checked' : '' }}>
                                    <label for="no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="health_facilities[3][distance]" value="{{ $healthFacility->distance ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[3][name]" value="{{ $healthFacility->name ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[3][address]" value="{{ $healthFacility->address ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[3][dimension]" value="{{ $healthFacility->services ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[3][latitude]" value="{{ $healthFacility->latitude ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[3][longitude]" value="{{ $healthFacility->longitude ?? '' }}"></td>
                            <td>
                                <select name="health_facilities[3][institution]">
                                    <option value="private" {{ isset($healthFacility) && $healthFacility->maternity_institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ isset($healthFacility) && $healthFacility->maternity_institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ isset($healthFacility) && $healthFacility->maternity_institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ isset($healthFacility) && $healthFacility->maternity_institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ isset($healthFacility) && $healthFacility->maternity_institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ isset($healthFacility) && $healthFacility->maternity_institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="health_facilities[3][id]" value="{{ $healthFacility->id ?? '' }}">
                            <input type="hidden" name="health_facilities[3][facility_type]" value="Maternity/Birting Home">
                        </tr>
                        <tr>
                            <td>Pharmacy/Drugstore</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="health_facilities[4][available]" id="yes4" value="yes" {{ old('health_facilities.4.available', $healthFacility->available ?? '') == 'yes' ? 'checked' : '' }}>
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="health_facilities[4][available]" id="no4" value="no" {{ old('health_facilities.4.available', $healthFacility->available ?? '') == 'no' ? 'checked' : '' }}>
                                    <label for="no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="health_facilities[4][distance]" value="{{ $healthFacility->distance ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[4][name]" value="{{ $healthFacility->name ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[4][address]" value="{{ $healthFacility->address ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[4][dimension]" value="{{ $healthFacility->services ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[4][latitude]" value="{{ $healthFacility->latitude ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[4][longitude]" value="{{ $healthFacility->longitude ?? '' }}"></td>
                            <td>
                                <select name="health_facilities[4][institution]">
                                    <option value="private" {{ isset($healthFacility) && $healthFacility->institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ isset($healthFacility) && $healthFacility->institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ isset($healthFacility) && $healthFacility->institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ isset($healthFacility) && $healthFacility->institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ isset($healthFacility) && $healthFacility->institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ isset($healthFacility) && $healthFacility->institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="health_facilities[4][id]" value="{{ $healthFacility->id ?? '' }}">
                            <input type="hidden" name="health_facilities[4][facility_type]" value="Pharmacy">
                        </tr>

                        <tr>
                            <td>COVID-19 Quarantine/Isolation Facility</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="health_facilities[5][available]" id="yes5" value="yes" {{ old('health_facilities.5.available', $healthFacility->available ?? '') == 'yes' ? 'checked' : '' }}>
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="health_facilities[5][available]" id="no5" value="no" {{ old('health_facilities.5.available', $healthFacility->available ?? '') == 'no' ? 'checked' : '' }}>
                                    <label for="yes">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="health_facilities[5][distance]" value="{{ $healthFacility->distance ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[5][name]" value="{{ $healthFacility->name ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[5][address]" value="{{ $healthFacility->address ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[5][dimension]" value="{{ $healthFacility->dimension ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[5][latitude]" value="{{ $healthFacility->latitude ?? '' }}"></td>
                            <td><input type="text" name="health_facilities[5][longitude]" value="{{ $healthFacility->longitude ?? '' }}"></td>
                            <td>
                                <select name="health_facilities[5][institution]">
                                    <option value="private" {{ isset($healthFacility) && $healthFacility->institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ isset($healthFacility) && $healthFacility->institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ isset($healthFacility) && $healthFacility->institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ isset($healthFacility) && $healthFacility->institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ isset($healthFacility) && $healthFacility->institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ isset($healthFacility) && $healthFacility->institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="health_facilities[5][id]" value="{{ $healthFacility->id ?? '' }}">
                            <input type="hidden" name="health_facilities[5][facility_type]" value="Isolation Facility">
                        </tr>
                    </tbody>
                </table>
                <!-- Add buttons to navigate back or proceed -->
                <input type="button" id="proceedButton" value="Proceed" onclick="showCategory(3)">
                <input type="button" id="back-btn" value="Back" onclick="showCategory(1)" style="display: none;"> <!-- Back Button -->   
            </div>
            
{{-- -----------CATEGORY 3 ----EDUCATION FACILITY----------------------------------------------------------------------------------------------
-----------------------------------------------------  EDUCATION FACILITY ---------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------}}
            <div class="category" id="category-3" style="display: none;"> <!-- Example third category -->
                <input type="hidden" name="education_facilities[0][id]" value="{{ $educationFacility->id ?? '' }}">
                <h3 class="category-title">EDUCATION FACILITY</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Education Facility</th>
                            <th>Does this barangay have at least one?</th>
                            <th>What is the distance from the brgy hall to the nearest facility?</th>
                            <th>What is the name of the facility(ies)?</th>
                            <th>What is the address of the facility?</th>
                            <th>Dimension(sqm)</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Type of Institution</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> Day Care Center</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="education_facilities[0][available]" id="elem_yes" value="yes">
                                    <label for="elem_yes">Yes</label>
                                    <input type="radio" name="education_facilities[0][available]" id="elem_no" value="no">
                                    <label for="elem_no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="education_facilities[0][distance]" value=""></td>
                            <td><input type="text" name="education_facilities[0][name]" value=""></td>
                            <td><input type="text" name="education_facilities[0][address]" value=""></td>
                            <td><input type="text" name="education_facilities[0][dimension]" value=""></td>
                            <td><input type="text" name="education_facilities[0][latitude]" value=""></td>
                            <td><input type="text" name="education_facilities[0][longitude]" value=""></td>
                            <td>
                                <select name="education_facilities[0][institution]">
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                    <option value="provincial">Provincial Government</option>
                                    <option value="municipal">City/Municipal Government</option>
                                    <option value="barangay">Barangay Government</option>
                                    <option value="ngos">NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="education_facilities[0][id]" value="{{ $educationFacility->id ?? '' }}">
                            <input type="hidden" name="education_facilities[0][facility_type]" value=" Day Care Center">
                        </tr>
            
                        <tr>
                            <td>College/University</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="education_facilities[1][available]" id="high_yes" value="yes">
                                    <label for="high_yes">Yes</label>
                                    <input type="radio" name="education_facilities[1][available]" id="high_no" value="no">
                                    <label for="high_no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="education_facilities[1][distance]" value=""></td>
                            <td><input type="text" name="education_facilities[1][name]" value=""></td>
                            <td><input type="text" name="education_facilities[1][address]" value=""></td>
                            <td><input type="text" name="education_facilities[1][dimension]" value=""></td>
                            <td><input type="text" name="education_facilities[1][latitude]" value=""></td>
                            <td><input type="text" name="education_facilities[1][longitude]" value=""></td>
                            <td>
                                <select name="education_facilities[1][institution]">
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                    <option value="provincial">Provincial Government</option>
                                    <option value="municipal">City/Municipal Government</option>
                                    <option value="barangay">Barangay Government</option>
                                    <option value="ngos">NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="education_facilities[1][id]" value="{{ $educationFacility->id ?? '' }}">
                            <input type="hidden" name="education_facilities[1][facility_type]" value="College/University">
                        </tr>
                        <tr>
                            <td>Senior High School </td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="education_facilities[2][available]" id="high_yes" value="yes">
                                    <label for="high_yes">Yes</label>
                                    <input type="radio" name="education_facilities[2][available]" id="high_no" value="no">
                                    <label for="high_no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="education_facilities[2][distance]" value=""></td>
                            <td><input type="text" name="education_facilities[2][name]" value=""></td>
                            <td><input type="text" name="education_facilities[2][address]" value=""></td>
                            <td><input type="text" name="education_facilities[2][dimension]" value=""></td>
                            <td><input type="text" name="education_facilities[2][latitude]" value=""></td>
                            <td><input type="text" name="education_facilities[2][longitude]" value=""></td>
                            <td>
                                <select name="education_facilities[2][institution]">
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                    <option value="provincial">Provincial Government</option>
                                    <option value="municipal">City/Municipal Government</option>
                                    <option value="barangay">Barangay Government</option>
                                    <option value="ngos">NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="education_facilities[2][id]" value="{{ $educationFacility->id ?? '' }}">
                            <input type="hidden" name="education_facilities[2][facility_type]" value="Senior High School ">
                        </tr>
                        <tr>
                            <td>Junior High School</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="education_facilities[3][available]" id="high_yes" value="yes">
                                    <label for="high_yes">Yes</label>
                                    <input type="radio" name="education_facilities[3][available]" id="high_no" value="no">
                                    <label for="high_no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="education_facilities[3][distance]" value=""></td>
                            <td><input type="text" name="education_facilities[3][name]" value=""></td>
                            <td><input type="text" name="education_facilities[3][address]" value=""></td>
                            <td><input type="text" name="education_facilities[3][dimension]" value=""></td>
                            <td><input type="text" name="education_facilities[3][latitude]" value=""></td>
                            <td><input type="text" name="education_facilities[3][longitude]" value=""></td>
                            <td>
                                <select name="education_facilities[3][institution]">
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                    <option value="provincial">Provincial Government</option>
                                    <option value="municipal">City/Municipal Government</option>
                                    <option value="barangay">Barangay Government</option>
                                    <option value="ngos">NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="education_facilities[3][id]" value="{{ $educationFacility->id ?? '' }}">
                            <input type="hidden" name="education_facilities[3][facility_type]" value="Junior High School">
                        </tr>
                        <tr>
                            <td>Elementary School</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="education_facilities[4][available]" id="high_yes" value="yes">
                                    <label for="high_yes">Yes</label>
                                    <input type="radio" name="education_facilities[4][available]" id="high_no" value="no">
                                    <label for="high_no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="education_facilities[4][distance]" value=""></td>
                            <td><input type="text" name="education_facilities[4][name]" value=""></td>
                            <td><input type="text" name="education_facilities[4][address]" value=""></td>
                            <td><input type="text" name="education_facilities[4][dimension]" value=""></td>
                            <td><input type="text" name="education_facilities[4][latitude]" value=""></td>
                            <td><input type="text" name="education_facilities[4][longitude]" value=""></td>
                            <td>
                                <select name="education_facilities[4][institution]">
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                    <option value="provincial">Provincial Government</option>
                                    <option value="municipal">City/Municipal Government</option>
                                    <option value="barangay">Barangay Government</option>
                                    <option value="ngos">NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="education_facilities[4][id]" value="{{ $educationFacility->id ?? '' }}">
                            <input type="hidden" name="education_facilities[4][facility_type]" value="Elementary School">
                        </tr>
                        <tr>
                            <td>Preschool</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="education_facilities[5][available]" id="high_yes" value="yes">
                                    <label for="high_yes">Yes</label>
                                    <input type="radio" name="education_facilities[5][available]" id="high_no" value="no">
                                    <label for="high_no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="education_facilities[5][distance]" value=""></td>
                            <td><input type="text" name="education_facilities[5][name]" value=""></td>
                            <td><input type="text" name="education_facilities[5][address]" value=""></td>
                            <td><input type="text" name="education_facilities[5][dimension]" value=""></td>
                            <td><input type="text" name="education_facilities[5][latitude]" value=""></td>
                            <td><input type="text" name="education_facilities[5][longitude]" value=""></td>
                            <td>
                                <select name="education_facilities[5][institution]">
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                    <option value="provincial">Provincial Government</option>
                                    <option value="municipal">City/Municipal Government</option>
                                    <option value="barangay">Barangay Government</option>
                                    <option value="ngos">NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="education_facilities[5][id]" value="{{ $educationFacility->id ?? '' }}">
                            <input type="hidden" name="education_facilities[5][facility_type]" value="Preschool">
                        </tr>
                        <tr>
                            <td>Others</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="education_facilities[6][available]" id="high_yes" value="yes">
                                    <label for="high_yes">Yes</label>
                                    <input type="radio" name="education_facilities[6][available]" id="high_no" value="no">
                                    <label for="high_no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="education_facilities[6][distance]" value=""></td>
                            <td><input type="text" name="education_facilities[6][name]" value=""></td>
                            <td><input type="text" name="education_facilities[6][address]" value=""></td>
                            <td><input type="text" name="education_facilities[6][dimension]" value=""></td>
                            <td><input type="text" name="education_facilities[6][latitude]" value=""></td>
                            <td><input type="text" name="education_facilities[6][longitude]" value=""></td>
                            <td>
                                <select name="education_facilities[6][institution]">
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                    <option value="provincial">Provincial Government</option>
                                    <option value="municipal">City/Municipal Government</option>
                                    <option value="barangay">Barangay Government</option>
                                    <option value="ngos">NGOs</option>
                                </select>
                            </td>
                            <input type="hidden" name="education_facilities[6][id]" value="{{ $educationFacility->id ?? '' }}">
                            <input type="hidden" name="education_facilities[6][facility_type]" value="Others">
                        </tr>
                       
                    </tbody>
                </table>
                <input type="button" id="proceedButton" value="Proceed" onclick="showCategory(13)">
                <input type="button" id="back-btn" value="Back" onclick="showCategory(2)"> <!-- Back Button -->
            </div>
            {{-- @include('input2')
            @include('input3') --}}
            {{-- @include('review') --}}
            <!-- Final Category (Submit) -->
            <div class="category" id="category-13" style="display: none;">
                
                <button type="submit">Submit</button>
                <input type="button" id="back-btn" value="Back" onclick="showCategory(12)">
            </div>
        </form>
        

        <div id="search-modal" class="modal">
            <div class="modal-content">
                <label for="search-barangay">Search Barangay:</label>
                <input type="text" id="search-barangay" placeholder="Enter barangay name...">
                <div class="search-results" id="search-results"></div>
                <button id="close-modal" type="button">Close</button>
            </div>
        </div>
        <script>
            function showCategory(number) {
                // Hide all categories
                var categories = document.querySelectorAll('.category');
                categories.forEach(function(cat) {
                    cat.style.display = 'none';
                });

                // Show the desired category
                document.getElementById('category-' + number).style.display = 'flex';

                // Enable/Disable back button depending on the current category
                if (number === 1) {
                    document.getElementById('back-btn').style.display = 'none'; // Hide back button on the first category
                } else {
                    document.getElementById('back-btn').style.display = 'inline-block'; // Show back button on other categories
                }
            }

            // Open the search modal
            document.getElementById('edit-btn').addEventListener('click', function() {
                document.getElementById('search-modal').style.display = 'flex';
            });

            // Close the modal
            document.getElementById('close-modal').addEventListener('click', function() {
                document.getElementById('search-modal').style.display = 'none';
            });

            // Handle searching barangays
            document.getElementById('search-barangay').addEventListener('input', function() {
                const searchValue = this.value.toLowerCase();
                const resultsContainer = document.getElementById('search-results');
                resultsContainer.innerHTML = ''; // Clear previous results

                if (searchValue.length > 0) {
                    // Fetch barangays from the Laravel backend using AJAX
                    fetch(`/search-barangays?query=${searchValue}`)
                        .then(response => response.json())
                        .then(barangays => {
                            // Check if any results were returned
                            if (barangays.length === 0) {
                                resultsContainer.innerHTML = '<div>No barangays found</div>';
                            } else {
                                // Display each result
                                barangays.forEach(function(barangay) {
                        const div = document.createElement('div');
                        div.textContent = barangay.barangay; // Show the barangay name
                        div.addEventListener('click', function() {
                            // Redirect to the edit page for the selected barangay
                            window.location.href = `/barangay/edit/${barangay.id}`;
                        });
                        resultsContainer.appendChild(div);
                    });

                            }
                        })
                        .catch(error => {
                            console.error('Error fetching barangays:', error);
                        });
                }
            });
         // Function to set fields to readonly or reset them based on radio button selection
         document.addEventListener('DOMContentLoaded', function() {
            // Call this function for each set of health facility radio buttons
            const radioGroups = document.querySelectorAll('.radio-container');
            radioGroups.forEach(radioGroup => {
                const radios = radioGroup.querySelectorAll('input[type="radio"]');
                radios.forEach(radio => {
                    radio.addEventListener('change', function() {
                        handleRadioChange(radioGroup);
                    });
                });
            });
        });
        // Function to set fields to readonly or reset them based on radio button selection
        function handleRadioChange(radioGroup) {
            const inputs = radioGroup.closest('tr').querySelectorAll('input[type="text"], select');
            const selectedRadio = radioGroup.querySelector('input[type="radio"]:checked');
            
            if (selectedRadio) {
                if (selectedRadio.value === 'yes') {
                    inputs.forEach(input => {
                        input.readOnly = false; // Set fields to editable
                        // input.value = ''; // Reset input fields if 'yes' is selected
                        if (input.tagName.toLowerCase() === 'select') {
                    input.disabled = false; // Enable dropdown
                }
                        
                    });
                } else {
                    inputs.forEach(input => {
                        input.readOnly = true; // Set fields back to readonly
                        input.value = ''; // Reset input fields if 'no' is selected
                        if (input.tagName.toLowerCase() === 'select') {
                    input.disabled = true; // Enable dropdown
                }
                    });
                }
            }
        }
            // Attach change listeners to radio buttons in the health facilities category
            document.querySelectorAll('#category-2 input[type="radio"]').forEach(radio => {
                handleRadioChange(radio);
            });

            // Attach change listeners to radio buttons in the education facilities category
            document.querySelectorAll('#category-3 input[type="radio"]').forEach(radio => {
                handleRadioChange(radio);
            });
            // Attach change listeners to radio buttons in the education facilities category
            document.querySelectorAll('#category-4 input[type="radio"]').forEach(radio => {
                handleRadioChange(radio);
            });
            // Attach change listeners to radio buttons in the education facilities category
            document.querySelectorAll('#category-5 input[type="radio"]').forEach(radio => {
                handleRadioChange(radio);
            });
            // Attach change listeners to radio buttons in the education facilities category
            document.querySelectorAll('#category-6 input[type="radio"]').forEach(radio => {
                handleRadioChange(radio);
            });
            // Attach change listeners to radio buttons in the education facilities category
            document.querySelectorAll('#category-7 input[type="radio"]').forEach(radio => {
                handleRadioChange(radio);
            });
            // Attach change listeners to radio buttons in the education facilities category
            document.querySelectorAll('#category-8 input[type="radio"]').forEach(radio => {
                handleRadioChange(radio);
            });
            // Attach change listeners to radio buttons in the education facilities category
            document.querySelectorAll('#category-9 input[type="radio"]').forEach(radio => {
                handleRadioChange(radio);
            });
            // Attach change listeners to radio buttons in the education facilities category
            document.querySelectorAll('#category-10 input[type="radio"]').forEach(radio => {
                handleRadioChange(radio);
            });
            // Attach change listeners to radio buttons in the education facilities category
            document.querySelectorAll('#category-11 input[type="radio"]').forEach(radio => {
                handleRadioChange(radio);
            });
            // Attach change listeners to radio buttons in the education facilities category
            document.querySelectorAll('#category-12 input[type="radio"]').forEach(radio => {
                handleRadioChange(radio);
            });
        // //required fields
        //         document.addEventListener('DOMContentLoaded', function () {
        //     const proceedButton = document.getElementById('proceedButton');

        //     // Function to check if required fields are filled
        //     function checkRequiredFields() {
        //         const requiredFields = document.querySelectorAll('input[required]');
        //         let allFilled = true;

        //         requiredFields.forEach(field => {
        //             if (!field.value.trim()) {
        //                 allFilled = false; // If any required field is empty
        //             }
        //         });

        //         // Enable or disable the proceed button based on the check
        //         proceedButton.disabled = !allFilled; 
        //     }

        //     // Add event listeners to all required fields to check their state
        //     const requiredFields = document.querySelectorAll('input[required]');
        //     requiredFields.forEach(field => {
        //         field.addEventListener('input', checkRequiredFields); // Check on input change
        //     });

        //     // Initial check
        //     checkRequiredFields();
        // });
        document.addEventListener("DOMContentLoaded", function() {
        console.log("Auto-close script is running");
        setTimeout(function() {
            const alertElement = document.querySelector('.custom-alert');
            if (alertElement) {
                alertElement.style.display = 'none';
            }
        }, 3000);
    });
        </script>
    </div>
</body>
</html>
