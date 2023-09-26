<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KidnappingIncidence extends Model
{
    use HasFactory;

    protected $table = 'kidnapping_incidences';

    protected $fillable = ['incident_record_id', 'age_grouping_id', 'male', 'female'];
    
}
