<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
      'name', 'detail', 'image','cat','price','discount_price','quantity'
  ];
    /**
     * Set the categories
     *
     */
    public function setCatAttribute($value)
    {
        $this->attributes['cat'] = json_encode($value);
    }
  
    /**
     * Get the categories
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['cat'] = json_decode($value);
    }
    public function orderDetails()
{
    return $this->hasMany(OrderDetail::class);
}
}