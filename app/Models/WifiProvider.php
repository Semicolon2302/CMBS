<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WifiProvider extends Model
{
    use HasFactory;
    protected $fillable = [
        'barangay_id',  // Foreign key for the ICT model
        'question',
        'provider',  // WiFi provider name
    ];

    // Define the relationship with the ICT model
    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
}
