<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CheckoutController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Auth;
class CheckoutController extends Controller
{
  public function checkout(Request $request){

    return view('checkout');

  }

  public function cash_order(Request $request)
  {   
  
    //dd($request->all());
    if (Auth::user()) {
      $cart = Cart::where("user_id", "=", Auth::user()->id)->get();
      
      foreach ($cart as $carts){
        Order::create([
          'user_id' => Auth::user()->id,
          'status' => '1',
          'total_price' => $carts['price'] * $carts['quantity'],
          ]);
          }
          session()->flash('success','Your order has been placed successfully!');
          Cart::where('user_id', Auth::user()->id)->delete();
          //dd(1);
          return redirect()->route('success');
    }else{
      abort(401);
    }
  }

  public function success(Request $request)
  {   
    return view('success');
  }
}

  
      
      
