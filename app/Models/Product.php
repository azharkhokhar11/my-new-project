<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'category', 'description', 'gallery'];

    // Define relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }
    //
}
