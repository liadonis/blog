<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinksController extends Controller
{
    //index & show 一組
    //create & store 一組
    //edit & update 一組
    //

    //get admin links 全部友情連接列表
    public function index()
    {
        $data = Links::orderby('link_order','asc')->get();

        return view('admin.links.index',compact('data'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $links = Links::find($input['link_id']);
        $links->link_order = $input['link_order'];
        $result = $links->update();

        if ($result){
            $data = [
                'status' => 0,
                'msg' => '排序更新成功!',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '排序更新失敗,請稍後重試!',
            ];
        }
        return $data;

    }

    //get admin/links/{links}  顯示單個分類訊息
    public function show()
    {

    }

    //get admin/links/create  增加連結
    public function create()
    {

        return view('admin/links/add');
    }

    //post admin/links  增加連結提交
    public function store()
    {
        $input = Input::except('_token');

        $rules = [
            'link_name'=>'required',
            'link_url'=>'required',
        ];
        $message = [
            'link_name.required'=>'連結名稱為必填項目!',
            'link_url.required'=>'連結地址為必填項目!',
        ];
        //要驗證的數據,驗證規則,自定義錯誤訊息
        $validator = Validator::make($input,$rules,$message);
       
        if ($validator->passes()){
            $result = Links::create($input);
            if ($result){
                return redirect('admin/links');
            }else{
                return back()->with('errors','新增失敗，請稍後重試!');
            }
        }else{

            return back()->withErrors($validator);
        }
    }

}
