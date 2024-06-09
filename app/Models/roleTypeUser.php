<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleTypeUser extends Model
{
    use HasFactory;

    protected $table = 'role_type_users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'role_type',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_type');
    }
}
