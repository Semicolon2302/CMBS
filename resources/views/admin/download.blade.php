<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/sass/app.scss'])
    <title>Admin Download Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMO65X0I5N5cUHeC2Gx5Rx2cWyYQR6dT1+Ud" crossorigin="anonymous">
</head>
<body>
    <div class="admin-container">
    <h1>Download Barangay Data</h1>
    <p>Click the button below to download the barangay data in Excel format.</p>
    <a href="{{ route('barangay.export') }}" class="btn">
        <i class="fas fa-download"></i> Download Excel
    </a>
    </div>
</body>
</html>
