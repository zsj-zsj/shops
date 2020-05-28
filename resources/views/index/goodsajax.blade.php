<div class="row">
        @foreach ($data as $v)
        <div class="col s6">
            <div class="content">
                <img src="{{env('ADMIN')}}{{$v->goods_img}}" width="50" height="50">
                <h6><a href="{{url('goodsdetails')}}?id={{$v->goods_id}}">{{$v->goods_name}}</a></h6>
                <div class="price">
                    ${{$v->goods_price}}
                </div>
                <a href="{{url('goodsdetails')}}?id={{$v->goods_id}}">
                <button class="btn button-default">查看详情</button></a>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="pagination-product">
        <ul>
            {{$data->links('vendor.pagination.default')}}
        </ul>
    </div>