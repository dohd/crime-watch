<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrafficReportByFine extends Model
{
    use HasFactory;
    protected $fillable = [
        'fine_value',
        'forfeit_value',
        'traffic_incidence_id',
        'region_id',

    ];
}
