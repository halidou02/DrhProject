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
        'TitrePoste',
        'SalaireDeBase',
        'Description',
    ];

    public function departements()
    {
        return $this->hasMany(Departement::class, 'IDPoste');
    }

    public function employes()
    {
        return $this->hasMany(Employe::class, 'IDPoste');
    }
}
