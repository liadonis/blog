<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends Controller
{
    //index & show 一組
    //create & store 一組
    //edit & update 一組
    //

    //get admin navs 全部自定義導航列表
    public function index()
    {
        $data = Navs::orderby('nav_order','asc')->get();

        return view('admin.navs.index',compact('data'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $navs = Navs::find($input['nav_id']);
        $navs->nav_order = $input['nav_order'];
        $result = $navs->update();

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

    //get admin/navs/{navs}  顯示單個訊息
    public function show()
    {

    }

    //get admin/navs/create  增加導航
    public function create()
    {

        return view('admin/navs/add');
    }

    //post admin/navs  增加導航提交
    public function store()
    {
        $input = Input::except('_token');

        $rules = [
            'nav_name'=>'required',
            'nav_url'=>'required',
        ];
        $message = [
            'nav_name.required'=>'導航名稱為必填項目!',
            'nav_url.required'=>'導航地址為必填項目!',
        ];
        //要驗證的數據,驗證規則,自定義錯誤訊息
        $validator = Validator::make($input,$rules,$message);
       
        if ($validator->passes()){
            $result = Navs::create($input);
            if ($result){
                return redirect('admin/navs');
            }else{
                return back()->with('errors','新增失敗，請稍後重試!');
            }
        }else{

            return back()->withErrors($validator);
        }
    }


    //get admin/navd/{navd}/edit  編輯導航
    public function edit($nav_id)
    {
        $field = Navs::find($nav_id);
        return view('admin/navs/edit',compact('field'));
    }

    //put admin/navs/{navs}  更新導航
    public function update($nav_id)
    {
        $input = Input::except('_token','_method');
        $result = Navs::where('nav_id',$nav_id)->update($input);
        if ($result){
            return redirect('admin/navs');
        }else{
            return back()->with('errors','資料更新失敗，或您未更新任何資料，請稍後重試!');
        }
    }

    //delete admin/navs/{navs}  刪除導航
    public function destroy($nav_id)
    {
        $result = Navs::where('nav_id',$nav_id)->delete();
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
