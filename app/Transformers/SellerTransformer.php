<?php
/**
 * Created by PhpStorm.
 * User: tapos
 * Date: 6/9/2017
 * Time: 5:05 PM
 */

namespace App\Transformers;

use App\Seller;
use App\User;
use League\Fractal\TransformerAbstract;

class SellerTransformer extends TransformerAbstract
{
    public function transform(Seller $user)
    {

        return [
            'id' => (int)$user->id,
            'name' => (string)$user->name,
            'email' => (string)$user->email,
            'isVerified' => (bool) $user->verified,
            'verificationToken' => isset($user->verification_token) ? (string) $user->verification_token : null ,
            'isAdmin' =>  $user->admin==='true'? true:false,
            'lastChangeDate' => (string) $user->updated_at,
            'deletedDate' => isset($user->deleted_at) ? (string)$user->deleted_at :null ,

        ];
    }

    public static function originalAttribute($index)
    {

        $attributes = [
            'id' => 'id',
            'name' => 'name',
            'email' => 'email',
            'isVerified' => 'verified',
            'verificationToken' => 'verification_token',
            'isAdmin' => 'admin',
            'lastChangeDate' => 'updated_at',
            'deletedDate' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}