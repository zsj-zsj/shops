<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Redis;
use Closure;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cookie=$_COOKIE;
        $key='str:user:token'.isset($cookie['uid']);
        $token=Redis::get($key);
        $uri=env('PASSPORT').'/login';
        if($token != isset($cookie['token'])){
            echo "<script>alert('token不对');location.href='$uri';</script>";
        }
        if(!isset($cookie['token'])){
            echo "<script>alert('请先登录');location.href='$uri';</script>";
        }
        return $next($request);
    }
}
