<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_id','quantity'];
      //define the relationship with order model
    public function order() {
      return $this->belongsTo(Order::class);
      }
        //define the relationship with product model
      public function product(){
        return $this->belongsTo(Product::class);
        }
        
}
