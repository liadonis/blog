<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    //get admin/article  全部文章列表
    public function index()
    {
        $data = (new Category)->tree();
        return view('admin.article.add',compact('data'));
    }

    //get admin/article/create  增加文章
    public function create()
    {
        $data = (new Category)->tree();
        return view('admin.article.add',compact('data'));
    }

    //post admin/article  增加文章提交
    public function store()
    {
        $input = Input::except('_token');
        $input['art_time'] = time();

        $rules = [
            'art_title'=>'required',
            'art_content'=>'required'
        ];
        $message = [
            'art_title.required'=>'文章名稱為必填項目!',
            'art_content.required'=>'文章內容為必填項目!'
        ];
        //要驗證的數據,驗證規則,自定義錯誤訊息
        $validator = Validator::make($input,$rules,$message);

        if ($validator->passes()){
            $result = Article::create($input);

            if ($result){
                return redirect('admin/article');
            }else{
                return back()->with('errors','新增失敗，請稍後重試!');
            }
        }else{

            return back()->withErrors($validator);
        }


    }
}
