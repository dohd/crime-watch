<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrafficReportByRegion extends Model
{
    use HasFactory;
    protected $fillable = [
        'report_value',
        'report_type',
        'traffic_incidence_id',
        'traffic_type_id',
        'region_id',

    ];
}
