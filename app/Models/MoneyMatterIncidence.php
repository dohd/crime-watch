<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyMatterIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount', 
        'currency',
        'm_no_of_arrest',
        'circumstances', 
        'incident_record_id',
        
      
    ];
}
