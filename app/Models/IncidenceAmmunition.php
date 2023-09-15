<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidenceAmmunition extends Model
{
    use HasFactory;

    protected $table = 'incidence_firearms';

    protected $fillable = [
        'incident_record_id',  
        'ammunition_id',
        'ammunition_recov',
        'ammunition_used',
    ];
}
