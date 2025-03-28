<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    protected $table = 'carts';

// Define relationship with product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
}
