<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAvantageSocial extends Model
{
    use HasFactory;

    protected $table = 'types_avantages_sociaux';

    protected $primaryKey = 'IDTypeAvantage';

    protected $fillable = [
        'NomTypeAvantage',
        'Prime'
    ];

    public function avantagesSociaux()
    {
        return $this->hasMany(AvantageSocial::class, 'IDTypeAvantage', 'IDTypeAvantage');
    }
}
