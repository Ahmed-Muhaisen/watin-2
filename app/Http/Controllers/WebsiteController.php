<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Card;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use App\Models\product;
use Stripe\PaymentMethod;

use App\Models\restaurant;
use App\Models\OrderProduct;
use App\Models\ProductOrder;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use App\Notifications\contact;
use Illuminate\Support\Facades\Auth;


class WebsiteController extends Controller
{
public $product_id;
public $quantity;
public $array_pay;

   function index(){
    $restaurant=restaurant::get();
    $products=product::get();

    return view('website.index',compact('restaurant','products'));
   }


   function contact()  {

    $page='contact';
    return view('website/blank',compact('page'));
   }

   function contact_post(request $request)  {

   $user=User::where('email','ahmedmuhaisen6@gmail.com')->first();
    $user->notify(new contact($request->all()));
    return redirect()->back();
   }



   function about(){

      $page='about';
      $image="website_assets/images/about-image.jpg";
    return view('website/blank',compact('page','image'));
   }


   function best_products(){
    $products=product::get();
    $page='best_products';
    return view('website/blank',compact('page','products'));
   }

   function all_restaurants()  {

    $restaurant=restaurant::get();
    $page='all_restaurants';
    return view('website/blank',compact('page','restaurant'));
   }

   function restaurant(String $id){

    $restaurant=restaurant::where('id',$id)->first();

    $page='restaurant';
    return view('website/blank',compact('page','restaurant'));
   }

   function product(product $product) {

    $page='product';
    return view('website/blank',compact('page','product'));

   }
   public function addToCard(Request $request, product $product)
   {

    $user=Auth::user()->product()->where('product_id',$product->id)->get();
if(!isset($user->id)){
    Auth::user()->product()->attach(['product_id'=>$product->id,
    'quantity'=>1]);
}
        // Auth::user()->product()->sync([
        //  'product_id'=>$product->id,
        // 'quantity'=>1
        // ]);
        return redirect()->back()
        ->with('msg','تم إضافة الطلب بنجاح')->with('type','success');

   }


   public function my_Cards()
   {
    $title="الوجبات التي طلبتها";
    $card= Card::where('user_id', Auth::user()->id)->pluck('product_id')->toArray();
  $product=product::whereIn('id',$card)->get();
    $page='myCard';

    return view('website.blank',compact('product','card','title','page'));
   }


   public function deleteFromCard(Request $request, $id)
   {

    $product=product::findorfail($id);
        $product->user()->detach();
        return redirect()->back()
        ->with('msg','تم إضافة الطلب بنجاح')->with('type','success');

   }
   public function payCard(Request $request)
   {
$total="300";
    return view('website.stripe',compact('total'));


   }

   function stripePost(Request $request) {
    $card=Card::where('user_id',Auth::user()->id);
    $id=$card->pluck('product_id')->toArray();
    $quantity=$card->pluck('quantity')->toArray();
    $price_products = array_combine($id, $id);
    $quantity_products = array_combine($id, $quantity);
    $total=0;
    foreach($quantity_products as $key=>$result){
        $total+=$result*$price_products[$key];
    };

    Stripe::setApiKey(env('STRIPE_SECRET'));
    $charge=Charge::create([
        'amount' =>$total*100,
        'currency'=>"ils",
        'source'=> $request->stripeToken,
        'description' =>'Test payment'
    ]);

    dd($charge);
    foreach($quantity_products as $key=>$result){
        $order_product= OrderProduct::create([
            'product_id'=>$key,
            'quantity'=>$result,
            'price'=>$price_products[$key]
        ]);

        $orders= Order::create([
            'user_id'=>Auth::user()->id,
            'order_product_id'=>$order_product->id,
            'total'=>$total
        ]);
        Card::where('product_id',$key)->delete();
        }

    return redirect()->route('index');
   }

}
