namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolutionPerformance extends Model
{
    use HasFactory;

    protected $table = 'evolution_performance';
    protected $primaryKey = 'IDEvaPerform';
    public $timestamps = false;

    protected $fillable = [
        'IDEmploye',
        'DateEvaluat',
        'ResultEvaluat',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'IDEmploye');
    }
}
