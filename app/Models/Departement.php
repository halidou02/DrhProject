<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $table = 'departement';
    protected $primaryKey = 'IDDepartement';
    public $timestamps = false;

    protected $fillable = [
        'IDPoste',
        'NomDepartement',
        'ResponsableDepartement',
    ];

    public function postes()
    {
        return $this->hasMany(Poste::class, 'IdDepartement', 'IDDepartement');
    }

    public function employes()
    {
        return $this->hasMany(Employe::class, 'IDDepartement');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'IDDepartement');
    }
    public function responsable()
    {
        return $this->belongsTo(Employe::class, 'ResponsableDepartement', 'IDEmploye');
    }
}
