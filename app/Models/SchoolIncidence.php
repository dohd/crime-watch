<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        's_school_name', 
        'nature_of_school_unrest_id',
        's_reason',
        's_cases_reported',
        's_student_injured',
        's_student_dead',
        's_student_non_injured',
        's_student_non_dead',
        's_student_arrested',
        's_student_prosecuted',
        's_other_arrest',
        's_other_prosecuted',
        's_sp_destroyed',
        's_sp_value',
        'incident_record_id'
      
    ];
}
