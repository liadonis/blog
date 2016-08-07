@extends('layouts.admin')

@section('content')
    <!--麵包層導航 開始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 歡迎使用登錄網站後台，建站的首選工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 編輯文章分類
    </div>
    <!--麵包層導航 結束-->

	<!--結果及標題與導航組件 開始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>分類管理</h3>
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
                <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>新增分類</a>
                <a href="{{url('admin/category')}}"><i class="fa fa-recycle"></i>全部分類</a>
            </div>
        </div>
    </div>
    <!--結果及標題與導航組件 結束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/category/'.$field->cate_id)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>父級分類：</th>
                        <td>
                            <select name="cate_pid">
                                <option value="0">==頂級分類==</option>
                                @foreach($data as $d)
                                    <option value="{{$d->cate_id}}"
                                        @if($d->cate_id == $field->cate_pid)
                                            selected
                                        @endif
                                    >{{$d->cate_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分類名稱：</th>
                        <td>
                            <input type="text" name="cate_name" value="{{$field->cate_name}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>分類名稱為必填項目</span>
                        </td>
                    </tr>
                    <tr>
                        <th>分類標題：</th>
                        <td>
                            <input type="text" class="lg" name="cate_title" value="{{$field->cate_title}}">
                        </td>
                    </tr>
                    <tr>
                        <th>關鍵詞：</th>
                        <td>
                            <textarea name="cate_keywords" >{{$field->cate_keywords}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="cate_description" >{{$field->cate_description}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>排序：</th>
                        <td>
                            <input type="text" class="sm" name="cate_order" value="{{$field->cate_order}}">
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