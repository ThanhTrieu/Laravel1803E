<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function sizes(){
        return $this->belongsTo('App\Models\Size');
    }

    public function categories()
    {
        return $this->belongsTo('App\Models\Categorie');
    }

    public function test()
    {
        return Product::all();
    }
}
