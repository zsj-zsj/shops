<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use GuzzleHttp\Client;

class PayController extends Controller
{
    public function pay(Request $request)
    {
        $order_id=$request->id;
        session(['id'=>$order_id]);
        $res=Order::where('order_id','=',$order_id)->first();

        $url='https://openapi.alipaydev.com/gateway.do';

        $common_param=[
            'out_trade_no'=>$res->order_no,
            'product_code'=>'FAST_INSTANT_TRADE_PAY',
            'total_amount'=>$res->order_count,
            'subject'=>'商品订单：'.$res->order_no
        ];
        $pub_param=[
            'app_id'=>env('APPID'),
            'method'=>'alipay.trade.page.pay',
            'charset'=>'utf-8',
            'sign_type'=>'RSA2',
            'timestamp'=>date('Y-m-d H:i:s'),
            'return_url'=>env('RETURN_URL'), 
            'notify_url'=>env('NOTIFY_URL'), 
            'version'=>'1.0',
            'biz_content'=>json_encode($common_param)
        ];

        $arr=array_merge($pub_param,$common_param);
        ksort($arr);
        // print_r($arr);  echo '<hr>';
        $str='';
        foreach($arr as $k=>$v){
            $str.=$k.'='.$v.'&';
        }
        $str=rtrim($str,'&');
        // $keys=openssl_pkey_get_private('file://'.storage_path('keys/priv_myali.key'));
        $priv_key=file_get_contents(storage_path('keys/priv_myali.key'));
        $priv_key=openssl_get_privatekey($priv_key);
        openssl_sign($str,$sign,$priv_key,OPENSSL_ALGO_SHA256);
        $sign=base64_encode($sign);
        $request_url=$url.'?'.$str.'&sign='.urlencode($sign);
        // print_r($request_url);die;

        header('Location:'.$request_url);
    }

    public function notifyUrl()
    {
       echo 111;
    }

    public function returnurl()
    {
        $id=session('id');
        Order::where('order_id','=',$id)->update(['pay_status'=>2,'order_status'=>3]);
        $sign=base64_decode($_GET['sign']);
        $data=$_GET;
        unset($data['sign']);
        unset($data['sign_type']);
        ksort($data);
        $str='';
        foreach($data as $k=>$v){
            $str.=$k.'='.$v.'&';
        }
        $str=rtrim($str,'&');
        $key=file_get_contents(storage_path('keys/pub_ali.key'));
        $key=openssl_get_publickey($key);
        $res=openssl_verify($str,$sign,$key, OPENSSL_ALGO_SHA256);
        // dd($res);
        return redirect('order/myorder');
    }
}
