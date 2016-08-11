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
//        $data = (new Category)->tree();
//        return view('admin.article.add',compact('data'));
        $data = Article::orderby('art_id','desc')->paginate(5);;
//        dd($data->links());
        return view('admin.article.index',compact('data'));
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

    //get admin/article/{article}/edit  編輯文章
    public function edit($art_id)
    {
//        echo $art_id;
        $data = (new Category)->tree();
        $field = Article::find($art_id);
//        dd($field);
        return view('admin.article.edit',compact('data','field'));
    }

    //put admin/article/{article}  更新文章
    public function update($art_id)
    {
        $input = Input::except('_token','_method');
//        dd($input);
        $result = Article::where('art_id',$art_id)->update($input);
//        dd($result);
        if ($result){
            return redirect('admin/article');
        }else{
            return back()->with('errors','資料更新失敗，或您未更新任何資料，請稍後重試!');
        }
    }

}
