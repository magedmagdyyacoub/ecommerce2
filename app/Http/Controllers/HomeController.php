<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
  
  public function index(){
    $products = Product::all();
    return view('home.userpage',compact('products'));
  }
  public function redirect()
  {
     $usertype = Auth::user()->usertype;
     if($usertype == '1'){
      return view('admin.home');
    }
    else
    {
      $products = Product::all();
      //dd($products);
      return  view ('home.userpage',compact('products'));
    }
}
}