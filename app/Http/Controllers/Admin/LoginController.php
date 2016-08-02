<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
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
                return back()->with('msg','驗證碼錯誤'); /*msg 會存在session中*/
            }
            echo 'OK';
        }else{
            return view('admin.login');
        }

    }

    public function code()
    {
        $code = new \Code();
        $code->make();
    }

}
