@extends('master')
@section('content')
<link rel="stylesheet" type="text/css"  href="{{asset('css/weui.css')}}">
<link rel="stylesheet" type="text/css"  href="{{asset('css/weui2.css')}}">
<style>
    .mui-checkbox {
        position: relative;
        width: 25px;
        height: 25px;
        margin-right: 1px;
        margin-left: 15px;
        background-color: #FFFFFF;
        border: solid 1px #d9d9d9;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        background-clip: padding-box;
        display: inline-block;
        -webkit-appearance: none; }

    .mui-checkbox:focus {
        outline: 0 none;
        outline-offset: -2px; }

    .mui-checkbox:checked:before {
        display: inline-block;
        margin-top: 1px;
        margin-left: 2px;
        content: "　";
        line-height: 22px;
        color: #555555;
        font-size: 18px; }

    .mui-checkbox.checkbox-green:checked {
        background-color: #04BE02;
    }

    .mui-checkbox.checkbox-s {
        width: 19px;
        height: 19px; }
    .mui-checkbox.checkbox-s:before {
        display: inline-block;
        margin-top: 1px;
        margin-left: 2px;
        content: "　";
        line-height: 17px;
        font-size: 13px; }

    .mui-checkbox-anim {
        transition: background-color ease 0.2s; }

</style>


        <form class="mui-form" name="" method="post" action="#" id="">
            <div class="weui_cell">
                    <label>
                        <input class="mui-checkbox  mui-checkbox-anim checkbox-s checkbox-green " type="checkbox"
                               checked>
                        绿色
                    </label>
                    <label>
                        <input class="mui-checkbox  mui-checkbox-anim checkbox-s checkbox-green " type="checkbox"
                               >
                        绿色
                    </label>
            </div>
            <div class="weui_cell">
                <label>
                    <input class="mui-checkbox  mui-checkbox-anim checkbox-s checkbox-green " type="checkbox"
                           checked>
                    绿色
                </label>
                <label>
                    <input class="mui-checkbox  mui-checkbox-anim checkbox-s checkbox-green " type="checkbox"
                    >
                    绿色
                </label>
            </div>
        </form>

@endsection