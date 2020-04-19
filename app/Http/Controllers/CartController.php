<?php

namespace App\Http\Controllers;

use App\Model\Goods;
use App\Model\User;
use App\Model\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //加入购物车
    public function addCart(Request $request)
    {
        $user=User::userInfo();
        $goods_id=$request->goods_id;
        $buy_num=$request->buy_num;
        $data=[
            'goods_id'=>$goods_id,
            'id'=>$user['id']
        ];
        if($user){
            $cartInfo=Cart::where($data)->first();
            $goods_num=Goods::where('goods_id','=',$goods_id)->first();
            $num=$buy_num+$cartInfo['buy_num'];  //累加的数量
            $maxnum=$buy_num+$cartInfo['buy_num']; //判断库存的数量
            if($maxnum>$goods_num['goods_num']){
                return $data=['msg'=>222,'res'=>'购买数量已超过库存'];   
            }else{
                if($cartInfo){
                    Cart::where($data)->update(['buy_num'=>$num,'is_del'=>1]);
                    return $data=['msg'=>000,'res'=>'加入购物车成功'];          
                }else{
                    $data=[
                        'buy_num'=>$buy_num,
                        'id'=>$user['id'],
                        'goods_id'=>$goods_id
                    ];
                    Cart::insertGetId($data);
                    return $data=['msg'=>000,'res'=>'加入购物车成功']; 
                }
            }   
        }else{
            return $data=['msg'=>111,'res'=>'请先登录'];
        }
    }

    //购物车列表
    public function cartList()
    {
        $user=User::userInfo();
        $where=[
            'is_del'=>1,
            'id'=>$user['id']
        ];
        $data=Cart::where($where)
                ->join('shop_admin_goods','shop_admin_goods.goods_id','=','shop_cart.goods_id')
                ->get();
        $total=0;
        foreach($data as $v){
            $total+=$v['goods_price']*$v['buy_num'];
        }
        return view('goods.cart',['user'=>$user,'data'=>$data,'total'=>$total]);
    }

    //删除购物车
    public function delcart(Request $request)
    {
        $cart_id=$request->cart_id;
        $res=Cart::where(['cart_id'=>$cart_id])->update(['is_del'=>2,'buy_num'=>0]);
        return $data=['msg'=>'000','res'=>'已取消购物车'];
    }
}
