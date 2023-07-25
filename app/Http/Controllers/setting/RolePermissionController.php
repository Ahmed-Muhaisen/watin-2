<?php

namespace App\Http\Controllers\setting;

use App\Models\base;
use App\Models\role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RolePermissionController extends Controller
{
    public $base;
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->base=new base();
        $this->base->model=Permission::class;
        $this->base->array_input= [
            "permissions"=>'required',
        ];
     }
    public function index()
    {
        $role=role::get();


        $page='index';
        return view('setting.role_permission.index',compact('role','page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

          Gate::authorize('Restaurant.create');
        $page='Create';
        $permission=Permission::get();

        return view('setting.role_permission.form',compact('page','permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          Gate::authorize('Restaurant.create');
        $validate_array= $this->base->validation($request,$action='store',$id='');
        $validate=$request->validate($validate_array);
        $role =role::where('id',$request->role_id)->first();
        $role->permission()->sync($request->permissions);
         return redirect()->route('admin.setting.role_permission.index')
         ->with('msg','تم إضافة الصلاحيات بنجاح')->with('type','success');

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
         $role=role::where('id',$id)->first();
         $roles=role::get();
        $permission=Permission::orderBy('id',"ASC")->get();
        return view('setting.role_permission.form',compact('page','permission','role','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('Restaurant.Update');
        $validate_array= $this->base->validation($request,$action='update',$id);
        $validate=$request->validate($validate_array);
        $role =role::where('id',$id)->first();
        $role->permission()->sync($request->permissions);
        return redirect()->route('admin.setting.role_permission.index')
        ->with('msg','تم تحديث بيانات المطعم بنجاح')->with('type','success') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('Restaurant.delete');

        Permission::where('restaurant_id',Auth::user()->restaurant_id)->findorfail($id)->delete();
        return redirect()->route('admin.setting.role_permission.index')
         ->with('msg','تم نقل المطعم إلى سلة المحذوفات')->with('type','danger')
        ;
    }

       public function trash()
    {
        $permission=Permission::where('restaurant_id',Auth::user()->restaurant_id)->onlyTrashed()->get();
        $page='trash';
        return view('setting.role_permission.index',compact('permission','page'));

    }

    public function restore(string $id)
    {
         Gate::authorize('Restaurant.restore');
        Permission::where('restaurant_id',Auth::user()->restaurant_id)->withTrashed()->findorfail($id)->restore();
        return redirect()->route('admin.setting.role_permission.trash')->with('msg','تمت إستعادة المطعم من سلة المحذوفات بنجاح')->with('type','info');
    }


   public function forceDelete(string $id)
    {
        Gate::authorize('Restaurant.forceDelete');
        Permission::where('restaurant_id',Auth::user()->restaurant_id)->withTrashed()->findorfail($id)->forceDelete();
        return redirect()->route('admin.setting.role_permission.trash')->with('msg','تم حذف المطعم بشكل نهائي')->with('type','danger');
    }

}
