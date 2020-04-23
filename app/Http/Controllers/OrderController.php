<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\User;
use App\Model\Cart;
use App\Model\Address;
use App\Model\Area;
use App\Model\Order;
use App\Model\OrderGoods;
use App\Model\OrderAddress;
// use Illuminate\Support\Str;  Str::random(16);
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //去结算视图
    public function index(Request $request)
    {
        $user=User::userInfo();
        $goods_id=$request->goods_id;
        $goods_id=explode(',',$goods_id);
        $where=[
            'is_del'=>1,
            'id'=>$user['id']
        ];
        $data=Goods::join('shop_cart','shop_cart.goods_id','=','shop_admin_goods.goods_id')
                ->where($where)
                ->whereIn('shop_cart.goods_id',$goods_id)
                ->get();
        $count=0;
        foreach($data as $v){
            $count+=$v['goods_price']*$v['buy_num'];
        }

        $detailed=[
            'is_detailed'=>2,
            'id'=>$user['id']
        ];
        $address=Address::where($detailed)->first();
        $address['province']=Area::where('id','=',$address['province'])->value('name');
        $address['city']=Area::where('id','=',$address['city'])->value('name');
        $address['area']=Area::where('id','=',$address['area'])->value('name');

        return view('order.index',['user'=>$user,'data'=>$data,'count'=>$count,'address'=>$address]);
    }
    
    //确认结算 订单五表
    public function addorder(Request $request)
    {
        $user=User::userInfo();
        $goods_id=$request->goods_id;
        $goods_id=explode(',',$goods_id);
        $address_id=$request->address_id;
        //开启事务
        DB::beginTransaction();
        try{
            //order 订单表
            $orderwhere=[
                'id'=>$user['id'],
                'is_del'=>1
            ];
            $orderres=Cart::join('shop_admin_goods','shop_admin_goods.goods_id','=','shop_cart.goods_id')
                    ->where($orderwhere)
                    ->whereIn('shop_admin_goods.goods_id',$goods_id)
                    ->get()->toArray();
            $count=0;
            foreach($orderres as $v){
                $count+=$v['goods_price']*$v['buy_num'];
            }
            $orderdata['order_no']=time().mt_rand(11111,99999);
            $orderdata['id']=$user['id'];
            $orderdata['order_count']=$count;
            $order=Order::insertGetId($orderdata);
            if(empty($order)){
                throw new \Exception('添加订单失败');
            }
            //订单地址表
            $address=Address::where('address_id','=',$address_id)->first()->toArray();
            unset($address['is_detailed']);
            unset($address['address_id']);
            unset($address['created_at']);
            unset($address['updated_at']);
            $address['order_id']=$order;
            $address=OrderAddress::insertGetId($address);
            if(empty($address)){
                throw new \Exception('订单地址有误');
            }
            //订单商品表
            foreach($orderres as $k=>$v){
                $orderres[$k]['order_id']=$order;
                unset($orderres[$k]['goods_no']);
                unset($orderres[$k]['goods_score']);
                unset($orderres[$k]['is_del']);
                unset($orderres[$k]['goods_desc']);
                unset($orderres[$k]['cart_id']);
                unset($orderres[$k]['goods_num']);
                unset($orderres[$k]['created_at']);
                unset($orderres[$k]['updated_at']);
            }
            $ordergoods=OrderGoods::insert($orderres);
            if(empty($ordergoods)){
                throw new \Exception('订单商品有误');
            }
            //修改购物车
            $cartwhere=[
                'id'=>$user['id'],
                'is_del'=>1
            ];
            $cart=Cart::where($cartwhere)->whereIn('shop_cart.goods_id',$goods_id)->update(['is_del'=>2]);
            if(empty($cart)){
                throw new \Exception('购物车修改失败');
            }
            //库存减少
            foreach($orderres as $k=>$v){
                $goods=Goods::where('goods_id',$v['goods_id'])->decrement('goods_num',$v['buy_num']);
            }
            if(empty($goods)){
                throw new \Exception('库存修改失败');
            }
            DB::commit();
            echo "<script>alert('订单提交成功');location.href='/order/alipay?order_id=$order';</script>";
        }catch(\Exception $e){
            DB::rollBack();
            echo $e->getMessage();
            header('refresh:2;url=/cartlist');
        }

    }

    //支付页面
    public function alipay(Request $request)
    {
        $order_id=$request->order_id;
        $where=[
            'order_id'=>$order_id,
            'pay_status'=>1
        ];
        $data=Order::where($where)->first();
        $user=User::userInfo();
        return view('order.alipay',['user'=>$user,'data'=>$data]);
    }
}
