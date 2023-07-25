<?php

namespace App\Http\Controllers;

use App\Models\base;
use App\Models\User;
use App\Models\order;

use App\Models\product;
use App\Models\Category;
use App\Models\restaurant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
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
            "user_id"=>'required|exists:users,id',
            "product_id"=>'required|exists:products,id',
        ];
     }
    public function index()
    {
       Gate::authorize('Order.index');
        $product = Card::pluck('product_id')->toArray();
        $product=product::whereIn('id',$product)->where('restaurant_id',Auth::user()->restaurant->id)->with('user')->get();
        $page='index';
        return view('order.index',compact('product','page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('Order.create');
        $user_id='';
        $page='Create';
        $products=product::where('restaurant_id',Auth::user()->restaurant->id)->get();
        $users=User::get();
        $product=new product();
        return view('order.form',compact('page','product','products','users','user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('Order.create');
        $validate_array= $this->base->validation($request,$action='store',$id='');
        $validate=$request->validate($validate_array);
         $product =product::find($request->product_id)->first();
         $product->user()->sync($validate);
         return redirect()->route('admin.order.index')
         ->with('msg','تم إضافة الطلب بنجاح')->with('type','success');

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
    public function edit(string $id,$user_id)
    {
        Gate::authorize('Order.Update');
        $page='Edit';
     $products=product::where('restaurant_id',Auth::user()->restaurant->id)->get();
        $users=User::get();
        $product=product::find($id);
        return view('order.form',compact('page','product','products','users','user_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('Order.Update');
        $validate_array= $this->base->validation($request,$action='update',$id);
        $validate=$request->validate($validate_array);

        $product =product::find($request->product_id)->first();
        $product->user()->sync($validate);

        return redirect()->route('admin.order.index')
        ->with('msg','تم تحديث بيانات الطلب بنجاح')->with('type','success') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id ,$user_id)
    {
        Gate::authorize('Order.delete');
        $order= Card::where('product_id', $id)
         ->where('user_id', $user_id);
         $order->delete();
        return redirect()->route('admin.order.index')
         ->with('msg','تم نقل الطلب إلى سلة المحذوفات')->with('type','danger')
        ;
    }

       public function trash()
    {

        $order=Card::onlyTrashed()->pluck('product_id')->toArray();

        $product = product::whereIn('id',$order)->with('user')->get();
        $page='trash';
        return view('order.index',compact('product','page'));

    }

    public function restore(string $id ,$user_id)
    {
        Gate::authorize('Order.restore');
        $order= Card::
        where('product_id', $id)
         ->where('user_id', $user_id)->withTrashed();
         $order->restore();
        return redirect()->route('admin.order.trash')->with('msg','تمت إستعادة الطلب من سلة المحذوفات بنجاح')->with('type','info');
    }


   public function forceDelete(string $id ,$user_id)
    {
        Gate::authorize('Order.forceDelete');
        $order= Card::where('product_id', $id)
         ->where('user_id', $user_id)->withTrashed();
         $order->forceDelete();

        product::withTrashed()->findorfail($id)->forceDelete();
        return redirect()->route('admin.order.trash')->with('msg','تم حذف الطلب بشكل نهائي')->with('type','danger');
    }

}
