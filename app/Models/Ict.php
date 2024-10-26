<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ict extends Model
{
    use HasFactory;
    protected $fillable = [
        'barangay_id',
        'ict_q', 
        'available',
        'existing', 

    ];

    // Define the relationship with the Barangay model
    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
}
