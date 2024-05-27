namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habillement extends Model
{
    use HasFactory;

    protected $table = 'habillement';
    protected $primaryKey = 'IDHabillement';
    public $timestamps = false;

    protected $fillable = [
        'DateHabillement',
        'Description',
    ];
}
