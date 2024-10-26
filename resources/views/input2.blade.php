<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- -----------CATEGORY 4 ----Service FACILITY----------------------------------------------------------------------------------------------
-----------------------------------------------------  SERVICE FACILITY ---------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------}}
<div class="category" id="category-4" style="display: none;"> <!-- Example third category -->
    <input type="hidden" name="services_facilities[0][id]" value="{{ $servicesFacility->id ?? '' }}">
    <h3 class="category-title">SERVICE FACILITY</h3>
    <table>
        <thead>
            <tr>
                <th>SERVICES Facility</th>
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
                <td>  Multi-purpose Hall</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[0][available]" id="yes" value="yes" required>
                        <label for="elem_yes">Yes</label>
                        <input type="radio" name="services_facilities[0][available]" id="no" value="no">
                        <label for="elem_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[0][distance]" value=""></td>
                <td><input type="text" name="services_facilities[0][name]" value=""></td>
                <td><input type="text" name="services_facilities[0][address]" value=""></td>
                <td><input type="text" name="services_facilities[0][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[0][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[0][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[0][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[0][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[0][facility_type]" value=" Multi-purpose Hall">
            </tr>

            <tr>
                <td>Police Station</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[1][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[1][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[1][distance]" value=""></td>
                <td><input type="text" name="services_facilities[1][name]" value=""></td>
                <td><input type="text" name="services_facilities[1][address]" value=""></td>
                <td><input type="text" name="services_facilities[1][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[1][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[1][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[1][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[1][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[1][facility_type]" value="Police Station">
            </tr>
            <tr>
                <td>Jail</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[2][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[2][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[2][distance]" value=""></td>
                <td><input type="text" name="services_facilities[2][name]" value=""></td>
                <td><input type="text" name="services_facilities[2][address]" value=""></td>
                <td><input type="text" name="services_facilities[2][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[2][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[2][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[2][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[2][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[2][facility_type]" value="Jail ">
            </tr>
            <tr>
                <td>Fire Station</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[3][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[3][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[3][distance]" value=""></td>
                <td><input type="text" name="services_facilities[3][name]" value=""></td>
                <td><input type="text" name="services_facilities[3][address]" value=""></td>
                <td><input type="text" name="services_facilities[3][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[3][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[3][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[3][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[3][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[3][facility_type]" value="Fire Station">
            </tr>
            <tr>
                <td> Public Plaza/Parks/Garden/Sports court, etc.</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[4][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[4][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[4][distance]" value=""></td>
                <td><input type="text" name="services_facilities[4][name]" value=""></td>
                <td><input type="text" name="services_facilities[4][address]" value=""></td>
                <td><input type="text" name="services_facilities[4][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[4][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[4][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[4][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[4][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[4][facility_type]" value="Public Plaza/Parks/Garden/Sports court, etc.">
            </tr>
            <tr>
                <td>Disaster Risk Reduction Desk/Office</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[5][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[5][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[5][distance]" value=""></td>
                <td><input type="text" name="services_facilities[5][name]" value=""></td>
                <td><input type="text" name="services_facilities[5][address]" value=""></td>
                <td><input type="text" name="services_facilities[5][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[5][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[5][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[5][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[5][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[5][facility_type]" value="Disaster Risk Reduction Desk/Office">
            </tr>
            <tr>
                <td>Violence against Women and their Children(VAWC) Office</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[6][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[6][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[6][distance]" value=""></td>
                <td><input type="text" name="services_facilities[6][name]" value=""></td>
                <td><input type="text" name="services_facilities[6][address]" value=""></td>
                <td><input type="text" name="services_facilities[6][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[6][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[6][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[6][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[6][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[6][facility_type]" value="Violence against Women and their Children(VAWC) Office">
            </tr>
            <tr>
                <td> Go Negosyo Center</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[7][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[7][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[7][distance]" value=""></td>
                <td><input type="text" name="services_facilities[7][name]" value=""></td>
                <td><input type="text" name="services_facilities[7][address]" value=""></td>
                <td><input type="text" name="services_facilities[7][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[7][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[7][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[7][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[7][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[7][facility_type]" value=" Go Negosyo Center">
            </tr>
            <tr>
                <td>Person with Disabilities Affairs Office</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[8][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[8][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[8][distance]" value=""></td>
                <td><input type="text" name="services_facilities[8][name]" value=""></td>
                <td><input type="text" name="services_facilities[8][address]" value=""></td>
                <td><input type="text" name="services_facilities[8][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[8][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[8][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[8][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[8][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[8][facility_type]" value="Person with Disabilities Affairs Office">
            </tr>
            <tr>
                <td>Office of Senior Citizen Affairs</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[9][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[9][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[9][distance]" value=""></td>
                <td><input type="text" name="services_facilities[9][name]" value=""></td>
                <td><input type="text" name="services_facilities[9][address]" value=""></td>
                <td><input type="text" name="services_facilities[9][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[9][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[9][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[9][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[9][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[9][facility_type]" value="Office of Senior Citizen Affairs">
            </tr>
            <tr>
                <td>Local Council for Protection of Children Office</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[10][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[10][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[10][distance]" value=""></td>
                <td><input type="text" name="services_facilities[10][name]" value=""></td>
                <td><input type="text" name="services_facilities[10][address]" value=""></td>
                <td><input type="text" name="services_facilities[10][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[10][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[10][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[10][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[10][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[10][facility_type]" value="Local Council for Protection of Children Office">
            </tr>
            <tr>
                <td>Post Office/Postal Service</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[11][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[11][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[11][distance]" value=""></td>
                <td><input type="text" name="services_facilities[11][name]" value=""></td>
                <td><input type="text" name="services_facilities[11][address]" value=""></td>
                <td><input type="text" name="services_facilities[11][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[11][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[11][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[11][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[11][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[11][facility_type]" value="Post Office/Postal Service">
            </tr>
            <tr>
                <td>Evacuation Center</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[12][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[12][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[12][distance]" value=""></td>
                <td><input type="text" name="services_facilities[12][name]" value=""></td>
                <td><input type="text" name="services_facilities[12][address]" value=""></td>
                <td><input type="text" name="services_facilities[12][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[12][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[12][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[12][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[12][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[12][facility_type]" value="Evacuation Center">
            </tr>
            <tr>
                <td>Library</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[13][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[13][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[13][distance]" value=""></td>
                <td><input type="text" name="services_facilities[13][name]" value=""></td>
                <td><input type="text" name="services_facilities[13][address]" value=""></td>
                <td><input type="text" name="services_facilities[13][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[13][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[13][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[13][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[13][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[13][facility_type]" value="Library">
            </tr>
            <tr>
                <td>Public Market</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[14][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[14][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[14][distance]" value=""></td>
                <td><input type="text" name="services_facilities[14][name]" value=""></td>
                <td><input type="text" name="services_facilities[14][address]" value=""></td>
                <td><input type="text" name="services_facilities[14][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[14][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[14][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[14][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[14][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[14][facility_type]" value="Public Market">
            </tr>
            <tr>
                <td>Communal Toilet</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[15][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[15][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[15][distance]" value=""></td>
                <td><input type="text" name="services_facilities[15][name]" value=""></td>
                <td><input type="text" name="services_facilities[15][address]" value=""></td>
                <td><input type="text" name="services_facilities[15][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[15][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[15][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[15][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[15][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[15][facility_type]" value="Communal Toilet">
            </tr>
            <tr>
                <td>Cementery/Memorial Park</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[16][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[16][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[16][distance]" value=""></td>
                <td><input type="text" name="services_facilities[16][name]" value=""></td>
                <td><input type="text" name="services_facilities[16][address]" value=""></td>
                <td><input type="text" name="services_facilities[16][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[16][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[16][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[16][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[16][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[16][facility_type]" value="Cementery/Memorial Park">
            </tr>
            <tr>
                <td>Others</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="services_facilities[17][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="services_facilities[17][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="services_facilities[17][distance]" value=""></td>
                <td><input type="text" name="services_facilities[17][name]" value=""></td>
                <td><input type="text" name="services_facilities[17][address]" value=""></td>
                <td><input type="text" name="services_facilities[17][dimension]" value=""></td>
                <td><input type="text" name="services_facilities[17][latitude]" value=""></td>
                <td><input type="text" name="services_facilities[17][longitude]" value=""></td>
                <td>
                    <select name="services_facilities[17][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="services_facilities[17][id]" value="{{ $servicesFacility->id ?? '' }}">
                <input type="hidden" name="services_facilities[17][facility_type]" value="Others">
            </tr>
           
        </tbody>
    </table>
    <input type="button" id="proceedButton" value="Proceed" onclick="showCategory(5)">
    <input type="button" id="back-btn" value="Back" onclick="showCategory(3)"> <!-- Back Button -->
    {{-- @include('input') --}}
</div>
{{-- -----------CATEGORY 5 ----AGRICULTURE FACILITY----------------------------------------------------------------------------------------------
-----------------------------------------------------  AGRICULTURE FACILITY ---------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------}}
<div class="category" id="category-5" style="display: none;"> <!-- Example third category -->
    <input type="hidden" name="agriculture_facilities[0][id]" value="{{ $agricultureFacility->id ?? '' }}">
    <h3 class="category-title">AGRICULTURE FACILITY</h3>
    <table>
        <thead>
            <tr>
                <th>Agriculture Facility</th>
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
                <td> Rice Mill</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="agriculture_facilities[0][available]" id="elem_yes" value="yes" required>
                        <label for="elem_yes">Yes</label>
                        <input type="radio" name="agriculture_facilities[0][available]" id="elem_no" value="no">
                        <label for="elem_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="agriculture_facilities[0][distance]" value=""></td>
                <td><input type="text" name="agriculture_facilities[0][name]" value=""></td>
                <td><input type="text" name="agriculture_facilities[0][address]" value=""></td>
                <td><input type="text" name="agriculture_facilities[0][dimension]" value=""></td>
                <td><input type="text" name="agriculture_facilities[0][latitude]" value=""></td>
                <td><input type="text" name="agriculture_facilities[0][longitude]" value=""></td>
                <td>
                    <select name="agriculture_facilities[0][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="agriculture_facilities[0][id]" value="{{ $agricultureFacility->id ?? '' }}">
                <input type="hidden" name="agriculture_facilities[0][facility_type]" value=" Rice Mill">
            </tr>

            <tr>
                <td>Corn Mill</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="agriculture_facilities[1][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="agriculture_facilities[1][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="agriculture_facilities[1][distance]" value=""></td>
                <td><input type="text" name="agriculture_facilities[1][name]" value=""></td>
                <td><input type="text" name="agriculture_facilities[1][address]" value=""></td>
                <td><input type="text" name="agriculture_facilities[1][dimension]" value=""></td>
                <td><input type="text" name="agriculture_facilities[1][latitude]" value=""></td>
                <td><input type="text" name="agriculture_facilities[1][longitude]" value=""></td>
                <td>
                    <select name="agriculture_facilities[1][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="agriculture_facilities[1][id]" value="{{ $agricultureFacility->id ?? '' }}">
                <input type="hidden" name="agriculture_facilities[1][facility_type]" value="Corn Mill">
            </tr>
            <tr>
                <td>Mechanical/Electrical/Solar Dryer(coconut,rice,etc.) </td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="agriculture_facilities[2][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="agriculture_facilities[2][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="agriculture_facilities[2][distance]" value=""></td>
                <td><input type="text" name="agriculture_facilities[2][name]" value=""></td>
                <td><input type="text" name="agriculture_facilities[2][address]" value=""></td>
                <td><input type="text" name="agriculture_facilities[2][dimension]" value=""></td>
                <td><input type="text" name="agriculture_facilities[2][latitude]" value=""></td>
                <td><input type="text" name="agriculture_facilities[2][longitude]" value=""></td>
                <td>
                    <select name="agriculture_facilities[2][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="agriculture_facilities[2][id]" value="{{ $agricultureFacility->id ?? '' }}">
                <input type="hidden" name="agriculture_facilities[2][facility_type]" value="Mechanical/Electrical/Solar Dryer(coconut,rice,etc.) ">
            </tr>
            <tr>
                <td> Agriculture Produce Market (permanent/ periodic/talipapa/ weekend market)</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="agriculture_facilities[3][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="agriculture_facilities[3][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="agriculture_facilities[3][distance]" value=""></td>
                <td><input type="text" name="agriculture_facilities[3][name]" value=""></td>
                <td><input type="text" name="agriculture_facilities[3][address]" value=""></td>
                <td><input type="text" name="agriculture_facilities[3][dimension]" value=""></td>
                <td><input type="text" name="agriculture_facilities[3][latitude]" value=""></td>
                <td><input type="text" name="agriculture_facilities[3][longitude]" value=""></td>
                <td>
                    <select name="agriculture_facilities[3][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="agriculture_facilities[3][id]" value="{{ $agricultureFacility->id ?? '' }}">
                <input type="hidden" name="agriculture_facilities[3][facility_type]" value="Agriculture Produce Market(permanent/ periodic/talipapa/ weekend market)">
            </tr>
            <tr>
                <td>Commercial Agriculture Warehouse</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="agriculture_facilities[4][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="agriculture_facilities[4][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="agriculture_facilities[4][distance]" value=""></td>
                <td><input type="text" name="agriculture_facilities[4][name]" value=""></td>
                <td><input type="text" name="agriculture_facilities[4][address]" value=""></td>
                <td><input type="text" name="agriculture_facilities[4][dimension]" value=""></td>
                <td><input type="text" name="agriculture_facilities[4][latitude]" value=""></td>
                <td><input type="text" name="agriculture_facilities[4][longitude]" value=""></td>
                <td>
                    <select name="agriculture_facilities[4][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="agriculture_facilities[4][id]" value="{{ $agricultureFacility->id ?? '' }}">
                <input type="hidden" name="agriculture_facilities[4][facility_type]" value="Commercial Agriculture Warehouse(CAW)">
            </tr>
            <tr>
                <td>Nursery/Greenhouse/Screen House/ Nethouse</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="agriculture_facilities[5][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="agriculture_facilities[5][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="agriculture_facilities[5][distance]" value=""></td>
                <td><input type="text" name="agriculture_facilities[5][name]" value=""></td>
                <td><input type="text" name="agriculture_facilities[5][address]" value=""></td>
                <td><input type="text" name="agriculture_facilities[5][dimension]" value=""></td>
                <td><input type="text" name="agriculture_facilities[5][latitude]" value=""></td>
                <td><input type="text" name="agriculture_facilities[5][longitude]" value=""></td>
                <td>
                    <select name="agriculture_facilities[5][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="agriculture_facilities[5][id]" value="{{ $agricultureFacility->id ?? '' }}">
                <input type="hidden" name="agriculture_facilities[5][facility_type]" value="Nursery/Greenhouse/Screen House/ Nethouse">
            </tr>
            <tr>
                <td>Others</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="agriculture_facilities[6][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="agriculture_facilities[6][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="agriculture_facilities[6][distance]" value=""></td>
                <td><input type="text" name="agriculture_facilities[6][name]" value=""></td>
                <td><input type="text" name="agriculture_facilities[6][address]" value=""></td>
                <td><input type="text" name="agriculture_facilities[6][dimension]" value=""></td>
                <td><input type="text" name="agriculture_facilities[6][latitude]" value=""></td>
                <td><input type="text" name="agriculture_facilities[6][longitude]" value=""></td>
                <td>
                    <select name="agriculture_facilities[6][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="agriculture_facilities[6][id]" value="{{ $agricultureFacility->id ?? '' }}">
                <input type="hidden" name="agriculture_facilities[6][facility_type]" value="Others">
            </tr>
           
        </tbody>
    </table>
    <input type="button" id="proceedButton" value="Proceed" onclick="showCategory(6)">
    <input type="button" id="back-btn" value="Back" onclick="showCategory(4)"> <!-- Back Button -->
</div>
{{-- -----------CATEGORY 6----Water FACILITY----------------------------------------------------------------------------------------------
-----------------------------------------------------  water FACILITY ---------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------}}
<div class="category" id="category-6" style="display: none;"> <!-- Example third category -->
    <input type="hidden" name="water_facilities[0][id]" value="{{ $waterFacility->id ?? '' }}">
    <h3 class="category-title">Water FACILITY</h3>
    <table>
        <thead>
            <tr>
                <th>Water Facility</th>
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
                <td> Deep Well</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="water_facilities[0][available]" id="elem_yes" value="yes" required>
                        <label for="elem_yes">Yes</label>
                        <input type="radio" name="water_facilities[0][available]" id="elem_no" value="no">
                        <label for="elem_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="water_facilities[0][distance]" value=""></td>
                <td><input type="text" name="water_facilities[0][name]" value=""></td>
                <td><input type="text" name="water_facilities[0][address]" value=""></td>
                <td><input type="text" name="water_facilities[0][dimension]" value=""></td>
                <td><input type="text" name="water_facilities[0][latitude]" value=""></td>
                <td><input type="text" name="water_facilities[0][longitude]" value=""></td>
                <td>
                    <select name="water_facilities[0][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="water_facilities[0][id]" value="{{ $waterFacility->id ?? '' }}">
                <input type="hidden" name="water_facilities[0][facility_type]" value=" Deep Well">
            </tr>

            <tr>
                <td>Artesian Well</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="water_facilities[1][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="water_facilities[1][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="water_facilities[1][distance]" value=""></td>
                <td><input type="text" name="water_facilities[1][name]" value=""></td>
                <td><input type="text" name="water_facilities[1][address]" value=""></td>
                <td><input type="text" name="water_facilities[1][dimension]" value=""></td>
                <td><input type="text" name="water_facilities[1][latitude]" value=""></td>
                <td><input type="text" name="water_facilities[1][longitude]" value=""></td>
                <td>
                    <select name="water_facilities[1][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="water_facilities[1][id]" value="{{ $waterFacility->id ?? '' }}">
                <input type="hidden" name="water_facilities[1][facility_type]" value="Artesian Well">
            </tr>
            <tr>
                <td>Shallow Well</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="water_facilities[2][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="water_facilities[2][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="water_facilities[2][distance]" value=""></td>
                <td><input type="text" name="water_facilities[2][name]" value=""></td>
                <td><input type="text" name="water_facilities[2][address]" value=""></td>
                <td><input type="text" name="water_facilities[2][dimension]" value=""></td>
                <td><input type="text" name="water_facilities[2][latitude]" value=""></td>
                <td><input type="text" name="water_facilities[2][longitude]" value=""></td>
                <td>
                    <select name="water_facilities[2][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="water_facilities[2][id]" value="{{ $waterFacility->id ?? '' }}">
                <input type="hidden" name="water_facilities[2][facility_type]" value="Shallow Well">
            </tr>
            <tr>
                <td>Water Refill Station</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="water_facilities[3][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="water_facilities[3][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="water_facilities[3][distance]" value=""></td>
                <td><input type="text" name="water_facilities[3][name]" value=""></td>
                <td><input type="text" name="water_facilities[3][address]" value=""></td>
                <td><input type="text" name="water_facilities[3][dimension]" value=""></td>
                <td><input type="text" name="water_facilities[3][latitude]" value=""></td>
                <td><input type="text" name="water_facilities[3][longitude]" value=""></td>
                <td>
                    <select name="water_facilities[3][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="water_facilities[3][id]" value="{{ $waterFacility->id ?? '' }}">
                <input type="hidden" name="water_facilities[3][facility_type]" value="Water Refill Station(WRS)">
            </tr>
            <tr>
                <td>Water System(Communal Faucet System or Standposts)</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="water_facilities[4][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="water_facilities[4][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="water_facilities[4][distance]" value=""></td>
                <td><input type="text" name="water_facilities[4][name]" value=""></td>
                <td><input type="text" name="water_facilities[4][address]" value=""></td>
                <td><input type="text" name="water_facilities[4][dimension]" value=""></td>
                <td><input type="text" name="water_facilities[4][latitude]" value=""></td>
                <td><input type="text" name="water_facilities[4][longitude]" value=""></td>
                <td>
                    <select name="water_facilities[4][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="water_facilities[4][id]" value="{{ $waterFacility->id ?? '' }}">
                <input type="hidden" name="water_facilities[4][facility_type]" value="Water System(Communal Faucet System or Standposts)">
            </tr>
            <tr>
                <td>Level III Water system (reservoir, piped distribution within adequate network)</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="water_facilities[6][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="water_facilities[6][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="water_facilities[6][distance]" value=""></td>
                <td><input type="text" name="water_facilities[6][name]" value=""></td>
                <td><input type="text" name="water_facilities[6][address]" value=""></td>
                <td><input type="text" name="water_facilities[6][dimension]" value=""></td>
                <td><input type="text" name="water_facilities[6][latitude]" value=""></td>
                <td><input type="text" name="water_facilities[6][longitude]" value=""></td>
                <td>
                    <select name="water_facilities[6][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="water_facilities[6][id]" value="{{ $waterFacility->id ?? '' }}">
                <input type="hidden" name="water_facilities[6][facility_type]" value="Level III Water system (reservoir, piped distribution within adequate network)">
            </tr>
            <tr>
                <td>Others</td>
                <td>
                    <div class="radio-container">
                        <input type="radio" name="water_facilities[7][available]" id="high_yes" value="yes">
                        <label for="high_yes">Yes</label>
                        <input type="radio" name="water_facilities[7][available]" id="high_no" value="no">
                        <label for="high_no">No</label>
                    </div>
                </td>
                <td><input type="text" name="water_facilities[7][distance]" value=""></td>
                <td><input type="text" name="water_facilities[7][name]" value=""></td>
                <td><input type="text" name="water_facilities[7][address]" value=""></td>
                <td><input type="text" name="water_facilities[7][dimension]" value=""></td>
                <td><input type="text" name="water_facilities[7][latitude]" value=""></td>
                <td><input type="text" name="water_facilities[7][longitude]" value=""></td>
                <td>
                    <select name="water_facilities[7][institution]">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        <option value="provincial">Provincial Government</option>
                        <option value="municipal">City/Municipal Government</option>
                        <option value="barangay">Barangay Government</option>
                        <option value="ngos">NGOs</option>
                    </select>
                </td>
                <input type="hidden" name="water_facilities[7][id]" value="{{ $waterFacility->id ?? '' }}">
                <input type="hidden" name="water_facilities[7][facility_type]" value="Others">
            </tr>
           
        </tbody>
    </table>
    <input type="button" id="proceedButton" value="Proceed" onclick="showCategory(7)">
    <input type="button" id="back-btn" value="Back" onclick="showCategory(5)"> <!-- Back Button -->
    
</div>
</body>
</html>