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


    //get admin/linkd/{linkd}/edit  編輯友站連結
    public function edit($link_id)
    {
        $field = Links::find($link_id);
        return view('admin/links/edit',compact('field'));
    }

    //put admin/links/{links}  更新分類
    public function update($link_id)
    {
        $input = Input::except('_token','_method');
        $result = Links::where('link_id',$link_id)->update($input);
        if ($result){
            return redirect('admin/links');
        }else{
            return back()->with('errors','資料更新失敗，或您未更新任何資料，請稍後重試!');
        }
    }

    //delete admin/links/{links}  刪除連接
    public function destroy($link_id)
    {
        $result = Links::where('link_id',$link_id)->delete();
        if($result){
            $data = [
                'status' => 0,
                'msg' => '刪除成功!',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '刪除失敗，請稍後重試!',
            ];
        }
        return $data;
    }

}
