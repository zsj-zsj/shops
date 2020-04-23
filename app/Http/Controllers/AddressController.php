<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Address;
use App\Model\Area;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    //列表页面
    public function index()
    {
        $user=User::userInfo();
        $where=[
            'id'=>$user['id']
        ];
        $data=Address::where($where)->get()->toArray();
        foreach($data as $k=>$v){
            $data[$k]['province']=Area::where('id',$v['province'])->value('name');
            $data[$k]['city']=Area::where('id',$v['city'])->value('name');
            $data[$k]['area']=Area::where('id',$v['area'])->value('name');
        }
        return view('address.index',['user'=>$user,'data'=>$data]);
    }

    //城市信息
    public function area(Request $request)
    {
        $id=$request->id;
        $info=Area::where(['pid'=>$id])->get()->toArray();
        return $data=['msg'=>'000','data'=>$info];
    }

    //添加页面
    public function create()
    {
        $user=User::userInfo();
        $area=Area::where('pid','=',0)->get();
        return view('address.create',['user'=>$user,'area'=>$area]);
    }

    //执行添加
    public function docreate(Request $request)
    {
        request()->validate([
            'add_name' => 'required',
            'add_mobile'=>'required|regex:/^1[345789][0-9]{9}$/',
            'detailed' => 'required',
            'province' => 'required',
            'city' => 'required',
            'area' => 'required',
        ],[ 
            'add_name.required'=>'请输入用户名',
			'add_mobile.required'=>'手机号不能为空',
            'add_mobile.regex'=>'手机号格式不对',
            'detailed.required'=>'请输入详细地址',
            'province.required'=>'请选择省',
            'city.required'=>'请选择市',
            'area.required'=>'请选择区',
        ]);

        $user=User::userInfo();
        $post=$request->except('_token');
        $data=[
            'id'=>$user['id'],
            'add_name'=>$post['add_name'],
            'add_mobile'=>$post['add_mobile'],
            'province'=>$post['province'],
            'city'=>$post['city'],
            'area'=>$post['area'],
            'detailed'=>$post['detailed'],
        ];
        Address::insertGetId($data);
        echo "<script>alert('添加成功');location.href='/address/index';</script>";
    }

    //删除
    public function delete(Request $request)
    {
        $id=$request->address_id;
        // Address::where('address_id','=',$id)->delete();
        Address::destroy($id);
        return $data=['msg'=>000,'res'=>'删除成功'];
    }

    //修改视图
    public function edit(Request $request)
    {
        $user=User::userInfo();
        $area=Area::where('pid','=',0)->get();
        $id=$request->id;
        $data=Address::where(['address_id'=>$id])->first();
        $city=Area::where('id','=',$data['city'])->get();
        $qu=Area::where('id','=',$data['area'])->get();
        return view('address.edit',['user'=>$user,'data'=>$data,'area'=>$area,'city'=>$city,'qu'=>$qu]);
    }

    //执行修改
    public function update(Request $request)
    {
        request()->validate([
            'add_name' => 'required',
            'add_mobile'=>'required|regex:/^1[345789][0-9]{9}$/',
            'detailed' => 'required',
        ],[ 
            'add_name.required'=>'请输入用户名',
			'add_mobile.required'=>'手机号不能为空',
            'add_mobile.regex'=>'手机号格式不对',
            'detailed.required'=>'请输入详细地址',
        ]);
        $post=$request->except('_token');
        Address::where('address_id','=',$post['address_id'])->update($post);
        echo "<script>alert('修改成功');location.href='/address/index';</script>";   
    }

    //默认地址
    public function detailed(Request $request)
    {
        $id=$request->id;
        $user=User::userInfo();
        $where=[
            'id'=>$user['id'],
            'is_detailed'=>2
        ];
        $a=Address::where($where)->update(['is_detailed'=>1]);
        $b=Address::where('address_id','=',$id)->update(['is_detailed'=>2]);
        echo "<script>alert('设置成功,可以购买商品啦');location.href='/address/index';</script>";  
    }

}
