<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class product extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function category(){
       return $this->belongsTo(category::class,'category_id')->withDefault();
    }


    public function restaurant(){
       return $this->belongsTo(restaurant::class,'restaurant_id')->withDefault();
    }
    public function user(){
        return $this->belongsToMany(User::class,'product_user');
     }
}
