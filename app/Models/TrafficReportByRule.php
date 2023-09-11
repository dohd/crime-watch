<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrafficReportByRule extends Model
{
    use HasFactory;
    protected $fillable = [
        'report_value',
        'traffic_incidence_id',
        'traffic_enforcement_action_id',
        'region_id',

    ];
}
