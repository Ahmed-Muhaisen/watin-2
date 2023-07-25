<?php

namespace App\Http\Controllers\setting;

use App\Models\base;
use App\Models\permission;
use App\Models\User;
use App\Models\product;
use App\Models\Category;
use App\Models\restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class permissionController extends Controller
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
            "name"=>'required',
            "code"=>'required|regex:/\./'
        ];
     }
    public function index()
    {

        $permission=Permission::get();

        $page='index';
        return view('setting.permission.index',compact('permission','page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          Gate::authorize('Product.create');
        $page='Create';
        $permission=new Permission();
        return view('setting.permission.form',compact('page','permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          Gate::authorize('Product.create');
        $validate_array= $this->base->validation($request,$action='store',$id='');
        $validate=$request->validate($validate_array);
         $this->base->create_data($image='',$validate);
         return redirect()->route('admin.setting.permission.index')
         ->with('msg','تم إضافة الأدمن بنجاح')->with('type','success');

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
        Gate::authorize('Product.Update');
        $page='Edit';
        $permission=Permission::findorfail($id);
        return view('setting.permission.form',compact('page','permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('Product.Update');
        $validate_array= $this->base->validation($request,$action='update',$id);
        $validate=$request->validate($validate_array);
        $this->base->update_data($image='',$validate,$id);

        return redirect()->route('admin.setting.permission.index')
        ->with('msg','تم تحديث بيانات الأدمن بنجاح')->with('type','success') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('Product.delete');

        Permission::findorfail($id)->delete();
        return redirect()->route('admin.setting.permission.index')
         ->with('msg','تم نقل الأدمن إلى سلة المحذوفات')->with('type','danger')
        ;
    }

       public function trash()
    {
        $permission=Permission::onlyTrashed()->get();
        $page='trash';
        return view('setting.permission.index',compact('permission','page'));

    }

    public function restore(string $id)
    {
         Gate::authorize('Product.restore');
        Permission::withTrashed()->findorfail($id)->restore();
        return redirect()->route('admin.setting.permission.trash')->with('msg','تمت إستعادة الأدمن من سلة المحذوفات بنجاح')->with('type','info');
    }


   public function forceDelete(string $id)
    {
        Gate::authorize('Product.forceDelete');
        Permission::withTrashed()->findorfail($id)->forceDelete();
        return redirect()->route('admin.setting.permission.trash')->with('msg','تم حذف الأدمن بشكل نهائي')->with('type','danger');
    }

}
