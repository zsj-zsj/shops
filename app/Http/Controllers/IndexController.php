<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\User;
use App\Model\Collect;
use App\Model\Comment;
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
        if(request()->ajax()){
            return view('index.goodsajax',['data'=>$data,'user'=>$user]);
        }
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

    //搜索商品
    public function goodsSecrch(Request $request)
    {
        $user=User::userInfo();
        $goods_name=$request->goods_name;
        $where=[];
        if($goods_name){
            $where[]=['goods_name','like',"%$goods_name%"];
        }
        $data=Goods::orderBy('goods_id','desc')->where($where)->paginate(4);
        $query=request()->all();
        if(request()->ajax()){
            return view('index.goodsajax',['data'=>$data,'user'=>$user,'query'=>$query]);
        }
        return view('goods.search',['user'=>$user,'data'=>$data,'query'=>$query]);
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

    //商品评论
    public function comment(Request $request)
    {
        $user=User::userInfo();
        $data=$request->except('_token');
        $goods_id=$request->goods_id;
        $arr=[
            'goods_id'=>$goods_id,
            'id'=>$user['id'],
            'text'=>$data['text']
        ];
        Comment::insertGetId($arr);
        echo "<script>alert('评论成功,将跳转至评论列表页面');location.href='/commentlist?id=$goods_id';</script>";
    }

    //评论列表
    public function commentList(Request $request)
    {
        $user=User::userInfo();
        $id=$request->id;
        $data=Comment::where('goods_id','=',$id)->join('shop_user','shop_user.id','=','shop_comment.id')->get();
        return view('goods.comment',['data'=>$data,'user'=>$user]);
    }

}
