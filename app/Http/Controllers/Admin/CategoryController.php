<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends CommonController
{
    //get admin/category  全部分類列表
    public function index()
    {
        $categorys = Category::all();
//        dd($categorys);
//        echo 'get admin/category';
        $data = $this->getTree($categorys);

        return view('admin.category.index')->with('data',$data);
    }

    public function getTree($data)
    {
//        dd($data);
        $arr = array();
        foreach ($data as $k=>$v){
            if ($v->cate_pid==0){
//                echo $v->cate_name;
                $data[$k]['_cate_name'] = $data[$k]['cate_name'];
                $arr[] = $data[$k];
                foreach ($data as $m=>$n){
                    if ($n->cate_pid == $v->cate_id){
                        $data[$m]['_cate_name'] = '├─ '.$data[$m]['cate_name'];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
//        dd($arr);
        return $arr;
    }

    //post admin/category
    public function store()
    {

    }

    //get admin/category/create  增加分類

    public function create()
    {

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
