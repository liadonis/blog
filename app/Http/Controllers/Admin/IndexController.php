<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IndexController extends CommonController
{
    public function index()
    {
//        $pdo = DB::connection()->getPdo();
//        dd($pdo);
        return view('admin.index');

    }

    public function info()
    {
        return view('admin.info');
    }


    //更改admin管理員密碼
    public function pass()
    {
        //如果Input打錯字 上面的 use Illuminate\Support\Facades\Input; 就不會自動套用
        if ($input = Input::all())
        {
            $rules = [
                'password'=>'required|between:6,20|confirmed',
            ];
            $message = [
                'password.required'=>'新密碼不能為空!',
                'password.between'=>'新密碼必須在6-20位之間!',
                'password.confirmed'=>'新密碼與確認密碼不一致!',
            ];
                                   //要驗證的數據,驗證規則,自定義錯誤訊息
            $validator = Validator::make($input,$rules,$message);
            if ($validator->passes()){
//                echo "PASS OK";
                $user = User::first(); //到數據庫去撈第一筆資料
                $_password = Crypt::decrypt($user->user_pass);
//                echo $_password;
                if($input['password_o']==$_password){
                    $user->user_pass = Crypt::encrypt($input['password']);
                    $user->update();
//                    return redirect('admin/info');
                    return back()->with('errors','密碼修改成功!');
                }else{
                    return back()->with('errors','原密碼錯誤!');
                }
            }else{

                return back()->withErrors($validator);
            }
//            dd($input);
        }
        else
        {
            return view('admin.pass');
        }

    }
    
}
