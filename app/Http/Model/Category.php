<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';  //資料表因為之前有預設前綴blog_所以不用加
    protected $primaryKey = 'cate_id';
    public $timestamps = false; //這一行用來取消系統默認的更新刪除時間
}
