<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'shop_admin_goods';
    protected $primaryKey='goods_id';
    protected $guarded = [];
}
