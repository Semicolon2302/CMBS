<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>
    {{-- -----------CATEGORY 7---Electricity Sources----------------------------------------------------------------------------------------------
-----------------------------------------------------  Electricity Sources ---------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------}}
<div class="category" id="category-7" style="display: none;"> <!-- Example third category -->
    <input type="hidden" name="electricity_sources[0][id]" value="{{ $electricitySources->id ?? '' }}">
    <h3 class="category-title">ELECTRICITY SOURCES</h3>
    <table>
        <thead>
            <tr>
                <th>Source of Electricity</th>
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
                <td>Electric company</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="electricity_sources[0][available]" id="elem_yes" value="yes" required>
                        <label for="elem_yes">Yes</label>
                        <input type="radio" name="electricity_sources[0][available]" id="elem_no" value="no">
                        <label for="elem_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="electricity_sources[0][distance]" value=""></td>
                <td><input type="text" name="electricity_sources[0][name]" value=""></td>
                <td><input type="text" name="electricity_sources[0][address]" value=""></td>
                <td><input type="text" name="electricity_sources[0][dimension]" value=""></td>
                <td><input type="text" name="electricity_sources[0][latitude]" value=""></td>
                <td><input type="text" name="electricity_sources[0][longitude]" value=""></td>
                <td>
                    <select name="electricity_sources[0][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="electricity_sources[0][id]" value="{{ $electricitySources->id ?? '' }}">
                <input type="hidden" name="electricity_sources[0][facility_type]" value="Electric company">
            </tr>

            <tr>
                <td>Hydroelectric Power Plant</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="electricity_sources[1][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="electricity_sources[1][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="electricity_sources[1][distance]" value=""></td>
                <td><input type="text" name="electricity_sources[1][name]" value=""></td>
                <td><input type="text" name="electricity_sources[1][address]" value=""></td>
                <td><input type="text" name="electricity_sources[1][dimension]" value=""></td>
                <td><input type="text" name="electricity_sources[1][latitude]" value=""></td>
                <td><input type="text" name="electricity_sources[1][longitude]" value=""></td>
                <td>
                    <select name="electricity_sources[1][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="electricity_sources[1][id]" value="{{ $electricitySources->id ?? '' }}">
                <input type="hidden" name="electricity_sources[1][facility_type]" value="Hydroelectric Power Plant">
            </tr>
            <tr>
                <td>Geothermal Power Station</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="electricity_sources[2][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="electricity_sources[2][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="electricity_sources[2][distance]" value=""></td>
                <td><input type="text" name="electricity_sources[2][name]" value=""></td>
                <td><input type="text" name="electricity_sources[2][address]" value=""></td>
                <td><input type="text" name="electricity_sources[2][dimension]" value=""></td>
                <td><input type="text" name="electricity_sources[2][latitude]" value=""></td>
                <td><input type="text" name="electricity_sources[2][longitude]" value=""></td>
                <td>
                    <select name="electricity_sources[2][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="electricity_sources[2][id]" value="{{ $electricitySources->id ?? '' }}">
                <input type="hidden" name="electricity_sources[2][facility_type]" value="Geothermal Power Station">
            </tr>
            <tr>
                <td>Wind Farm</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="electricity_sources[3][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="electricity_sources[3][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="electricity_sources[3][distance]" value=""></td>
                <td><input type="text" name="electricity_sources[3][name]" value=""></td>
                <td><input type="text" name="electricity_sources[3][address]" value=""></td>
                <td><input type="text" name="electricity_sources[3][dimension]" value=""></td>
                <td><input type="text" name="electricity_sources[3][latitude]" value=""></td>
                <td><input type="text" name="electricity_sources[3][longitude]" value=""></td>
                <td>
                    <select name="electricity_sources[3][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="electricity_sources[3][id]" value="{{ $electricitySources->id ?? '' }}">
                <input type="hidden" name="electricity_sources[3][facility_type]" value="Wind Farm">
            </tr>
            <tr>
                <td>Non-Renewable Power Plant/Station (Coal, Diesel Natural Gas, Nuclear)</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="electricity_sources[4][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="electricity_sources[4][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="electricity_sources[4][distance]" value=""></td>
                <td><input type="text" name="electricity_sources[4][name]" value=""></td>
                <td><input type="text" name="electricity_sources[4][address]" value=""></td>
                <td><input type="text" name="electricity_sources[4][dimension]" value=""></td>
                <td><input type="text" name="electricity_sources[4][latitude]" value=""></td>
                <td><input type="text" name="electricity_sources[4][longitude]" value=""></td>
                <td>
                    <select name="electricity_sources[4][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="electricity_sources[4][id]" value="{{ $electricitySources->id ?? '' }}">
                <input type="hidden" name="electricity_sources[4][facility_type]" value="Non-Renewable Power Plant/Station (Coal, Diesel Natural Gas, Nuclear)">
            </tr>
            <tr>
                <td>Others</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="electricity_sources[5][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="electricity_sources[5][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="electricity_sources[5][distance]" value=""></td>
                <td><input type="text" name="electricity_sources[5][name]" value=""></td>
                <td><input type="text" name="electricity_sources[5][address]" value=""></td>
                <td><input type="text" name="electricity_sources[5][dimension]" value=""></td>
                <td><input type="text" name="electricity_sources[5][latitude]" value=""></td>
                <td><input type="text" name="electricity_sources[5][longitude]" value=""></td>
                <td>
                    <select name="electricity_sources[5][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="electricity_sources[5][id]" value="{{ $electricitySources->id ?? '' }}">
                <input type="hidden" name="electricity_sources[5][facility_type]" value="Others">
            </tr>
           
        </tbody>
    </table>
    <input type="button" id="proceedButton" value="Proceed" onclick="showCategory(8)">
    <input type="button" id="back-btn" value="Back" onclick="showCategory(6)"> <!-- Back Button -->
</div>
    {{-- -----------CATEGORY 8---FINANCIAL AND CREDIT INSTITUTION----------------------------------------------------------------------------------------------
-----------------------------------------------------  FINANCIAL AND CREDIT INSTITUTION ---------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------}}
<div class="category" id="category-8" style="display: none;"> <!-- Example third category -->
    <input type="hidden" name="financial_institutions[0][id]" value="{{ $financialInstitutions->id ?? '' }}">
    <h3 class="category-title">FINACIAL AND CREDIT INSTITUTION</h3>
    <table>
        <thead>
            <tr>
                <th>Finacial and Credit Institution</th>
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
                <td>Bank</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="financial_institutions[0][available]" id="elem_yes" value="yes" required>
                        <label for="elem_yes">Yes</label>
                        <input type="radio" name="financial_institutions[0][available]" id="elem_no" value="no">
                        <label for="elem_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="financial_institutions[0][distance]" value=""></td>
                <td><input type="text" name="financial_institutions[0][name]" value=""></td>
                <td><input type="text" name="financial_institutions[0][address]" value=""></td>
                <td><input type="text" name="financial_institutions[0][dimension]" value=""></td>
                <td><input type="text" name="financial_institutions[0][latitude]" value=""></td>
                <td><input type="text" name="financial_institutions[0][longitude]" value=""></td>
                <td>
                    <select name="financial_institutions[0][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="financial_institutions[0][id]" value="{{ $financialInstitutions->id ?? '' }}">
                <input type="hidden" name="financial_institutions[0][facility_type]" value="Bank">
            </tr>

            <tr>
                <td>Community/Barangay Cooperative</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="financial_institutions[1][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="financial_institutions[1][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="financial_institutions[1][distance]" value=""></td>
                <td><input type="text" name="financial_institutions[1][name]" value=""></td>
                <td><input type="text" name="financial_institutions[1][address]" value=""></td>
                <td><input type="text" name="financial_institutions[1][dimension]" value=""></td>
                <td><input type="text" name="financial_institutions[1][latitude]" value=""></td>
                <td><input type="text" name="financial_institutions[1][longitude]" value=""></td>
                <td>
                    <select name="financial_institutions[1][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="financial_institutions[1][id]" value="{{ $financialInstitutions->id ?? '' }}">
                <input type="hidden" name="financial_institutions[1][facility_type]" value="Community/Barangay Cooperative">
            </tr>
            <tr>
                <td>Microfinance NGOs</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="financial_institutions[2][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="financial_institutions[2][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="financial_institutions[2][distance]" value=""></td>
                <td><input type="text" name="financial_institutions[2][name]" value=""></td>
                <td><input type="text" name="financial_institutions[2][address]" value=""></td>
                <td><input type="text" name="financial_institutions[2][dimension]" value=""></td>
                <td><input type="text" name="financial_institutions[2][latitude]" value=""></td>
                <td><input type="text" name="financial_institutions[2][longitude]" value=""></td>
                <td>
                    <select name="financial_institutions[2][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="financial_institutions[2][id]" value="{{ $financialInstitutions->id ?? '' }}">
                <input type="hidden" name="financial_institutions[2][facility_type]" value="Microfinance NGOs">
            </tr>
            <tr>
                <td>Pawnshops</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="financial_institutions[3][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="financial_institutions[3][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="financial_institutions[3][distance]" value=""></td>
                <td><input type="text" name="financial_institutions[3][name]" value=""></td>
                <td><input type="text" name="financial_institutions[3][address]" value=""></td>
                <td><input type="text" name="financial_institutions[3][dimension]" value=""></td>
                <td><input type="text" name="financial_institutions[3][latitude]" value=""></td>
                <td><input type="text" name="financial_institutions[3][longitude]" value=""></td>
                <td>
                    <select name="financial_institutions[3][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="financial_institutions[3][id]" value="{{ $financialInstitutions->id ?? '' }}">
                <input type="hidden" name="financial_institutions[3][facility_type]" value="Pawnshops">
            </tr>
            <tr>
                <td>Others</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="financial_institutions[4][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="financial_institutions[4][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="financial_institutions[4][distance]" value=""></td>
                <td><input type="text" name="financial_institutions[4][name]" value=""></td>
                <td><input type="text" name="financial_institutions[4][address]" value=""></td>
                <td><input type="text" name="financial_institutions[4][dimension]" value=""></td>
                <td><input type="text" name="financial_institutions[4][latitude]" value=""></td>
                <td><input type="text" name="financial_institutions[4][longitude]" value=""></td>
                <td>
                    <select name="financial_institutions[4][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="financial_institutions[4][id]" value="{{ $financialInstitutions->id ?? '' }}">
                <input type="hidden" name="financial_institutions[4][facility_type]" value="Others">
            </tr>
            
        </tbody>
    </table>
    <input type="button" id="proceedButton" value="Proceed" onclick="showCategory(9)">
    <input type="button" id="back-btn" value="Back" onclick="showCategory(7)"> <!-- Back Button -->
</div>
    {{-- -----------CATEGORY 9---FINANCIAL AND CREDIT INSTITUTION----------------------------------------------------------------------------------------------
-----------------------------------------------------  FINANCIAL AND CREDIT INSTITUTION ---------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------}}
<div class="category" id="category-9" style="display: none;"> <!-- Example third category -->
    <input type="hidden" name="tourist_sites[0][id]" value="{{ $touristSites->id ?? '' }}">
    <h3 class="category-title">TOURIST SITES</h3>
    <table>
        <thead>
            <tr>
                <th>Tourist Sites</th>
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
                <td> Natural Sites(nature parks, reserves,botanical garden)</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="tourist_sites[0][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="tourist_sites[0][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="tourist_sites[0][distance]" value=""></td>
                <td><input type="text" name="tourist_sites[0][name]" value=""></td>
                <td><input type="text" name="tourist_sites[0][address]" value=""></td>
                <td><input type="text" name="tourist_sites[0][dimension]" value=""></td>
                <td><input type="text" name="tourist_sites[0][latitude]" value=""></td>
                <td><input type="text" name="tourist_sites[0][longitude]" value=""></td>
                <td>
                    <select name="tourist_sites[0][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="tourist_sites[0][id]" value="{{ $touristSites->id ?? '' }}">
                <input type="hidden" name="tourist_sites[0][facility_type]" value="Natural Sites(nature parks, reserves,botanical garden)">
            </tr>
            <tr>
                <td> Other</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="tourist_sites[1][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="tourist_sites[1][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="tourist_sites[1][distance]" value=""></td>
                <td><input type="text" name="tourist_sites[1][name]" value=""></td>
                <td><input type="text" name="tourist_sites[1][address]" value=""></td>
                <td><input type="text" name="tourist_sites[1][dimension]" value=""></td>
                <td><input type="text" name="tourist_sites[1][latitude]" value=""></td>
                <td><input type="text" name="tourist_sites[1][longitude]" value=""></td>
                <td>
                    <select name="tourist_sites[1][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="tourist_sites[1][id]" value="{{ $touristSites->id ?? '' }}">
                <input type="hidden" name="tourist_sites[1][facility_type]" value="Other">
            </tr>
        </tbody>
    </table>
    <input type="button" id="proceedButton" value="Proceed" onclick="showCategory(10)">
    <input type="button" id="back-btn" value="Back" onclick="showCategory(8)"> <!-- Back Button -->
</div>
    {{-- -----------CATEGORY 10---GARBAGE AND WASTE DISPOSAL FACILITY----------------------------------------------------------------------------------------------
-----------------------------------------------------  GABAGE AND WASTE DISPOSAL FACILITY---------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------}}
<div class="category" id="category-10" style="display: none;"> <!-- Example third category -->
    <input type="hidden" name="waste_disposal_facilities[0][id]" value="{{ $wasteDisposalFacilities->id ?? '' }}">
    <h3 class="category-title">GARBAGE AND WASTE DISPOSAL FACILITY</h3>
    <table>
        <thead>
            <tr>
                <th>Garbage and Waste Disposal Facility</th>
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
                <td>Open Dump Site</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="waste_disposal_facilities[0][available]" id="elem_yes" value="yes" required>
                        <label for="elem_yes">Yes</label>
                        <input type="radio" name="waste_disposal_facilities[0][available]" id="elem_no" value="no">
                        <label for="elem_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="waste_disposal_facilities[0][distance]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[0][name]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[0][address]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[0][dimension]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[0][latitude]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[0][longitude]" value=""></td>
                <td>
                    <select name="waste_disposal_facilities[0][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="waste_disposal_facilities[0][id]" value="{{ $financialInstitutions->id ?? '' }}">
                <input type="hidden" name="waste_disposal_facilities[0][facility_type]" value="Open Dump Site">
            </tr>

            <tr>
                <td>Sanitary Landfill</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="waste_disposal_facilities[1][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="waste_disposal_facilities[1][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="waste_disposal_facilities[1][distance]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[1][name]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[1][address]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[1][dimension]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[1][latitude]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[1][longitude]" value=""></td>
                <td>
                    <select name="waste_disposal_facilities[1][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="waste_disposal_facilities[1][id]" value="{{ $financialInstitutions->id ?? '' }}">
                <input type="hidden" name="waste_disposal_facilities[1][facility_type]" value="Sanitary Landfill">
            </tr>
            <tr>
                <td>Barangay Compost Pits</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="waste_disposal_facilities[2][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="waste_disposal_facilities[2][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="waste_disposal_facilities[2][distance]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[2][name]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[2][address]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[2][dimension]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[2][latitude]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[2][longitude]" value=""></td>
                <td>
                    <select name="waste_disposal_facilities[2][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="waste_disposal_facilities[2][id]" value="{{ $financialInstitutions->id ?? '' }}">
                <input type="hidden" name="waste_disposal_facilities[2][facility_type]" value="Barangay Compost Pits">
            </tr>
            <tr>
                <td>Material Recovery Facility(MRF)</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="waste_disposal_facilities[3][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="waste_disposal_facilities[3][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="waste_disposal_facilities[3][distance]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[3][name]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[3][address]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[3][dimension]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[3][latitude]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[3][longitude]" value=""></td>
                <td>
                    <select name="waste_disposal_facilities[3][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="waste_disposal_facilities[3][id]" value="{{ $wasteDisposalFacilities->id ?? '' }}">
                <input type="hidden" name="waste_disposal_facilities[3][facility_type]" value="Material Recovery Facility(MRF)">
            </tr>
            <tr>
                <td>Others</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="waste_disposal_facilities[4][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="waste_disposal_facilities[4][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="waste_disposal_facilities[4][distance]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[4][name]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[4][address]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[4][dimension]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[4][latitude]" value=""></td>
                <td><input type="text" name="waste_disposal_facilities[4][longitude]" value=""></td>
                <td>
                    <select name="waste_disposal_facilities[4][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="waste_disposal_facilities[4][id]" value="{{ $wasteDisposalFacilities->id ?? '' }}">
                <input type="hidden" name="waste_disposal_facilities[4][facility_type]" value="Others">
            </tr>
            
        </tbody>
    </table>
    <input type="button" id="proceedButton" value="Proceed" onclick="showCategory(11)">
    <input type="button" id="back-btn" value="Back" onclick="showCategory(9)"> <!-- Back Button -->
</div>
{{-- Mode of Transportation --}}
<div class="category" id="category-11" style="display: none;"> <!-- Example third category -->
    
    <input type="hidden" name="transportation_modes[0][id]" value="{{ $transportationModes->id ?? '' }}">
    <h3 class="category-title">MODE OF TRANSPORTATION</h3>
    <table >
        <thead>
            <tr>
                <th>Mode of Transportation</th>
                <th>Does this barangay have at least one?</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jeepney</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="transportation_modes[0][available]" id="elem_yes" value="yes" required>
                        <label for="elem_yes">Yes</label>
                        <input type="radio" name="transportation_modes[0][available]" id="elem_no" value="no">
                        <label for="elem_no">No</label>
                    </div>
                </td>
                <input type="hidden" name="transportation_modes[0][id]" value="{{ $transportationModes->id ?? '' }}">
                <input type="hidden" name="transportation_modes[0][mode_of_transpo]" value="Jeepney">
            </tr>

            <tr>
                <td>Tricycle</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="transportation_modes[1][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="transportation_modes[1][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
    
                <input type="hidden" name="transportation_modes[1][id]" value="{{ $transportationModes->id ?? '' }}">
                <input type="hidden" name="transportation_modes[1][mode_of_transpo]" value="Tricycle">
            </tr>
            <tr>
                <td>Pedicab</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="transportation_modes[2][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="transportation_modes[2][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <input type="hidden" name="transportation_modes[2][id]" value="{{ $transportationModes->id ?? '' }}">
                <input type="hidden" name="transportation_modes[2][mode_of_transpo]" value="Pedicab">
            </tr>
            <tr>
                <td>Boat/Motorized Banca</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="transportation_modes[3][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="transportation_modes[3][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
    
                <input type="hidden" name="transportation_modes[3][id]" value="{{ $transportationModes->id ?? '' }}">
                <input type="hidden" name="transportation_modes[3][mode_of_transpo]" value="Boat/Motorized Banca">
            </tr>
            <tr>
                <td>Other</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="transportation_modes[4][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="transportation_modes[4][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                    <input type="text" name="transportation_modes[4][other]" value="" placeholder="Specify if Other">
                </td>
                <input type="hidden" name="transportation_modes[4][id]" value="{{ $transportationModes->id ?? '' }}">
                <input type="hidden" name="transportation_modes[4][mode_of_transpo]" value="Other">
            </tr>
            
        </tbody>
    </table>
    <input type="button" id="proceedButton" value="Proceed" onclick="showCategory(12)">
    <input type="button" id="back-btn" value="Back" onclick="showCategory(10)"> <!-- Back Button -->
</div>
{{-- ICT Questions --}}
<div class="category" id="category-12" style="display: none;"> <!-- Example third category -->
    
    <input type="hidden" name="icts[0][id]" value="{{ $ictsQ->id ?? '' }}">
    <h3 class="category-title">INFORMATION ADN COMMUNICATION TECHNOLOGY</h3>
    <table >
        <thead>
            <tr>
                <th>IT1</th>
                <th>Available</th>
                <th>What is the available cellphone network signal in the barangay?</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Is cellphone network signal available in the barangay?</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="icts[0][available]" id="elem_yes" value="yes" required>
                        <label for="elem_yes">Yes</label>
                        <input type="radio" name="icts[0][available]" id="elem_no" value="no">
                        <label for="elem_no">No</label>
                    </div>
                </td>
                <td>
                    <select name="icts[0][existing]">
                        <option value="2G">2G(E or G)</option>
                        <option value="3G">3G(3G or H or H+)</option>
                        <option value="4G">4G(LTE or LTE-A or 4G)</option>
                        <option value="5G">5G</option>
                    </select>
                </td>
                <input type="hidden" name="icts[0][id]" value="{{ $ictsQ->id ?? '' }}">
                <input type="hidden" name="icts[0][ict_q]" value="Is cellphone network signal available in the barangay?">
            </tr>
            <thead>
                <tr>
                    <th>IT2</th>
                    <th>Available</th>
                    <th>How many are the existing telecommunication/cellular tower/s
                        in the barangay? </th>
                    
                </tr>
            </thead>
            <tr>
                <td>Is there an existing telecommunication/cellular tower/s in the barangay?</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="icts[1][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="icts[1][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="icts[1][existing]" value=""></td>
    
                <input type="hidden" name="icts[1][id]" value="{{ $ictsQ->id ?? '' }}">
                <input type="hidden" name="icts[1][ict_q]" value="Is there an existing telecommunication/cellular tower/s in the barangay?">
            </tr>
            <thead>
                <tr>
                    <th>IT3</th>
                    <th>Available</th>
                    <th>What is the coverage of the free Wi-Fi? </th>
                    
                </tr>
            </thead>
            <tr>
                <td>Is free Wi-Fi available in the barangay? </td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="icts[2][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="icts[2][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="icts[2][existing]" value=""></td>
                <input type="hidden" name="icts[2][id]" value="{{ $ictsQ->id ?? '' }}">
                <input type="hidden" name="icts[2][ict_q]" value="Is free Wi-Fi available in the barangay?">
            </tr>
        </tbody>
    </table>
    <div style="padding-top: 20px; width:40%; display:contents">
    <table>
        <input type="hidden" name="wifi_providers[0][id]" value="{{ $wifiprovider->id ?? '' }}">
        <thead>
            <tr>
                <th colspan="2">IT4</th>
                
            </tr>
        </thead>
        <tr>
            {{-- <input type="hidden" name="icts[0][id]" value="{{ $wifiprovider->id ?? '' }}"> --}}
            <td> Who provides the free Wi-Fi in the barangay?</td>
            <td><input type="text" name="wifi_providers[0][provider]" value=""></td>
            <input type="hidden" name="wifi_providers[0][id]" value="{{ $wifiprovider->id ?? '' }}">
            <input type="hidden" name="wifi_providers[0][question]" value="Who provides the free Wi-Fi in the barangay?">
        </tr>
    </table></div>
    
    <input type="button" id="proceedButton" value="Proceed" onclick="showCategory(13)">
    <input type="button" id="back-btn" value="Back" onclick="showCategory(11)"> <!-- Back Button -->
</div>
</body>
</html>