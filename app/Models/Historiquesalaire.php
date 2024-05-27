namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueSalaire extends Model
{
    use HasFactory;

    protected $table = 'historiquesalaire';
    protected $primaryKey = 'IDHistoriqueSalaire';
    public $timestamps = false;

    protected $fillable = [
        'IDEmploye',
        'DateChangementSaclaire',
        'NouveauSalaire',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'IDEmploye');
    }
}
