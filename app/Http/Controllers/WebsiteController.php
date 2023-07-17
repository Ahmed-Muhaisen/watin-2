<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\product;
use App\Models\restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\contact;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class WebsiteController extends Controller
{
   function index(){
    $restaurant=restaurant::get();
    $products=product::get();

    return view('website.index',compact('restaurant','products'));
   }


   function contact()  {

    return view('website/contact');
   }

   function contact_post(request $request)  {

   $user=User::where('email','ahmedmuhaisen6@gmail.com')->first();
    $user->notify(new contact($request->all()));
    return redirect()->back();
   }



   function about(){
    return view('website/about');
   }


   function best_products(){
    $products=product::get();
    return view('website/best_products',compact('products'));
   }

   function all_restaurants()  {

    $restaurant=restaurant::get();
    return view('website/all_restaurants',compact('restaurant'));
   }

   function restaurant(String $id){

    $restaurant=restaurant::where('id',$id)->first();

    return view('website.restaurant',compact('restaurant'));
   }

   function product(product $product) {

    return view('website.product',compact('product'));

   }
   public function order(Request $request, product $product)
   {
        order::create([
         'product_id'=>$product->id,
         'user_id'=>Auth::user()->id,
        'quantity'=>$request->quantity
        ]);
        return redirect()->back()
        ->with('msg','تم إضافة الطلب بنجاح')->with('type','success');

   }


   public function my_orders()
   {
    $title="الوجبات التي طلبتها";
    $order= order::where('user_id', Auth::user()->id)->pluck('product_id')->toArray();
    $products =product::whereIn('id',$order)->get();
    return view('website.best_products',compact('products','title'));
   }

}
