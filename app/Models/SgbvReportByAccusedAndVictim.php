<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SgbvReportByAccusedAndVictim extends Model
{
    use HasFactory;
    protected $fillable = [
        'type', 
        'm_zero_to_nine',
        'f_zero_to_nine',
        'm_ten_to_fourteen',
        'f_ten_to_fourteen',
        'm_fifteen_to_seventeen',
        'f_fifteen_to_seventeen',
        'm_eighteen_to_nineteen',
        'f_eighteen_to_nineteen',
        'm_twenty_to_twentyfour',
        'f_twenty_to_twentyfour',
        'm_twenty_five_to_twentynine',
        'f_twenty_five_to_twentynine',
        'm_thirty_to_fortyfour',
        'f_thirty_to_fortyfour',
        'm_fortyfive_to_fiftynine',
        'f_fortyfive_to_fiftynine',
        'm_sixty_and_above',
        'f_sixty_and_above',
        'incident_file_id',
        'sgbv_incidence_id'
      
    ];

    public function sgbvincidence()
    {
        return $this->belongsTo(SgbvIncidence::class,'sgbv_incidence_id');
    }
}
