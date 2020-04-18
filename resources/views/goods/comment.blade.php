@extends('layout.app')
@section('title', '评论列表')
@section('content')
@include('layout.menu')

<table class="input-field">
    <tr>
        <td>评论人</td>
        <td>评论内容</td>
    </tr>
    @foreach ($data as $v)
    <tr>
        <td>{{$v->name}}</td>
        <td>{{$v->text}}</td>
    </tr>
    @endforeach
</table>

@endsection