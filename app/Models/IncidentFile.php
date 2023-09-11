<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentFile extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'name', 
        'is_dcir',
        'is_sgbv',
        'is_drug',
        'is_regional',
        'crime_category_id',
        'uuid'
      
    ];
    public function crimecategory()
    {
        return $this->belongsTo(CrimeCategory::class,'crime_category_id','id');
    }
    
}
