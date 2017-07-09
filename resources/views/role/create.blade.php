@extends('master')
@section('title','角色管理')
@section('content')
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="hd">
        <h4 class="page_title">
            角色创建
        </h4>
    </div>

    <form method="POST" action="{{url('/role')}}">
        {{csrf_field()}}
    <div class="weui_cells_title">基本</div>
    <div class="weui_cells weui_cells_form">

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">名字</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="nameid" name="name" class="weui_input" placeholder="填写角色名字"
                       />
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">标识</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="slugid" name="slug" pattern="[A-z]*" class="weui_input" placeholder="填写角色标识(纯字母)"
                       />
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">level</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="levelid"  name="level" class="weui_input" type="number"
                       pattern="[0-9]*" placeholder="填写角色level(纯数字)" />
            </div>
        </div>
    </div>
        <div class="weui_cells_title">角色描述</div>
        <div class="weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary">
                    <input id="descriptionid" name="description" class="weui_input" placeholder="对该角色的描述" type="text"
                    >
                </div>
            </div>
        </div>
        <div class="weui_cells_title">角色权限</div>
        <div class="weui_cells weui_cells_checkbox">

            @for($i = count($permissions)-1; $i>=0 ; $i--)
            <div class="weui-flex">
                <div class="weui-flex-item">
                     <label class="weui_cell weui_check_label" for="s{{$permissions[$i]->id}}">
                         <div class="weui_cell_hd">
                             <input value="{{$permissions[$i]->id}}" type="checkbox" name="checkbox{{$permissions[$i]->id}}" class="weui_check" id="s{{$permissions[$i]->id}}">
                             <i class="weui_icon_checked"></i>
                         </div>
                         <div class="weui_cell_bd weui_cell_primary">
                            <p>{{$permissions[$i--]->name}}</p>
                         </div>
                     </label>
                </div>
                @if($i<0)
                    @break
                @endif
                <div class="weui-flex-item">
                     <label class="weui_cell weui_check_label" for="s{{$permissions[$i]->id}}">
                         <div class="weui_cell_hd">
                             <input value="{{$permissions[$i]->id}}" type="checkbox" name="checkbox{{$permissions[$i]->id}}" class="weui_check" id="s{{$permissions[$i]->id}}">
                             <i class="weui_icon_checked"></i>
                          </div>
                         <div class="weui_cell_bd weui_cell_primary">
                             <p>{{$permissions[$i]->name}}</p>
                         </div>
                     </label>
                </div>
            </div>
            @endfor
        </div>

    <div class="weui_btn_area">
        {{--<a id="btnlogin" onclick="create()" class="weui_btn weui_btn_primary" href="javascript:">创建</a>--}}
        <input type="submit" class="weui_btn weui_btn_primary" value="创建">
    </div>
    </form>

@endsection
@section('js')

@endsection