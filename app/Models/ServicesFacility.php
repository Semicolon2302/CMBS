<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesFacility extends Model
{
    use HasFactory;
    protected $fillable = [
        'barangay_id', 
        'facility_type', 
        'available',
        'distance', 
        'name', 
        'address', 
        'dimension',
        'latitude',
        'longitude', 
        'institution'
    ];

    // Define the relationship with the Barangay model
    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
}
