<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirearmIncidence extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'uuid',
        'date_commited',
        'user_id'

    ];
    public function firearmAmunations()
    {
        return $this->hasMany(FirearmAndAmmino::class);
    }
    public function firearmAmmino()
    {
        return $this->hasMany(FirearmAmmino::class);
    }
    public function ammunoExposive()
    {
        return $this->hasMany(FirearmMagazineExplosive::class);
    }
}
