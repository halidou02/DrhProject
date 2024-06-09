<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvantageSocial extends Model
{
    use HasFactory;

    protected $table = 'avantages_sociaux';

    protected $primaryKey = 'IDAvantageSocial';

    protected $fillable = [
        'NomAvantageSocial',
        'DescriptionAvantageSocial',
        'IDEmploye',
        'prime',
        'IDTypeAvantage'
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'IDEmploye', 'IDEmploye');
    }

    public function typeAvantage()
    {
        return $this->belongsTo(TypeAvantageSocial::class, 'IDTypeAvantage', 'IDTypeAvantage');
    }
}
