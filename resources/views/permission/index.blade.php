@extends('master')
@section('title','权限')
@section('content')
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="page_hd">
        <h1 class="page_title">
            权限
        </h1>
    </div>
    <div class="weui_cell_ft">
        {{--<i class="weui_icon_warn"></i>--}}
        <a href="{{url('permission/create')}}" class="weui-vcode-btn">创建</a>
    </div>
    <table class="weui-table weui-border-tb"  id="table">
        <thead>
        <tr><th>标识 </th><th>名字</th><th>操</th><th>作</th></tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
        <tr id="row{{$permission->id}}"><td>{{$permission->slug}}</td><td>{{$permission->name }}</td>
            <td><a href="{{url('permission',[$permission->id,'edit'])}}">改</a></td>
            <td><a onclick="del(this,'{{$permission->id}}')" href="javascript:;"   >删</a></td></tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('js')
    {{--<script type='text/javascript'>--}}
    function deleteRow(obj){
    var index=obj.parentNode.rowIndex;
    {{--var table = document.getElementById("table");--}}
    var table = $('#table')[0];
    table.deleteRow(index);
    }
    function del(obj,id) {
    $.showLoading();
    t = setTimeout(function() {
    $.hideLoading();$.toptips("服务无响应，请稍候再试 ");
    }, 10000);
        $.ajax(
            {
                type:"post" ,
                dataType: "json",
                data:
                    {
                        '_method': "DELETE",
                        'id':id,
                        '_token':"{{csrf_token()}}"
                    },
                url: "permission/destroy",
                success:function(data){
                    clearTimeout(t);
                    $.hideLoading();
                    if(data.status == 0)
                    {
                        $.toptips(data.msg);
                    }
                    else
                    {
                        $.toptips(data.msg,'ok')
                        $("#row"+id).remove();

                     }
                }
            });
    }
@endsection