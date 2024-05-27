namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $table = 'mission';
    protected $primaryKey = 'IDMission';
    public $timestamps = false;

    protected $fillable = [
        'DateDebut',
        'DateFin',
        'TypeMission',
    ];

    public function carrieres()
    {
        return $this->hasMany(Carriere::class, 'IDMission');
    }
}
