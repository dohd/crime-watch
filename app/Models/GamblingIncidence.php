<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamblingIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'm_arrest_no',
        'm_no',
        'c_arrest_no',
        'c_no',
        'p_arrest_no',
        'p_no',
        'incident_record_id',
    ];

    public function incidence()
    {
        return $this->belongsTo(IncidentRecord::class, 'incident_record_id');
    }
}
