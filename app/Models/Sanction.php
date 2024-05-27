namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    use HasFactory;

    protected $table = 'sanction';
    protected $primaryKey = 'IDSanction';
    public $timestamps = false;

    protected $fillable = [
        'DateDebut',
        'DateFin',
        'Description',
        'Motif',
    ];

    public function carrieres()
    {
        return $this->hasMany(Carriere::class, 'IDSanction');
    }
}
