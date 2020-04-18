<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'shop_comment';
    protected $primaryKey='comment_id';
    protected $guarded = [];
}
