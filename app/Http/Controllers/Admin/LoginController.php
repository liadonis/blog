<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once 'resources\org\code\Code.class.php';

class LoginController extends CommonController
{
    public function login()
    {
        if ($input = Input::all()) {
            $code = new \Code();
            $_code = $code->get();
            if (strtoupper($input['code'])!=$_code){
                return back()->with('msg','驗證碼錯誤!'); /*msg 會存在session中*/
            }
            $user = User::first();
            if ($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass)!=$input['user_pass'])
            {
                return back()->with('msg','使用者帳號或密碼錯誤!');
            }

//            session(['user'=>$user]); //密碼測試
//            dd(session('user'));      //密碼測試


            return redirect('admin.index');
        }else{

//            dd($_SERVER);
            return view('admin.login');
        }

    }

    public function code()
    {
        $code = new \Code();
        $code->make();
    }

    public function crypt()
    {
        //<250
        $str = '123456';

        $str_p ="eyJpdiI6ImJzMjRSN0ZCYmhEc09oU3BGKzQwQlE9PSIsInZhbHVlIjoiVDFYTzI4cHJjMXNMbVFNemdtU0ZmQT09IiwibWFjIjoiNzRhYjZiNjQyODNkY2I1OTczZTE3NWQyZGNjYTg2MzBkNzhlMTQ0NzhmNGVjNmRmNDNlMjc1MjFhZWY5ZjI2NyJ9";

        echo Crypt::encrypt($str);
        echo "<br>";
        echo Crypt::decrypt($str_p);
    }

}
