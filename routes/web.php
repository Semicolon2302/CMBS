<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangayController;

// Route to display the input form
Route::get('/', function () {
    return view('input'); // This will load your input view
})->name('barangay.input');

// Route to handle the form submission for creating or updating barangays
Route::post('/barangay/store', [BarangayController::class, 'store'])->name('barangay.store');

// Route to export barangays
Route::get('/export-barangays', [BarangayController::class, 'export'])->name('barangay.export');

// Route for admin download
Route::get('/admin/download', [BarangayController::class, 'adminDownload'])->name('admin.download');

// Route to search barangays
Route::get('/search-barangays', [BarangayController::class, 'search'])->name('barangays.search');
Route::get('/barangay/edit/{id}', [BarangayController::class, 'edit'])->name('barangay.edit');
Route::put('/barangay/update/{id}', [BarangayController::class, 'update'])->name('barangay.update');
