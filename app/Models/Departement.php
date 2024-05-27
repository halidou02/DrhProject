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

    public function poste()
    {
        return $this->belongsTo(Poste::class, 'IDPoste');
    }

    public function employes()
    {
        return $this->hasMany(Employe::class, 'IDDepartement');
    }
}
