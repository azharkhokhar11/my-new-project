<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class Order extends Model
{
    public $timestamps = false;
    protected $table = 'orders';

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

   public function scopeUserOrders(Builder $query){
        if(session()->has('user')){
            $userId = Session::get('user')['id'];
            return $query->where('user_id',$userId)
            ->with('product');             
        }
        return $query;
        }
     }

