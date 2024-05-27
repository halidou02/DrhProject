<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employe';
    protected $primaryKey = 'IDEmploye';
    public $timestamps = false;

    protected $fillable = [
        'IDDepartement',
        'IDPoste',
        'Prenom',
        'Nom',
        'DateNaissance',
        'Genre',
        'Adresse',
        'NumeroTelephone',
        'Email',
        'DateIncorporation',
        'SalairedeBase',
        'Statut',
        'EtatCivil',
        'Photo',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'IDDepartement');
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class, 'IDPoste');
    }

    public function carrieres()
    {
        return $this->hasMany(Carriere::class, 'IDEmploye');
    }

    public function conges()
    {
        return $this->hasMany(Conge::class, 'IDEmploye');
    }

    public function dotations()
    {
        return $this->hasMany(Dotation::class, 'IDEmploye');
    }

    public function evolutionPerformances()
    {
        return $this->hasMany(EvolutionPerformance::class, 'IDEmploye');
    }

    public function historiqueSalaires()
    {
        return $this->hasMany(HistoriqueSalaire::class, 'IDEmploye');
    }
}
