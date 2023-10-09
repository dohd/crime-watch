<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugIncidenceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "county_id",
        "drug_type_id",
        "drug_incidence_id",
        "arrested",
        "possesion",
        "cultivation",
        "trafficking",
        "male_ke",
        "female_ke",
        "male_fr",
        "female_fr",
        "pellets",
        "sachets",
        "tabs",
        "grams",
        "rolls",
        "bales",
        "plants",
        "brooms",
        "stones",
        "seedlings",
        "pui",
        "paka",
        "pbc",
        "finalized",
    ];
}
