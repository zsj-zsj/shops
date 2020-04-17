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
        $where=[
            'goods_id'=>$goods_id,
            'id'=>$uid,
        ];
        $res=Collect::where($where)->first();
        if($res){
            Collect::where($where)->update(['id_del'=>1]);
            echo "<script>alert('已收藏');location.href='/goodsdetails?id=$goods_id';</script>";
        }else{
            $data=[
                'id'=>$uid,
                'goods_id'=>$goods_id
            ];
            Collect::insertGetId($data);
            echo "<script>alert('收藏成功');location.href='/goodsdetails?id=$goods_id';</script>";
        }
    }

    //我的收藏
    public function myCollect()
    {
        $user=User::userInfo();
        $where=[
            'id'=>$user['id'],
            'id_del'=>1
        ];
        $data=Collect::where($where)
                        ->join('shop_admin_goods','shop_admin_goods.goods_id','=','shop_collect.goods_id')
                        ->get();
        return view('index.mycollect',['data'=>$data,'user'=>$user]);
    }

    //删除我的收藏
    public function delCollect(Request $request)
    {
        $id=$request->id;
        Collect::where(['collect_id'=>$id])->update(['id_del'=>2]);
        echo "<script>alert('已取消收藏');location.href='/mycollect';</script>";
    }

}
