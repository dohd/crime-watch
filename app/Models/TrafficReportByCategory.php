<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrafficReportByCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'c_report_value',
        'traffic_incidence_id',
        'traffic_type_id',
        'traffi_category_id',

    ];
}
