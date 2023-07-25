<?php

namespace App\Http\Controllers;

use App\Models\base;
use App\Models\User;
use App\Models\product;
use App\Models\Category;
use App\Models\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public $base;
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->base=new base();
        $this->base->model=product::class;
        $this->base->array_input= [
            "name"=>'required',
            "price"=>'required',
            "category_id"=>'required|exists:Categories,id',
            "image"=>'required |image|mimes:jpg,jpeg,png',
            "restaurant_id"=>'required|exists:restaurants,id',
        ];
     }
    public function index()
    {
         Gate::authorize('Product.index');
        $product=product::where('restaurant_id',Auth::user()->restaurant_id)->get();

        $page='index';
        return view('product.index',compact('product','page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          Gate::authorize('Product.create');
        $page='Create';
        $restaurant=[Auth::user()->restaurant];
        $category=Category::get();
        $product=new product();
        return view('product.form',compact('page','product','restaurant','category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          Gate::authorize('Product.create');
        $validate_array= $this->base->validation($request,$action='store',$id='');
        $validate=$request->validate($validate_array);
         $this->base->create_data($request->file('image'),$validate);
         return redirect()->route('admin.product.index')
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
        Gate::authorize('Product.Update');
        $page='Edit';
         $restaurant=[Auth::user()->restaurant];
        $category=Category::get();
        $product=product::where('restaurant_id',Auth::user()->restaurant_id)->find($id);
        return view('product.form',compact('page','product','restaurant','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('Product.Update');
        $validate_array= $this->base->validation($request,$action='update',$id);
        $validate=$request->validate($validate_array);
        $this->base->update_data($request->file('image'),$validate,$id);

        return redirect()->route('admin.product.index')
        ->with('msg','تم تحديث بيانات المطعم بنجاح')->with('type','success') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('Product.delete');

        product::where('restaurant_id',Auth::user()->restaurant_id)->findorfail($id)->delete();
        return redirect()->route('admin.product.index')
         ->with('msg','تم نقل المطعم إلى سلة المحذوفات')->with('type','danger')
        ;
    }

       public function trash()
    {
        $product=product::where('restaurant_id',Auth::user()->restaurant_id)->onlyTrashed()->get();
        $page='trash';
        return view('product.index',compact('product','page'));

    }

    public function restore(string $id)
    {
         Gate::authorize('Product.restore');
        product::where('restaurant_id',Auth::user()->restaurant_id)->withTrashed()->findorfail($id)->restore();
        return redirect()->route('admin.product.trash')->with('msg','تمت إستعادة المطعم من سلة المحذوفات بنجاح')->with('type','info');
    }


   public function forceDelete(string $id)
    {
        Gate::authorize('Product.forceDelete');
        product::where('restaurant_id',Auth::user()->restaurant_id)->withTrashed()->findorfail($id)->forceDelete();
        return redirect()->route('admin.product.trash')->with('msg','تم حذف المطعم بشكل نهائي')->with('type','danger');
    }

}
