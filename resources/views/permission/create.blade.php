@extends('master')
@section('title','权限管理')
@section('content')
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="hd">
        <h2 class="page_title">
            权限创建
        </h2>
    </div>
    <form method="POST" action="{{url('/permission')}}">
        {{csrf_field()}}
     <div class="weui_cells_title">基本</div>
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">名字</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="nameid" name="name"  class="weui_input" placeholder="填写权限名字"
                       />
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">标识</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="slugid" name="slug" pattern="[A-z]*" class="weui_input" placeholder="填写权限标识(纯字母)"
                       />
            </div>
        </div>
    </div>

    <div class="weui_cells_title">权限描述</div>
        <div class="weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary">
                    <input id="descriptionid" name="description" class="weui_input" placeholder="对该权限的描述" type="text"
                           >
                </div>
            </div>
        </div>
    <div class="weui_btn_area">
        {{--<a id="btnlogin" onclick="create()" class="weui_btn weui_btn_primary" href="javascript:">创建</a>--}}
        <input type="submit" class="weui_btn weui_btn_primary" value="创建">
    </div>
    </form>
@endsection
@section('js')

@endsection