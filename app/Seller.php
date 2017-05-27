<?php

namespace App;

use App\Scopes\SellerProductScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends User
{

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SellerProductScope());
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
