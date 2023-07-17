<?php

namespace App\Models;

use App\Models\base;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Auth\Events\Validated;
use PhpParser\Node\Expr\Cast\Object_;
 use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class restaurant extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];

    public function user(){
        return $this->hasMany(User::class,'restaurant_id');
    }

    public function product(){
        return $this->hasMany(product::class,'restaurant_id');
    }

    public function user2(){
        return $this->belongsTo(User::class,'user_id')->withDefault();
    }

}
