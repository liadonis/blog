<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    //index & show 一組
    //create & store 一組
    //edit & update 一組
    //

    //get admin config 全部自定義配置項列表
    public function index()
    {
        
        $data = Config::orderby('conf_order','asc')->get();

        return view('admin.config.index',compact('data'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $config = Config::find($input['conf_id']);
        $config->conf_order = $input['conf_order'];
        $result = $config->update();

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

    //get admin/config/{config}  顯示單個訊息
    public function show()
    {

    }

    //get admin/config/create  增加配置項
    public function create()
    {

        return view('admin/config/add');
    }

    //post admin/config  增加配置項提交
    public function store()
    {
        $input = Input::except('_token');

        $rules = [
            'conf_title'=>'required',
            'conf_name'=>'required',
            'field_type'=>'required',
        ];
        $message = [
            'conf_title.required'=>'配置項標題為必填項目!',
            'conf_name.required'=>'配置項名稱為必填項目!',
            'field_type.required'=>'配置項類型為必填項目!',
        ];
        //要驗證的數據,驗證規則,自定義錯誤訊息
        $validator = Validator::make($input,$rules,$message);
       
        if ($validator->passes()){
            $result = Config::create($input);
            if ($result){
                return redirect('admin/config');
            }else{
                return back()->with('errors','新增失敗，請稍後重試!');
            }
        }else{

            return back()->withErrors($validator);
        }
    }


    //get admin/config/{config}/edit  編輯配置項
    public function edit($conf_id)
    {
        $field = Config::find($conf_id);
        return view('admin/config/edit',compact('field'));
    }

    //put admin/config/{config}  更新配置項
    public function update($conf_id)
    {
        $input = Input::except('_token','_method');
        $result = Config::where('conf_id',$conf_id)->update($input);
        if ($result){
            return redirect('admin/config');
        }else{
            return back()->with('errors','資料更新失敗，或您未更新任何資料，請稍後重試!');
        }
    }

    //delete admin/config/{config}  刪除配置項
    public function destroy($conf_id)
    {
        $result = Config::where('conf_id',$conf_id)->delete();
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
