<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends User
{


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
