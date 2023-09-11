<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidlifeIncidence extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'uuid',
        'date_commited', 
        'elephant',
        'rhino',
        'giraffe', 
        'injured',
        'fetal',
        'user_id', 
  
       
      
    ];
    public function wildlifeStastics()
    {
        return $this->hasMany(WidlifeStatistic::class);
    }
}
