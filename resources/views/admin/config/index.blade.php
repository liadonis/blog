@extends('layouts.admin')

@section('content')

    <!--麵包層配置 開始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 歡迎使用登錄網站後台，建站的首選工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 配置管理
    </div>
    <!--麵包層配置 結束-->

    <!--結果頁快捷搜索框 開始-->
    {{--<div class="search_wrap">--}}
        {{--<form action="" method="post">--}}
            {{--<table class="search_tab">--}}
                {{--<tr>--}}
                    {{--<th width="120">選擇分類:</th>--}}
                    {{--<td>--}}
                        {{--<select onchange="javascript:location.href=this.value;">--}}
                            {{--<option value="">全部</option>--}}
                            {{--<option value="https://tw.yahoo.com/">奇摩</option>--}}
                            {{--<option value="https://www.google.com.tw/">Google</option>--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<th width="70">關鍵字:</th>--}}
                    {{--<td><input type="text" name="keywords" placeholder="關鍵字"></td>--}}
                    {{--<td><input type="submit" name="sub" value="查詢"></td>--}}
                {{--</tr>--}}
            {{--</table>--}}
        {{--</form>--}}
    {{--</div>--}}
    <!--結果頁快捷搜索框 結束-->

    <!--搜索結果頁面 列表 開始-->
        <div class="result_wrap">
            <div class="result_title">
                <h3>配置列表</h3>
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
            <!--快捷配置 開始-->
            <div class="result_content">
                <form action="{{url('admin/config/changecontent')}}" method="post">
                    {{csrf_field()}}
                <div class="short_wrap">
                    <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>新增配置</a>
                    <a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>全部配置</a>
                </div>
            </div>
            <!--快捷配置 結束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>標題</th>
                        <th>名稱</th>
                        <th>內容</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $v)

                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,'{{$v->conf_id}}')" value="{{$v->conf_order}}">
                        </td>
                        <td class="tc">{{$v->conf_id}}</td>
                        <td>{{$v->conf_title}}</td>
                        <td>
                            <a href="#">{{$v->conf_name}}</a>
                        </td>
                        <td>
                            <input type="hidden" name="conf_id[]" value="{{$v->conf_id}}">
                            {!!$v->_html!!}
                        </td>
                        <td>
                            <a href="{{url('admin/config/'.$v->conf_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="delConfig({{$v->conf_id}})">刪除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                    <div class="btn_group">
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回" >
                    </div>
                </form>
            </div>
        </div>
    <!--搜索結果頁面 列表 結束-->
    <script>


        /*==================更新排序======================*/
        function changeOrder(obj,conf_id) {

            var conf_order = $(obj).val();

            $.post("{{url('admin/config/changeorder')}}",{'_token':'{{csrf_token()}}','conf_id':conf_id,'conf_order':conf_order},function (data) {
                if (data.status == 0){
                    layer.msg(data.msg, {icon: 6});
                    window.location.reload();
                }else {
                    layer.msg(data.msg, {icon: 5});
                    window.location.reload();
                }
            })
        }

        /*==================刪除=====================*/

        function delConfig(conf_id) {
            //詢問視窗
            layer.confirm('您確定要刪除這個配置嗎？', {
                btn: ['確定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/config/')}}/"+conf_id,{'_method':'delete','_token':'{{csrf_token()}}'},function (data) {
                    if (data.status == 0){
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 1});
                    }else{
                        layer.msg(data.msg, {icon: 2});
                        window.location.reload();
                    }
                });
            }, function(){

            });
        };

    </script>
@endsection




