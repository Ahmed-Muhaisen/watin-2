<?php

namespace App\Http\Controllers;

use App\Models\base;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->base=new base();
        $this->base->model=Category::class;
        $this->base->array_input=[
            "name"=>'required',
        ];
     }
    public function index()
    {
         Gate::authorize('Category.index');
        $category=Category::get();
        $page='index';
        return view('category.index',compact('category','page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          Gate::authorize('Category.create');
        $page='Create';
        $category=new Category();
        return view('category.form',compact('page','category'));
    }

    /**
     * Store a newly created resource in storage.
     */

     public $base;

     public function store(Request $request)
    {
          Gate::authorize('Category.create');
           $validate_array= $this->base->validation($request,$action='store',$id='');
           $validate=$request->validate($validate_array);
            $this->base->create_data($image='',$validate);
         return redirect()->route('admin.category.index')
         ->with('msg','تم إضافة المطعم بنجاح')->with('type','success');
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
        Gate::authorize('Category.Update');
        $page='Edit';
        $category=Category::find($id);
        return view('category.form',compact('page','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('Category.Update');
        $validate_array= $this->base->validation($request,$action='update',$id);
        $validate=$request->validate($validate_array);
        $this->base->update_data($image='',$validate,$id);
         return redirect()->route('admin.category.index')
         ->with('msg','تم تحديث بيانات المطعم بنجاح')->with('type','success')
        ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('Category.delete');

        Category::findorfail($id)->delete();
        return redirect()->route('admin.category.index')
         ->with('msg','تم نقل المطعم إلى سلة المحذوفات')->with('type','danger')
        ;
    }

       public function trash()
    {
        $category=Category::onlyTrashed()->get();
        $page='trash';
        return view('category.index',compact('category','page'));

    }

    public function restore(string $id)
    {
         Gate::authorize('Category.restore');
        Category::withTrashed()->findorfail($id)->restore();
        return redirect()->route('admin.category.trash')->with('msg','تمت إستعادة المطعم من سلة المحذوفات بنجاح')->with('type','info');
    }


   public function forceDelete(string $id)
    {
        Gate::authorize('Category.forceDelete');
        Category::withTrashed()->findorfail($id)->forceDelete();
        return redirect()->route('admin.category.trash')->with('msg','تم حذف المطعم بشكل نهائي')->with('type','danger');
    }

}
