@extends('layouts.admin')

@section('content')

    <!--麵包層導航 開始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 歡迎使用登錄網站後台，建站的首選工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 全部分類
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
            <!--快捷導航 開始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量刪除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
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
                        <th>分類名稱</th>
                        <th>標題</th>
                        <th>查看次數</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $v)

                    <tr>
                        <td class="tc">
                            <input type="text" name="ord[]" value="{{$v->cate_order}}">
                        </td>
                        <td class="tc">{{$v->cate_id}}</td>
                        <td>
                            <a href="#">{{$v->cate_name}}</a>
                        </td>
                        <td>{{$v->cate_title}}</td>
                        <td>{{$v->cate_view}}</td>
                        <td>
                            <a href="#">修改</a>
                            <a href="#">刪除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>


                <div class="page_nav">
                    <div>
                        <a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一頁</a>
                        <a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一頁</a>
                        <a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>
                        <a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>
                        <span class="current">8</span>
                        <a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>
                        <a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a>
                        <a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一頁</a>
                        <a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最後一頁</a>
                        <span class="rows">11 條紀錄</span>
                    </div>
                </div>



                <div class="page_list">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
    <!--搜索結果頁面 列表 結束-->

@endsection




