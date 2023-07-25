<?php

namespace App\Http\Controllers;

use App\Models\base;
use App\Models\User;
use App\Models\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RestaurantController extends Controller
{
    public $base;
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->base=new base();
        $this->base->model=restaurant::class;
        $this->base->array_input= [
            "name"=>'required',
            "user_id"=>'required',
            "phone"=>'required|max:12',
            "image"=>'required |image|mimes:jpg,jpeg,png',
            "address"=>'required|string|max:160',
        ];
     }
    public function index()
    {
         Gate::authorize('Restaurant.index');
        $restaurant=restaurant::get();

        $page='index';
        return view('restaurant.index',compact('restaurant','page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          Gate::authorize('Restaurant.create');
        $page='Create';
        $users=User::where('type',2)->where('restaurant_id',null)->get();
        $restaurant=new restaurant();
        return view('restaurant.form',compact('page','restaurant','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          Gate::authorize('Restaurant.create');
        $validate_array= $this->base->validation($request,$action='store',$id='');
        $validate=$request->validate($validate_array);
         $this->base->create_data($request->file('image'),$validate);
         return redirect()->route('admin.Restaurant.index')
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
        Gate::authorize('Restaurant.Update');
        $page='Edit';
        $users=User::get();

        $restaurant=restaurant::find($id);
        return view('restaurant.form',compact('page','restaurant','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('Restaurant.Update');
        $validate_array= $this->base->validation($request,$action='update',$id);
        $validate=$request->validate($validate_array);
        $this->base->update_data($request->file('image'),$validate,$id);

        return redirect()->route('admin.Restaurant.index')
        ->with('msg','تم تحديث بيانات المطعم بنجاح')->with('type','success') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('Restaurant.delete');

        restaurant::findorfail($id)->delete();

        return redirect()->route('admin.Restaurant.index')
         ->with('msg','تم نقل المطعم إلى سلة المحذوفات')->with('type','danger')
        ;
    }

       public function trash()
    {
        $restaurant=restaurant::onlyTrashed()->get();
        $page='trash';
        return view('restaurant.index',compact('restaurant','page'));

    }

    public function restore(string $id)
    {
         Gate::authorize('Restaurant.restore');
        restaurant::withTrashed()->findorfail($id)->restore();
        return redirect()->route('admin.Restaurant.trash')->with('msg','تمت إستعادة المطعم من سلة المحذوفات بنجاح')->with('type','info');
    }


   public function forceDelete(string $id)
    {
        Gate::authorize('Restaurant.forceDelete');
        restaurant::withTrashed()->findorfail($id)->forceDelete();
        return redirect()->route('admin.Restaurant.trash')->with('msg','تم حذف المطعم بشكل نهائي')->with('type','danger');
    }

}
