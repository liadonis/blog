<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**/
//Route::group(['middleware' => ['web']], function () {
//    Route::get('/', function () {
//        return view('welcome');
//    });

//=========================Sit Reception 前台================================
    Route::get('/','Home\IndexController@index');

    Route::get('/cate/{cate_id}','Home\IndexController@cate');

    Route::get('/a/{art_id}','Home\IndexController@article');







//======================WebSite Background 後台 =================================
//    Route::any('admin/crypt','Admin\LoginController@crypt');//密碼測試

    Route::any('admin/login','Admin\LoginController@login');
    Route::get('admin/code','Admin\LoginController@code');

//});
//Route::group(['middleware' => ['web','admin.login'], 使用'web中間件無法出現錯誤訊息'
Route::group(['middleware' => ['admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function (){
    Route::get('index','IndexController@index');
    Route::get('info','IndexController@info');
    Route::get('quit','LoginController@quit');
    Route::any('pass','IndexController@pass');

    Route::any('upload','CommonController@upload');

    //category======================================
    Route::resource('category', 'CategoryController');

    Route::post('cate/changeorder','CategoryController@changeOrder');
    //==============================================


    //article=======================================
    Route::resource('article', 'ArticleController');
    //==============================================

    //links=========================================
    Route::resource('links', 'LinksController');

    Route::post('links/changeorder','LinksController@changeOrder');
    //==============================================

    //navs==========================================
    Route::resource('navs', 'NavsController');

    Route::post('navs/changeorder','NavsController@changeOrder');
    //==============================================

    //config========================================
    Route::resource('config', 'ConfigController');

    Route::get('config/putfile', 'ConfigController@putFile');

    Route::post('config/changecontent','ConfigController@changeContent');

    Route::post('config/changeorder','ConfigController@changeOrder');
    //==============================================

});




