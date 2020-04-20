<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    //收藏
    protected $table = 'shop_collect';
    protected $primaryKey='collect_id';
    protected $guarded = [];
}
