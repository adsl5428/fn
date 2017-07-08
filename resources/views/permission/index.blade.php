@extends('master')
@section('title','权限')
@section('content')
    <div class="page-hd">
        <h1 class="page-hd-title">
            权限
            <div class="weui_cell_ft">
                {{--<i class="weui_icon_warn"></i>--}}
                <a href="{{url('permission/create')}}" class="weui-vcode-btn">创建</a>
            </div>
        </h1>
    </div>
    <table class="weui-table weui-border-tb">
        <thead>
        <tr><th>标识 </th><th>名字</th><th>操</th><th>作</th></tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
        <tr><td>{{$permission->slug}}</td><td>{{$permission->name }}</td>
            <td><a href="#">改</a></td>
            <td><a  href="{{url('permission/destroy',$permission->id)}}" >删</a></td></tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('js')

@endsection