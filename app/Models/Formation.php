namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $table = 'formation';
    protected $primaryKey = 'IDFormation';
    public $timestamps = false;

    protected $fillable = [
        'DateDebut',
        'DateFin',
        'Description',
        'Diplome',
    ];

    public function carrieres()
    {
        return $this->hasMany(Carriere::class, 'IDFormation');
    }
}
