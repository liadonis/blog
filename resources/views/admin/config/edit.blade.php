@extends('layouts.admin')

@section('content')
    <!--麵包層配置 開始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 歡迎使用登錄網站後台，建站的首選工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 配置管理
    </div>
    <!--麵包層配置 結束-->

	<!--結果及標題與配置組件 開始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>編輯配置</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>新增配置</a>
                <a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>全部配置</a>
            </div>
        </div>
    </div>
    <!--結果及標題與配置組件 結束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/config/'.$field->conf_id)}}" method="post">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>配置名稱：</th>
                        <td>
                            <input type="text" name="conf_name" value="{{$field->conf_name}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>配置名稱為必填項目</span>
                        </td>
                    </tr>
                    <tr>
                        <th>配置別名：</th>
                        <td>
                            <input type="text" class="sm" name="conf_alias" value="{{$field->conf_alias}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>配置地址：</th>
                        <td>
                            <input type="text" class="lg" name="conf_url" value="{{$field->conf_url}}">
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" class="sm" name="conf_order" value="{{$field->conf_order}}">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection