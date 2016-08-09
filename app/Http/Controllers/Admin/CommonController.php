<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //圖片上傳
    public function upload()
    {
        $file = Input::file('Filedata');
//        dd($file);
        if($file -> isValid()){
//            $realPath = $file -> getRealPath(); //暫存文件的絕對路徑

            $entension = $file -> getClientOriginalExtension(); //獲取文件的副檔名

            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;

            $path = $file -> move(base_path().'/uploads',$newName); //移動文件到指定目錄下，並且重新命名

            $filepath = 'uploads/'.$newName;
            return $filepath;
        }
    }
}
