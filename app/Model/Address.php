<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //地址
    protected $table = 'shop_address';
    protected $primaryKey='address_id';
    protected $guarded = [];
}
