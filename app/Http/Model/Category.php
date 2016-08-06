<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';  //資料表因為之前有預設前綴blog_所以不用加
    protected $primaryKey = 'cate_id';
    public $timestamps = false; //這一行用來取消系統默認的更新刪除時間

    public function tree()
    {
        $categorys = $this->all();
        return $this->getTree($categorys,'cate_name','cate_id','cate_pid');
    }

//    public static function tree()
//    {
//        $categorys = Category::all();
//        return (new Category)->getTree($categorys,'cate_name','cate_id','cate_pid');
//    }
    
    public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0)
    {
//        dd($data);
        $arr = array();
        foreach ($data as $k=>$v){
            if ($v->$field_pid==$pid){
//                echo $v->cate_name;
                $data[$k]['_'.$field_name] = $data[$k][$field_name];
                $arr[] = $data[$k];
                foreach ($data as $m=>$n){
                    if ($n->$field_pid == $v->$field_id){
                        $data[$m]['_'.$field_name] = '├─ '.$data[$m][$field_name];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
//        dd($arr);
        return $arr;
    }
}
