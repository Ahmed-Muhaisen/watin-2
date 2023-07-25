<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class role extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

public function permission()
{
    return $this->BelongsToMany(permission::class,'permission_role');
}

public function user()
{
    return $this->hasMany(User::class,'role_id');
}
}
