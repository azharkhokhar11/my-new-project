<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Product extends Pivot
{
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'category_id', 'description', 'gallery', 'stock_count'];

    // Define relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    // Define relationship with Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'product_id', 'id');
    }

}
