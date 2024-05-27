namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dotation extends Model
{
    use HasFactory;

    protected $table = 'dotation';
    protected $primaryKey = 'IDDotation';
    public $timestamps = false;

    protected $fillable = [
        'IDEmploye',
        'DateDotation',
        'TypeDotation',
        'Description',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'IDEmploye');
    }
}
