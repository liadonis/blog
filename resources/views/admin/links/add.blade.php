@extends('layouts.admin')

@section('content')
    <!--麵包層導航 開始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 歡迎使用登錄網站後台，建站的首選工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 友站連結管理
    </div>
    <!--麵包層導航 結束-->

	<!--結果及標題與導航組件 開始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>新增友站連結</h3>
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
                <a href="{{url('admin/links/create')}}"><i class="fa fa-plus"></i>新增連結</a>
                <a href="{{url('admin/links')}}"><i class="fa fa-recycle"></i>全部連結</a>
            </div>
        </div>
    </div>
    <!--結果及標題與導航組件 結束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/links')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>連結名稱：</th>
                        <td>
                            <input type="text" name="link_name">
                            <span><i class="fa fa-exclamation-circle yellow"></i>連結名稱為必填項目</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>連結地址：</th>
                        <td>
                            <input type="text" class="lg" name="link_url">
                        </td>
                    </tr>
                    <tr>
                        <th>連結標題：</th>
                        <td>
                            <input type="text" class="lg" name="link_title" value="http://">
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" class="sm" name="link_order" value="0">
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