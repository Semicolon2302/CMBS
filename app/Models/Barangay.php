<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;

    // Specify the fillable fields
    protected $fillable = [
        'region',
        'province',
        'city_municipality',
        'barangay',
        '_token',  // Add this line
        
    ];
    public function healthFacilities()
    {
        return $this->hasMany(HealthFacility::class);
    }
    public function educationFacilities()
    {
        return $this->hasMany(EducationFacility::class);
    }

    public function servicesFacilities()
    {
        return $this->hasMany(ServicesFacility::class);
    }

    public function agricultureFacilities()
    {
        return $this->hasMany(AgricultureFacility::class);
    }

    public function waterFacilities()
    {
        return $this->hasMany(WaterFacility::class);
    }

    public function electricitySources()
    {
        return $this->hasMany(ElectricitySource::class);
    }

    public function financialInstitutions()
    {
        return $this->hasMany(FinancialInstitution::class);
    }

    public function wasteDisposalFacilities()
    {
        return $this->hasMany(WasteDisposalFacility::class);
    }

    public function touristSites()
    {
        return $this->hasMany(TouristSite::class);
    }

    public function transportationModes()
    {
        return $this->hasMany(TransportationMode::class);
    }
    public function ictsQ()
    {
        return $this->hasMany(Ict::class);
    }
    public function wifi_providers()
    {
        return $this->hasMany(WifiProvider::class);
    }

}
