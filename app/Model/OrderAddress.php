<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $table = 'shop_order_address';
    protected $primaryKey='orderaddress_id';
    protected $guarded = [];
}
