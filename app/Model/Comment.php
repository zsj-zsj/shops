<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //评论
    protected $table = 'shop_comment';
    protected $primaryKey='comment_id';
    protected $guarded = [];
}
