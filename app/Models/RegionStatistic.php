<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionStatistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'statistic_value',
        'region_incidence_id',
        'incident_file_id',
        'station_id',
      

    ];
}
