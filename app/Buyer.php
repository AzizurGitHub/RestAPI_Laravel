<?php

namespace App;

use App\Scopes\BuyerTransactionScope;
use App\Transformers\BuyerTransformer;
use Illuminate\Database\Eloquent\Model;

class Buyer extends User
{


    public $transformer = BuyerTransformer::class;
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BuyerTransactionScope());
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
