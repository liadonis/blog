@extends('layouts.admin')

@section('content')

    <!--麵包層導航 開始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 歡迎使用登錄網站後台，建站的首選工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 導航管理
    </div>
    <!--麵包層導航 結束-->

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
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>導航列表</h3>
            </div>
            <!--快捷導航 開始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/navs/create')}}"><i class="fa fa-plus"></i>新增導航</a>
                    <a href="{{url('admin/navs')}}"><i class="fa fa-recycle"></i>全部導航</a>
                </div>
            </div>
            <!--快捷導航 結束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>導航名稱</th>
                        <th>導航別名</th>
                        <th>導航地址</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $v)

                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,'{{$v->nav_id}}')" value="{{$v->nav_order}}">
                        </td>
                        <td class="tc">{{$v->nav_id}}</td>
                        <td>
                            <a href="#">{{$v->nav_name}}</a>
                        </td>
                        <td>{{$v->nav_alias}}</td>
                        <td>{{$v->nav_url}}</td>
                        <td>
                            <a href="{{url('admin/navs/'.$v->nav_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="delNavs({{$v->nav_id}})">刪除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </form>
    <!--搜索結果頁面 列表 結束-->
    <script>


        /*==================更新排序======================*/
        function changeOrder(obj,nav_id) {

            var nav_order = $(obj).val();

            $.post("{{url('admin/navs/changeorder')}}",{'_token':'{{csrf_token()}}','nav_id':nav_id,'nav_order':nav_order},function (data) {
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

        function delNavs(nav_id) {
            //詢問視窗
            layer.confirm('您確定要刪除這個導航嗎？', {
                btn: ['確定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/navs/')}}/"+nav_id,{'_method':'delete','_token':'{{csrf_token()}}'},function (data) {
                    if (data.status == 0){
                        location.href = location.href; //這一行也可以返回當前頁面
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




