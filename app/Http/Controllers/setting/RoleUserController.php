<?php

namespace App\Http\Controllers\setting;

use App\Models\base;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoleUserController extends Controller
{
    public $base;
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->base=new base();
        $this->base->model=User::class;
        $this->base->array_input= [
            "role_id"=>'required',
        ];
     }
    public function index()
    {
        $user=User::where('type',2)->get();
        $page='index';
        return view('setting.role_user.index',compact('page','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

          Gate::authorize('Restaurant.create');
        $page='Create';
        $user=User::get();

        return view('setting.role_user.form',compact('page','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('Restaurant.Update');
        $page='Edit';
         $user=user::findorfail($id);
         $role=role::get();
         if(isset($user->role->id)){
        $role_id=$user->role->id;
    }else{
        $role_id='';
}

        return view('setting.role_user.form',compact('page','user','role','role_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('Restaurant.Update');
        $validate_array= $this->base->validation($request,$action='update',$id);
        $validate=$request->validate($validate_array);
        $this->base->update_data($image='',$validate,$id);
        return redirect()->route('admin.setting.role_user.index')
        ->with('msg','تم تحديث بيانات المطعم بنجاح')->with('type','success') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('Restaurant.delete');

        User::where('restaurant_id',Auth::user()->restaurant_id)->findorfail($id)->delete();
        return redirect()->route('admin.setting.role_user.index')
         ->with('msg','تم نقل المطعم إلى سلة المحذوفات')->with('type','danger')
        ;
    }

       public function trash()
    {
        $user=User::where('restaurant_id',Auth::user()->restaurant_id)->onlyTrashed()->get();
        $page='trash';
        return view('setting.role_user.index',compact('user','page'));

    }

    public function restore(string $id)
    {
         Gate::authorize('Restaurant.restore');
        User::where('restaurant_id',Auth::user()->restaurant_id)->withTrashed()->findorfail($id)->restore();
        return redirect()->route('admin.setting.role_user.trash')->with('msg','تمت إستعادة المطعم من سلة المحذوفات بنجاح')->with('type','info');
    }


   public function forceDelete(string $id)
    {
        Gate::authorize('Restaurant.forceDelete');
        User::where('restaurant_id',Auth::user()->restaurant_id)->withTrashed()->findorfail($id)->forceDelete();
        return redirect()->route('admin.setting.role_user.trash')->with('msg','تم حذف المطعم بشكل نهائي')->with('type','danger');
    }

}
