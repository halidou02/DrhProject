namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;

    protected $table = 'materiel';
    protected $primaryKey = 'IDMateriel';
    public $timestamps = false;

    protected $fillable = [
        'Type',
    ];
}
