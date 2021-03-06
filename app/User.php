<?php

namespace App;

use App\Transformers\UserTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    const  USER_VERIFIED = 1;
    const  USER_UNVERIFIED = 0;
    const  ADMIN_USER = 'true';
    const  REGULAR_USER = 'false';

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    public $transformer = UserTransformer::class;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function  generateVerifiedToken(){
        return str_random(50);
    }
}
