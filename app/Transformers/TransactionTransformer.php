<?php
/**
 * Created by PhpStorm.
 * User: tapos
 * Date: 6/9/2017
 * Time: 5:05 PM
 */

namespace App\Transformers;

use App\Transaction;
use App\User;
use League\Fractal\TransformerAbstract;

class TransactionTransformer extends TransformerAbstract
{
    public function transform(Transaction $transaction)
    {

        return [
            'id' => (int)$transaction->id,
            'buyerId' => (string)$transaction->buyer_id,
            'productId' => (string)$transaction->product_id,
            'quantity' => $transaction->quantity,
            'price' => $transaction->price,
            'lastChangeDate' => (string)$transaction->updated_at,
            'deletedDate' => isset($transaction->deleted_at) ? (string)$transaction->deleted_at : null,

        ];
    }

    public static function originalAttribute($index)
    {

        $attributes = [
            'id' => 'id',
            'buyerId' => 'buyer_id',
            'productId' => 'product_id',
            'quantity' => 'quantity',
            'price' => 'price',
            'lastChangeDate' => 'updated_at',
            'deletedDate' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}