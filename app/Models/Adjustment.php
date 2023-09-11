<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    use HasFactory;
    protected $fillable = [
        'crime_id', 
        'creme_watch_id',
        'name',
      
    ];
}
