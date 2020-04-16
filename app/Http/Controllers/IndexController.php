<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\User;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cookie;


class IndexController extends Controller
{
    //展示主页   和商品
    public function indexList()
    {
        $cookie=$_COOKIE;
        $uid=isset($cookie['uid']) ? $cookie['uid'] : NULL;
        $user=User::where('id','=',$uid)->first();
        
        $data=Goods::paginate(4);
        $query=request()->all();
        return view('index.index',['data'=>$data,'query'=>$query,'user'=>$user]);
    }

    //商品详情
    public function goodsDetails(Request $request)
    {
        $id=$request->id;
        $data=Goods::where('goods_id','=',$id)->first();
        return view('goods.details',['data'=>$data]);
    }

}
