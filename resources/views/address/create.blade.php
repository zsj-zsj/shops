{{-- @extends('layout.app') --}}
{{-- @section('title', '我的收藏') --}}
{{-- @section('content') --}}
@include('layout.menu')

<div class="pages section">
    <div class="container">
        <div class="pages-head">
            <h3>添加收货地址</h3>
        </div>
        <div class="register">
            <div class="row">
                <form class="col s12" method="post" action="{{url('address/create')}}">
                    @csrf
                    <div class="input-field">
                        <input type="text" class="validate" name="add_name" placeholder="收货人姓名"> <br>
                        <b style="color:red"> @php echo $errors->first('add_name'); @endphp </b>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="请输入手机号" name="add_mobile" class="validate"> <br>
                        <b style="color:red"> @php echo $errors->first('add_mobile'); @endphp </b>
                    </div>
                        <select name="province">
                            <option value='0' selected="selected">请选择</option>
                            @foreach($area as $v)
                            <option value="{{$v->id}}">{{$v->name}}</option>
                            @endforeach
                        </select>
                        <select name="city" class="area">
                            <option value='' selected="selected">请选择</option>
                        </select>
                        <select name="area">
                            <option value='' selected="selected">请选择</option>
                        </select>
                    <div class="input-field">
                        <input type="text" placeholder="详细地址" name="detailed" class="validate" > <br>
                        <b style="color:red"> @php echo $errors->first('detailed'); @endphp </b>
                    </div>
                    <input type="submit" class="btn button-default" value="添加">
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