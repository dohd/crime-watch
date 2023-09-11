<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SgbvReportByCounty extends Model
{
    use HasFactory;
    protected $fillable = [
        'offence', 
        'county_id',
        'incident_file_id',
        'sgbv_incidence_id'
      
    ];
}
