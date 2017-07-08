@extends('master')
@section('title','编辑权限')
@section('content')
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="hd">
        <h2 class="page_title">
            编辑权限
        </h2>
    </div>
    <form method="POST" action="{{url('/permission',$permission->id)}}">
        <input type="hidden" name="_method" value="PATCH">
        {{csrf_field()}}
        <div class="weui_cells weui_cells_form">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">名字</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input id="nameid" name="name" class="weui_input" placeholder="填写权限名字"
                           value="{{$permission->name or ''}}"/>
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">标识</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input id="slugid" name="slug" class="weui_input" placeholder="填写权限标识"
                           value="{{$permission->slug or ''}}"/>
                </div>
            </div>
        </div>

        <div class="weui_cells_title">权限描述</div>
        <div class="weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary">
                    <input id="descriptionid" name="description" class="weui_input" placeholder="对该权限的描述" type="text"
                           value="{{$permission->name or ''}}">
                </div>
            </div>
        </div>
        <div class="weui_btn_area">
            {{--<a id="btnlogin" onclick="create()" class="weui_btn weui_btn_primary" href="javascript:">创建</a>--}}
            <input type="submit" class="weui_btn weui_btn_primary" value="修改">
        </div>
    </form>
@endsection
