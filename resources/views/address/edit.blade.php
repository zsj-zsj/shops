{{-- @extends('layout.app') --}}
{{-- @section('title', '我的收藏') --}}
{{-- @section('content') --}}
@include('layout.menu')

<div class="pages section">
    <div class="container">
        <div class="pages-head">
            <h3>修改收货地址</h3>
        </div>
        <div class="register">
            <div class="row">
                <form class="col s12" method="post" action="{{url('address/update')}}">
                    @csrf
                    <input type="hidden" name="address_id" value="{{$data['address_id']}}">
                    <div class="input-field">
                        <input type="text" class="validate" value="{{$data['add_name']}}" name="add_name" placeholder="收货人姓名"> <br>
                        <b style="color:red"> @php echo $errors->first('add_name'); @endphp </b>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="请输入手机号" value="{{$data['add_mobile']}}" name="add_mobile" class="validate"> <br>
                        <b style="color:red"> @php echo $errors->first('add_mobile'); @endphp </b>
                    </div>
                        <select name="province">
                            <option value='0' selected="selected">请选择</option>
                            @foreach($area as $v)
                            <option value="{{$v->id}}" {{$v->id==$data['province'] ? 'selected' : ''}} >{{$v->name}}</option>
                            @endforeach
                        </select>
                        <select name="city">
                            @foreach($city as $v)
                            <option value="{{$v->id}}" {{$v->id==$data['city'] ? 'selected' : ''}} >{{$v->name}}</option>
                            @endforeach
                        </select>
                        <select name="area">
                            @foreach($qu as $v)
                            <option value="{{$v->id}}" {{$v->id==$data['city'] ? 'selected' : ''}} >{{$v->name}}</option>
                            @endforeach
                        </select>
                    <div class="input-field">
                        <input type="text" placeholder="详细地址" value="{{$data['detailed']}}" name="detailed" class="validate" > <br>
                        <b style="color:red"> @php echo $errors->first('detailed'); @endphp </b>
                    </div>
                    <input type="submit" class="btn button-default" value="修改">
                </form> 
            </div>
        </div>
    </div>
</div>

{{-- @include('layout.public') --}}

<script src="/style/js/jquery.min.js"></script>
<script>
    //联动
    $(document).on('change','select',function(){
        var id=$(this).val()
        var obj=$(this)
        obj.nextAll('select').html("<option value=''>请选择</option>")
        $.get(
            "{{url('address/area')}}",
            {id:id},
            function(res){
               if(res.msg==000){
                   var str='<option>请选择</option>'
                   $.each(res.data,function(i,k){
                       str+='<option value='+k.id+'>'+k.name+'</option>'
                   })
                   obj.next('select').html(str)
               }
            }
        ),'json'
    })
</script>

{{-- @endsection --}}