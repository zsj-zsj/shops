<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\User;
use App\Model\Collect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cookie;


class IndexController extends Controller
{
    //展示主页   和商品
    public function indexList()
    {
        $user=User::userInfo();
        $data=Goods::paginate(4);
        $query=request()->all();
        return view('index.index',['data'=>$data,'query'=>$query,'user'=>$user]);
    }

    //商品详情
    public function goodsDetails(Request $request)
    {
        $user=User::userInfo();
        $id=$request->id;
        $data=Goods::where('goods_id','=',$id)->first();
        return view('goods.details',['data'=>$data,'user'=>$user]);
    }

    //个人中心视图
    public function center()
    {
        $user=User::userInfo();
        return view('index.center',['user'=>$user]);
    }

    //商品收藏
    public function collect(Request $request)
    {   
        $cookie=$_COOKIE;
        $uid=isset($cookie['uid']) ? $cookie['uid'] : NULL;
        $goods_id=$request->goods_id;
        $res=Collect::where('goods_id','=',$goods_id)->first();
        if($res){
            echo "<script>alert('商品已收藏');location.href='/goodsdetails?id=$goods_id';</script>";
        }else{
            $data=[
                'id'=>$uid,
                'goods_id'=>$goods_id
            ];
            Collect::insertGetId($data);
            echo "<script>alert('收藏成功');location.href='/goodsdetails?id=$goods_id';</script>";
        }
    }

}
