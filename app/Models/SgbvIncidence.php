<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SgbvIncidence extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'uuid', 
        'date_commited',
        'accused_victims',
        'county_id',
        'user_id'
      
    ];

    public function reportByCounty()
    {
        return $this->hasMany(SgbvReportByCounty::class);
    }
    public function reportByAccusedVictims()
    {
        return $this->hasMany(SgbvReportByAccusedAndVictim::class);
    }
}
