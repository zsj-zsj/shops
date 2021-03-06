<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'shop_user';
    protected $guarded = [];

    //用户信息
    public static function userInfo()
    {
        $cookie=$_COOKIE;
        $uid=isset($cookie['uid']) ? $cookie['uid'] : NULL;
        $user=User::where('id','=',$uid)->first();
        return $user;
    } 
}
