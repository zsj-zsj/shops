<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderGoods extends Model
{
    protected $table = 'shop_order_goods';
    protected $primaryKey='ordergoods_id';
    protected $guarded = [];
}
