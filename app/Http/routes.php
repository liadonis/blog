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
    Route::get('/', function () {
        return view('welcome');
    });

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

    Route::post('cate/changeorder','CategoryController@changeOrder');

    Route::resource('category', 'CategoryController');

    Route::resource('article', 'ArticleController');

    Route::resource('links', 'LinksController');

    Route::post('links/changeorder','LinksController@changeOrder');

    Route::resource('navs', 'NavsController');

    Route::post('navs/changeorder','NavsController@changeOrder');

    Route::any('upload','CommonController@upload');

});




