namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

    protected $table = 'conge';
    protected $primaryKey = 'IDConge';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'IDEmploye',
        'Type',
        'StatutConge',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'IDEmploye');
    }
}
