<?php
/**
 * Created by PhpStorm.
 * User: tapos
 * Date: 5/27/2017
 * Time: 11:46 AM
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SellerProductScope implements   Scope
{


    public function apply(Builder $builder, Model $model)
    {
        $builder->whereHas('products');
    }
}