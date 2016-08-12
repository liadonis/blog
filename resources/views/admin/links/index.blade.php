@extends('layouts.admin')

@section('content')

    <!--麵包層導航 開始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 歡迎使用登錄網站後台，建站的首選工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 友站連結管理
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
                <h3>友站連結列表</h3>
            </div>
            <!--快捷導航 開始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>新增分類</a>
                    <a href="{{url('admin/category')}}"><i class="fa fa-recycle"></i>全部分類</a>
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
                        <th>連結名稱</th>
                        <th>連結標題</th>
                        <th>連結地址</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $v)

                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,'{{$v->link_id}}')" value="{{$v->link_order}}">
                        </td>
                        <td class="tc">{{$v->link_id}}</td>
                        <td>
                            <a href="#">{{$v->link_name}}</a>
                        </td>
                        <td>{{$v->link_title}}</td>
                        <td>{{$v->link_url}}</td>
                        <td>
                            <a href="{{url('admin/links/'.$v->link_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="delCate({{$v->link_id}})">刪除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </form>
    <!--搜索結果頁面 列表 結束-->
    <script>
//        $(function () {
////            alert('');
//            
//        })
        function changeOrder(obj,link_id) {
//            alert('');
            //       自定義url
            var link_order = $(obj).val();

            $.post("{{url('admin/links/changeorder')}}",{'_token':'{{csrf_token()}}','link_id':link_id,'link_order':link_order},function (data) {
                if (data.status == 0){
                    layer.msg(data.msg, {icon: 6});
                    window.location.reload();
                }else {
                    layer.msg(data.msg, {icon: 5});
                    window.location.reload();
                }
            })
        }

        //刪除分類

        function delCate(cate_id) {
            //詢問視窗
            layer.confirm('您確定要刪除這個分類嗎？', {
                btn: ['確定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/category/')}}/"+cate_id,{'_method':'delete','_token':'{{csrf_token()}}'},function (data) {
                    if (data.status == 0){
                        location.href = location.href; //這一行也可以返回當前頁面
                        layer.msg(data.msg, {icon: 1});
//                        window.location.reload();
                    }else{
                        layer.msg(data.msg, {icon: 2});
                        window.location.reload();
                    }
                });
//                alert(cate_id);

            }, function(){

            });
        };

    </script>
@endsection




