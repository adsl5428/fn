@extends('master')
@section('title','用户管理')
@section('content')
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="page_hd">
        <h1 class="page_title">
            用户列表
        </h1>
    </div>
    <div class="weui_cell_ft">
        {{--<i class="weui_icon_warn"></i>--}}
        <a href="{{url('user/create')}}" class="weui-vcode-btn">创建</a>
    </div>
    <table class="weui-table weui-border-tb"  id="table">
        <thead>
        <tr><th>名字</th><th>电话</th><th>签约人</th><th>操</th><th>作</th></tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr id="row{{$user->id}}"><td>{{$user->name}}</td><td>{{$user->tel }}</td>
                <td>{{$qianyue or '' }}</td>
                <td><a href="{{url('user',[$user->id,'edit'])}}">改</a></td>
                <td><a onclick="del('{{$user->id}}')" href="javascript:;"   >删</a></td></tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('js')
    {{--<script type='text/javascript'>--}}
    function del(id) {
        $.confirm("您确定要删除吗?", "确认删除?", function() {
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
                            '_token':"{{csrf_token()}}"
                        },
                    url: "user/"+id,
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
        }, function() {

        });

    }
@endsection