<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    use HasFactory;

    protected $table = 'poste';
    protected $primaryKey = 'IDPoste';
    public $timestamps = false;

    protected $fillable = [
        'IDDepartement',
        'TitrePoste',
        'SalaireDeBase',
        'Description',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'IdDepartement', 'IDDepartement');
    }

    public function employes()
    {
        return $this->hasMany(Employe::class, 'IDPoste');
    }
}
