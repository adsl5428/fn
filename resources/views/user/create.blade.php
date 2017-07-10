@extends('master')
@section('title','用户管理')
@section('content')
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="hd">
        <h4 class="page_title">
            用户创建
        </h4>
    </div>

    <form method="POST" action="{{url('/user')}}">
        {{csrf_field()}}
        <div class="weui_cells_title">基本</div>
        <div class="weui_cells weui_cells_form">

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">名字</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input id="nameid" name="name" class="weui_input" placeholder="填写用户名字" />
                </div>
            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">身份证</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input id="idcardid" name="idcard" type="number" class="weui_input" placeholder="身份证号码" />
                </div>
            </div>


            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">持卡银行</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input id="bankid" name="bank" class="weui_input" placeholder="请填写银行名称" />
                </div>
            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">开户行</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input id="kaihuhangid" name="kaihuhang" class="weui_input" placeholder="开户行" />
                </div>
            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">银行卡号</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input id="bankcardid" name="bankcard" class="weui_input" placeholder="银行卡号" />
                </div>
            </div>


            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">电话</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input id="telid" name="tel" type="number" class="weui_input" placeholder="电话号码" />
                </div>
            </div>


        </div>

        <div class="weui_cells_title">用户权限</div>
        {{--<div class="weui_cells weui_cells_checkbox">--}}
            {{--@for($i = count($permissions)-1; $i>=0 ; $i--)--}}
                {{--<div class="weui-flex">--}}
                    {{--<div class="weui-flex-item">--}}
                        {{--<label class="weui_cell weui_check_label" for="s{{$permissions[$i]->id}}">--}}
                            {{--<div class="weui_cell_hd">--}}
                                {{--<input value="{{$permissions[$i]->id}}" type="checkbox" name="checkbox{{$permissions[$i]->id}}" class="weui_check" id="s{{$permissions[$i]->id}}">--}}
                                {{--<i class="weui_icon_checked"></i>--}}
                            {{--</div>--}}
                            {{--<div class="weui_cell_bd weui_cell_primary">--}}
                                {{--<p>{{$permissions[$i--]->name}}</p>--}}
                            {{--</div>--}}
                        {{--</label>--}}
                    {{--</div>--}}
                    {{--@if($i<0)--}}
                        {{--@break--}}
                    {{--@endif--}}
                    {{--<div class="weui-flex-item">--}}
                        {{--<label class="weui_cell weui_check_label" for="s{{$permissions[$i]->id}}">--}}
                            {{--<div class="weui_cell_hd">--}}
                                {{--<input value="{{$permissions[$i]->id}}" type="checkbox" name="checkbox{{$permissions[$i]->id}}" class="weui_check" id="s{{$permissions[$i]->id}}">--}}
                                {{--<i class="weui_icon_checked"></i>--}}
                            {{--</div>--}}
                            {{--<div class="weui_cell_bd weui_cell_primary">--}}
                                {{--<p>{{$permissions[$i]->name}}</p>--}}
                            {{--</div>--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endfor--}}
        {{--</div>--}}



        <div class="weui_btn_area">
            {{--<a id="btnlogin" onclick="create()" class="weui_btn weui_btn_primary" href="javascript:">创建</a>--}}
            <input type="submit" class="weui_btn weui_btn_primary" value="创建">
        </div>
    </form>

@endsection
@section('js')

@endsection