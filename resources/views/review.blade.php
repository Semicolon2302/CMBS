<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/sass/edit.scss'])
    <title>CBMS Review</title>
</head>
<body>
    <div class="category" id="category-13" style="display: none" > <!-- This will now be the review section -->
        <div class="form-container">
                <!-- Section to review data entered in previous categories -->
                <h2>Review Barangay Information</h2>
                <div class="two-column-layout">
                    <div class="form-group">
                        <label for="region">Region</label>
                        <input type="text" name="region" id="region" required value="{{ old('region') }}">
                    </div>
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" name="province" id="province" required value="{{ old('province') }}">
                    </div>
                    <div class="form-group">
                        <label for="city_municipality">City/Municipality</label>
                        <input type="text" name="city_municipality" id="city_municipality" required value="{{ old('city_municipality') }}">
                    </div>
                    <div class="form-group">
                        <label for="barangay">Barangay</label>
                        <input type="text" name="barangay" id="barangay" required value="{{ old('barangay') }}">
                    </div>
                </div>

                <h2>Review Facilities Information</h2>
                <table>
                    <thead>
                        <tr style="position: sticky; top: 0; background-color: #3498db; color: white; z-index: 1;">
                            <th>Facilities</th>
                            <th>Does this barangay have at least one?</th>
                            <th>Distance from barangay hall</th>
                            <th>Facility Name</th>
                            <th>Address</th>
                            <th>Dimension(sqm)</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Institution Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through health facilities to show and allow edits -->
                        <tr style="background-color: #4CAF50; color: white;">
                            <th colspan="9" style="text-align: center; font-size: 30px;">HEALTH FACILITY</th>
                        </tr>
                        @foreach(old('health_facilities', []) as $index => $facility)
                        <tr>
                            <td>{{ $facility['facility_type'] }}</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="health_facilities[{{ $index }}][available]" value="yes" {{ $facility['available'] == 'yes' ? 'checked' : '' }} required> Yes
                                    <input type="radio" name="health_facilities[{{ $index }}][available]" value="no" {{ $facility['available'] == 'no' ? 'checked' : '' }}> No
                                </div>
                            </td>
                            <td><input type="text" name="health_facilities[{{ $index }}][distance]" value="{{ $facility['distance'] }}"></td>
                            <td><input type="text" name="health_facilities[{{ $index }}][name]" value="{{ $facility['name'] }}"></td>
                            <td><input type="text" name="health_facilities[{{ $index }}][address]" value="{{ $facility['address'] }}"></td>
                            <td><input type="text" name="health_facilities[{{ $index }}][dimension]" value="{{ $facility['dimension'] }}"></td>
                            <td><input type="text" name="health_facilities[{{ $index }}][latitude]" value="{{ $facility['latitude'] }}"></td>
                            <td><input type="text" name="health_facilities[{{ $index }}][longitude]" value="{{ $facility['longitude'] }}"></td>
                            <td>
                                <select name="health_facilities[{{ $index }}][institution]">
                                    <option value="private" {{ $facility['institution'] == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ $facility['institution'] == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ $facility['institution'] == 'provincial' ? 'selected' : '' }}>Provincial</option>
                                    <option value="municipal" {{ $facility['institution'] == 'municipal' ? 'selected' : '' }}>Municipal</option>
                                    <option value="barangay" {{ $facility['institution'] == 'barangay' ? 'selected' : '' }}>Barangay</option>
                                    <option value="ngos" {{ $facility['institution'] == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach

                        <!-- Similarly for education facilities -->
                        <tr style="background-color: #4CAF50; color: white;">
                            <th colspan="9" style="text-align: center; font-size: 30px;">EDUCATION FACILITY</th>
                        </tr>
                        @foreach(old('education_facilities', []) as $index => $facility)
                        <tr>
                            <td>{{ $facility['facility_type'] }}</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" name="education_facilities[{{ $index }}][available]" value="yes" {{ $facility['available'] == 'yes' ? 'checked' : '' }} required> Yes
                                    <input type="radio" name="education_facilities[{{ $index }}][available]" value="no" {{ $facility['available'] == 'no' ? 'checked' : '' }}> No
                                </div>
                            </td>
                            <td><input type="text" name="education_facilities[{{ $index }}][distance]" value="{{ $facility['distance'] }}"></td>
                            <td><input type="text" name="education_facilities[{{ $index }}][name]" value="{{ $facility['name'] }}"></td>
                            <td><input type="text" name="education_facilities[{{ $index }}][address]" value="{{ $facility['address'] }}"></td>
                            <td><input type="text" name="education_facilities[{{ $index }}][dimension]" value="{{ $facility['dimension'] }}"></td>
                            <td><input type="text" name="education_facilities[{{ $index }}][latitude]" value="{{ $facility['latitude'] }}"></td>
                            <td><input type="text" name="education_facilities[{{ $index }}][longitude]" value="{{ $facility['longitude'] }}"></td>
                            <td>
                                <select name="education_facilities[{{ $index }}][institution]">
                                    <option value="private" {{ $facility['institution'] == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="public" {{ $facility['institution'] == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="provincial" {{ $facility['institution'] == 'provincial' ? 'selected' : '' }}>Provincial</option>
                                    <option value="municipal" {{ $facility['institution'] == 'municipal' ? 'selected' : '' }}>Municipal</option>
                                    <option value="barangay" {{ $facility['institution'] == 'barangay' ? 'selected' : '' }}>Barangay</option>
                                    <option value="ngos" {{ $facility['institution'] == 'ngos' ? 'selected' : '' }}>NGOs</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Submit button -->
                <div>
                    <button type="submit">Submit</button>
                </div>
        </div>
    </div>
</body>
</html>
