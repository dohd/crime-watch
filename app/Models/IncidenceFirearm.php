<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidenceFirearm extends Model
{
    use HasFactory;

    protected $table = 'incidence_firearms';

    protected $fillable = [
        'incident_record_id',  
        'firearm_id',
        'firearm_recov',
        'firearm_used',
    ];
}
