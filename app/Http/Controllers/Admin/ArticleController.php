<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends CommonController
{
    //get admin/article  全部文章列表
    public function index()
    {
        echo "article index";
    }

    //get admin/article/create  增加文章
    public function create()
    {
        $data = [];
        return view('admin.article.add',compact('data'));
    }

}
