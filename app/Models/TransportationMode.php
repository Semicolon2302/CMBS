<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportationMode extends Model
{
    use HasFactory;
    protected $fillable = [
        'barangay_id', 
        'mode_of_transpo', 
        'available',
        'other', 
    ];

    // Define the relationship with the Barangay model
    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
}
