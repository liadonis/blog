<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CategoryController extends CommonController
{
    //get admin/category  全部分類列表
    public function index()
    {

        //        dd($categorys);
        //        echo 'get admin/category';

//        $categorys = Category::tree();
        $categorys = (new Category)->tree();
//        dd($categorys);
//        $data = $this->getTree($categorys,'cate_name','cate_id','cate_pid');

        return view('admin.category.index')->with('data',$categorys);
    }

    public function changeOrder()
    {
//       $input = Input::all();
//        dd($input);
//        echo $input['cate_order'];
//        echo $input['cate_id'];
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $result = $cate->update();

        if ($result){
            $data = [
                'status' => 0,
                'msg' => '分類排序更新成功!',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '分類排序更新失敗,請稍後重試!',
            ];
        }
        return $data;

    }

    //get admin/category/create  增加分類

    public function create()
    {
        $data = Category::where('cate_pid',0)->get();
        return view('admin/category/add',compact('data'));
    }

    //post admin/category  增加分類提交
    public function store()
    {
        $input = Input::except('_token');
//        dd($input);

        $rules = [
            'cate_name'=>'required',
        ];
        $message = [
            'cate_name.required'=>'分類名稱為必填項目!',
        ];
        //要驗證的數據,驗證規則,自定義錯誤訊息
        $validator = Validator::make($input,$rules,$message);

        if ($validator->passes()){
            $result = Category::create($input);
//            dd($result);
            if ($result){
                return redirect('admin/category');
            }else{
                return back()->with('errors','新增文章分類失敗，請稍後重試!');
            }
        }else{

            return back()->withErrors($validator);
        }
    }

    //get admin/category/{category}  顯示單個分類訊息
    public function show()
    {

    }

    //put admin/category/{category}  更新分類
    public function update()
    {

    }

    //delete admin/category/{category}  刪除單個分類
    public function destroy()
    {

    }
    
    //get admin/category/{category}/edit  編輯分類
    public function edit()
    {
        
    }


}
