<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentContinue extends Model
{
    use HasFactory,UUID;

    protected $table = 'incident_continues';

    protected $fillable = [
        'uuid',
        'incident_record_id',
        'place', 
        'mode_of_operandi',
        'as_name',
        'as_value', 
        'ar_name',
        'ar_value',
        'ad_name', 
        'ad_value',
        'vic_injured',
        'vic_dead',
        'no_accused',
        'weapon_used',
        'weapon_recov'
    ];
}
