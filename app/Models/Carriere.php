namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carriere extends Model
{
    use HasFactory;

    protected $table = 'carriere';
    protected $primaryKey = 'IDCarriere';
    public $timestamps = false;

    protected $fillable = [
        'IDEmploye',
        'IDFormation',
        'IDMission',
        'IDSanction',
        'PosteActuel',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'IDEmploye');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'IDFormation');
    }

    public function mission()
    {
        return $this->belongsTo(Mission::class, 'IDMission');
    }

    public function sanction()
    {
        return $this->belongsTo(Sanction::class, 'IDSanction');
    }
}
