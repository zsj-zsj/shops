<div class="input-field">
        <form action="{{url('/goodssecrch')}}" method="GET">
            <input type="text" name="goods_name" value="{{$query['goods_name'] ?? ''}}" placeholder="请搜索需要的商品">
            <button  class="btn button-default">搜索</button>
        </form>  
    </div>
    <div class="row">
        @foreach ($data as $v)
        <div class="col s6">
            <div class="content">
                <img src="{{env('ADMIN')}}{{$v->goods_img}}">
                <h6>{{$v->goods_name}}</h6>
                <div class="price">
                    ${{$v->goods_price}}
                </div>
                <a href="{{url('goodsdetails')}}?id={{$v->goods_id}}">
                <button class="btn button-default">查看详情</button></a>
            </div>
        </div>
        @endforeach
    </div>	
    <div class="pagination">
        <ul>
            <li class="active">{{$data->appends($query)->links()}}</li>
        </ul>
    </div>