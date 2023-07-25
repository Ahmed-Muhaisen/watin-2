<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\Cast\Object_;

class base extends Model
{
    use HasFactory, SoftDeletes;
    public $guarded=[];
    public $request;
    public $validate_array;
    public $array_input;
    public $model;

    public function validation($request,$action='store',$id=''){
        $validate=$this->array_input;
        if( $action=='update'){
            $validate['image']='nullable|image|mimes:jpg,jpeg,png';
            $validate['password']='nullable|min:8|';
        }

        $this->validate_array=$validate;

        return $validate;
    }


    public function image_store($image){
        $name_image=$image->storePublicly('restaurant_image','new');
return $name_image;
    }


    public function store_data($image,$Validate_array){
        $inputs_value_array=$Validate_array;
        if($image){
                $name_image= $this->image_store($image);
                $inputs_value_array['image']=$name_image;
            }
            if(in_array('password',array_keys($inputs_value_array))&&$inputs_value_array['password']==null){
                unset($inputs_value_array['password']);
            }


        return $inputs_value_array;
    }

    public function create_data($image,$Validate_array){

        $this->model::create(
            $this->store_data($image,$Validate_array)
        );

    }


    public function update_data($image,$Validate_array,$id){
        $this->model::findorfail($id)->update(
            $this->store_data($image,$Validate_array)
        );
    }



}
