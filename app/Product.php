<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function scopetakeProduc($query)
    {
        return $query->take(4)->inRandomOrder();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
