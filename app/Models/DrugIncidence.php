<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugIncidence extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'uuid',
        'date_commited', 
        'sex',
        'age',
        'nationality', 
        'case_position',
        'qty',
        'drug_type_id', 
        'drug_packaging_id',
        'incident_file_id',
        'county_id', 
        'user_id',
    ];
    public function drugIncidenceItems()
    {
        return $this->hasMany(DrugIncidenceItem::class);
    }
}
