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
    <div class="form-container">
        <form method="POST" action="{{ route('barangay.store') }}" name="barangay.form" id="barangay-form">
            @csrf <!-- CSRF token -->
            <input type="hidden" name="id" id="barangay_id" value="{{ $barangay->id ?? '' }}"> <!-- Hidden ID field for editing -->
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
            
                <input type="button" value="Proceed" onclick="showCategory(2)">
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
                            <th>Other Services/Facilities Present</th>
                            <th>Government Project Completed in Last 3 Years?</th>
                            <th>Type of Institution</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Barangay Health Center</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="bhc_available" id="yes1" value="yes" {{ old('bhc_available', $barangay->bhc_available ?? '') == 'yes' ? 'checked' : '' }}>
                                    <label for="yes1">Yes</label>
                                    <input type="radio" name="bhc_available" id="no1" value="no" {{ old('bhc_available', $barangay->bhc_available ?? '') == 'no' ? 'checked' : '' }}>
                                    <label for="no1">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="bhc_distance" value="{{ $barangay->bhc_distance ?? '' }}"></td>
                            <td><input type="text" name="bhc_name" value="{{ $barangay->bhc_name ?? '' }}"></td>
                            <td><input type="text" name="bhc_address" value="{{ $barangay->bhc_address ?? '' }}"></td>
                            <td><input type="text" name="bhc_services" value="{{ $barangay->bhc_services ?? '' }}"></td>
                            <td>
                                <input type="checkbox" name="bhc_gov_project" {{ isset($barangay) && $barangay->bhc_gov_project ? 'checked' : '' }}>
                            </td>
                            <td>
                                <select name="bhc_institution">
                                    <option value="private" {{ isset($barangay) && $barangay->bhc_institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ isset($barangay) && $barangay->bhc_institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ isset($barangay) && $barangay->bhc_institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ isset($barangay) && $barangay->bhc_institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ isset($barangay) && $barangay->bhc_institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ isset($barangay) && $barangay->bhc_institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                            
                            <td><input type="text" name="bhc_remarks" value="{{ $barangay->bhc_remarks ?? '' }}"></td>
                        </tr>                        
                        <tr>
                            <td>Hospital</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="yes_no" id="yes1" value="yes" {{ old('hospital_available', $barangay->hospital_available ?? '') == 'yes' ? 'checked' : '' }}>
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="yes_no" id="no21" value="no" {{ old('hospital_available', $barangay->hospital_available ?? '') == 'no' ? 'checked' : '' }}>
                                    <label for="no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="hospital_distance" value="{{ $barangay->hospital_distance ?? '' }}"></td>
                            <td><input type="text" name="hospital_name" value="{{ $barangay->hospital_name ?? '' }}"></td>
                            <td><input type="text" name="hospital_address" value="{{ $barangay->hospital_address ?? '' }}"></td>
                            <td><input type="text" name="hospital_services" value="{{ $barangay->hospital_services ?? '' }}"></td>
                            <td><input type="checkbox" name="hospital_gov_project" value="{{ $barangay->hospital_gov_project ?? '' }}"></td>
                            <td>
                                <select name="hospital_institution">
                                    <option value="private" {{ isset($barangay) && $barangay->hospital_institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ isset($barangay) && $barangay->hospital_institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ isset($barangay) && $barangay->hospital_institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ isset($barangay) && $barangay->hospital_institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ isset($barangay) && $barangay->hospital_institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ isset($barangay) && $barangay->hospital_institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                            </td>
                            <td><input type="text" name="hospital_remarks" value="{{ $barangay->remarks ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Rural Health Unit (RHU)/Urban Health Center</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="yes_no" id="yes2" value="yes" {{ old('rhu_available', $barangay->rhu_available ?? '') == 'yes' ? 'checked' : '' }}>
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="yes_no" id="no2" value="no" {{ old('rhu_available', $barangay->rhu_available ?? '') == 'no' ? 'checked' : '' }}>
                                    <label for="no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="rhu_distance" value="{{ $barangay->rhu_distance ?? '' }}"></td>
                            <td><input type="text" name="rhu_name" value="{{ $barangay->rhu_name ?? '' }}"></td>
                            <td><input type="text" name="rhu_address" value="{{ $barangay->rhu_address ?? '' }}"></td>
                            <td><input type="text" name="rhu_services" value="{{ $barangay->rhu_services ?? '' }}"></td>
                            <td><input type="checkbox" name="rhu_gov_project" value="{{ $barangay->rhu_gov_project ?? '' }}"></td>
                            <td>
                                <select name="rhu_institution">
                                    <option value="private" {{ isset($barangay) && $barangay->rhu_institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ isset($barangay) && $barangay->rhu_institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ isset($barangay) && $barangay->rhu_institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ isset($barangay) && $barangay->rhu_institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ isset($barangay) && $barangay->rhu_institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ isset($barangay) && $barangay->rhu_institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                            <td><input type="text" name="rhu_remarks" value="{{ $barangay->rhu_remarks ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Maternity/Living-in Clinic/Birthing Home</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="yes_no" id="yes3" value="yes" {{ old('maternity_available', $barangay->maternity_available ?? '') == 'yes' ? 'checked' : '' }}>
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="yes_no" id="no3" value="no" {{ old('maternity_available', $barangay->maternity_available ?? '') == 'no' ? 'checked' : '' }}>
                                    <label for="no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="maternity_distance" value="{{ $barangay->maternity_distance ?? '' }}"></td>
                            <td><input type="text" name="maternity_name" value="{{ $barangay->maternity_name ?? '' }}"></td>
                            <td><input type="text" name="maternity_address" value="{{ $barangay->maternity_address ?? '' }}"></td>
                            <td><input type="text" name="maternity_services" value="{{ $barangay->maternity_services ?? '' }}"></td>
                            <td><input type="checkbox" name="maternity_gov_project" value="{{ $barangay->maternity_gov_project?? '' }}"></td>
                            <td>
                                <select name="maternity_institution">
                                    <option value="private" {{ isset($barangay) && $barangay->maternity_institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ isset($barangay) && $barangay->maternity_institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ isset($barangay) && $barangay->maternity_institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ isset($barangay) && $barangay->maternity_institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ isset($barangay) && $barangay->maternity_institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ isset($barangay) && $barangay->maternity_institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                            <td><input type="text" name="maternity_remarks" maternity_remarks></td>
                        </tr>
                        <tr>
                            <td>Pharmacy/Drugstore</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="yes_no" id="yes4" value="yes" {{ old('pharmacy_available', $barangay->pharmacy_available ?? '') == 'yes' ? 'checked' : '' }}>
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="yes_no" id="no4" value="no" {{ old('pharmacy_available', $barangay->pharmacy_available ?? '') == 'no' ? 'checked' : '' }}>
                                    <label for="no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="pharmacy_distance" value="{{ $barangay->pharmacy_distance ?? '' }}"></td>
                            <td><input type="text" name="pharmacy_name" value="{{ $barangay->pharmacy_name ?? '' }}"></td>
                            <td><input type="text" name="pharmacy_address" value="{{ $barangay->pharmacy_address ?? '' }}"></td>
                            <td><input type="text" name="pharmacy_services" value="{{ $barangay->pharmacy_services ?? '' }}"></td>
                            <td><input type="checkbox" name="pharmacy_gov_project" value="{{ $barangay->pharmacy_gov_project ?? '' }}"></td>
                            <td>
                                <select name="pharmacy_institution">
                                    <option value="private" {{ isset($barangay) && $barangay->pharmacy_institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ isset($barangay) && $barangay->pharmacy_institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ isset($barangay) && $barangay->pharmacy_institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ isset($barangay) && $barangay->pharmacy_institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ isset($barangay) && $barangay->pharmacy_institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ isset($barangay) && $barangay->pharmacy_institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                            <td><input type="text" name="pharmacy_remarks" value="{{ $barangay->pharmacy_remarks ?? '' }}"></td>
                        </tr>

                        <tr>
                            <td>COVID-19 Quarantine/Isolation Facility</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="yes_no" id="yes5" value="yes" {{ old('if_available', $barangay->if_available ?? '') == 'yes' ? 'checked' : '' }}>
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="yes_no" id="no5" value="no" {{ old('if_available', $barangay->if_available ?? '') == 'no' ? 'checked' : '' }}>
                                    <label for="no">No</label>
                                </div>
                            </td>
                            <td><input type="text" name="pharmacy_distance" value="{{ $barangay->if_distance ?? '' }}"></td>
                            <td><input type="text" name="if_name" value="{{ $barangay->if_name ?? '' }}"></td>
                            <td><input type="text" name="if_address" value="{{ $barangay->if_address ?? '' }}"></td>
                            <td><input type="text" name="if_services" value="{{ $barangay->if_services ?? '' }}"></td>
                            <td><input type="checkbox" name="if_gov_project" value="{{ $barangay->if_gov_project ?? '' }}"></td>
                            <td>
                                <select name="if_institution">
                                    <option value="private" {{ isset($barangay) && $barangay->if_institution == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ isset($barangay) && $barangay->if_institution == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ isset($barangay) && $barangay->if_institution == 'provincial' ? 'selected' : '' }}>Provincial Government</option>
                                    <option value="municipal" {{ isset($barangay) && $barangay->if_institution == 'municipal' ? 'selected' : '' }}>City/Municipal Government</option>
                                    <option value="barangay" {{ isset($barangay) && $barangay->if_institution == 'barangay' ? 'selected' : '' }}>Barangay Government</option>
                                    <option value="ngos" {{ isset($barangay) && $barangay->if_institution == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                            <td><input type="text" name="if_remarks" value="{{ $barangay->if_remarks ?? '' }}"></td>
                        </tr>
                    </tbody>
                </table>
                <!-- Add buttons to navigate back or proceed -->
                <input type="button" value="Proceed" onclick="showCategory(9)">
                <input type="button" id="back-btn" value="Back" onclick="showCategory(1)" style="display: none;"> <!-- Back Button -->
                
            </div>

            <!-- Repeat this for all 9 categories, adjusting IDs -->

            <!-- Final Category (Submit) -->
            <div class="category" id="category-9" style="display: none;">
                <h3>Category 9: Final Review</h3>
                <!-- Review or final details -->
                <input type="submit" value="Submit">
                <button id="edit-btn" type="button">Edit</button> 
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

        </script>

        <script>
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
                                        // Populate the form with the selected barangay data
                                        document.getElementById('region').value = barangay.region;
                                        document.getElementById('province').value = barangay.province;
                                        document.getElementById('city_municipality').value = barangay.city_municipality;
                                        document.getElementById('barangay').value = barangay.barangay;
                            
                                        document.getElementById('barangay_id').value = barangay.id;


                                        // Close the modal
                                        document.getElementById('search-modal').style.display = 'none';
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
        </script>
    </div>
</body>
</html>
