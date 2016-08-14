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
            <h3>新增配置</h3>
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
        <form action="{{url('admin/config')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>標題：</th>
                        <td>
                            <input type="text" name="conf_title">
                            <span><i class="fa fa-exclamation-circle yellow"></i>配置名稱為必填項目</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>名稱：</th>
                        <td>
                            <input type="text" name="conf_name">
                            <span><i class="fa fa-exclamation-circle yellow"></i>配置名稱為必填項目</span>
                        </td>
                    </tr>
                    <tr>
                        <th>類型：</th>
                        <td>
                            <input type="radio" name="field_type" value="input" onclick="showField_value()" checked>input &nbsp;&nbsp;
                            <input type="radio" name="field_type" value="textarea" onclick="showField_value()">textarea &nbsp;&nbsp;
                            <input type="radio" name="field_type" value="radio" onclick="showField_value()">radio
                            <span><i class="fa fa-exclamation-circle yellow"></i>配置類型為必填項目</span>

                        </td>
                    </tr>
                    <tr class="field_value">
                        <th>類型值：</th>
                        <td>
                            <input type="text" class="lg" name="field_value" >
                            <p><i class="fa fa-exclamation-circle yellow"></i>類型值只有在類型選擇為radio的情況下才需要配置，格式：1|開啟,0|關閉</p>

                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" class="sm" name="conf_order" value="0">
                        </td>
                    </tr>
                    <tr>
                        <th>說明：</th>
                        <td>
                            <textarea  id="" cols="30" rows="10" name="conf_remark"></textarea>
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
    <script>

        showField_value();

        // 上面那行就可以達到初始化的作用
        //        let startState = $("input[name=field_type]:checked").val();
        //            if(startState == 'input')$('.field_value').hide();

        function showField_value() {

            let type = $("input[name=field_type]:checked").val();

            if(type == 'radio'){
                $('.field_value').show();
                $('.field_value,input[name=field_value]').val('1|開啟,0|關閉');
            }else{
                $('.field_value').hide();
                $('.field_value,input[name=field_value]').val();
            }

        }
    </script>
@endsection