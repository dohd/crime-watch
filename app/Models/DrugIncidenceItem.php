<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugIncidenceItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'drug_incidence_id',
        'sex',
        'age',
        'nationality', 
        'case_position',
        'qty',
        'drug_type_id', 
        'drug_packaging_id',
        'incident_file_id',
        'county_id', 
    ];
}
