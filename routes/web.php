<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('tests/test', 'TestController@index');

// 認証機能
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//追加 //REST
// Route::resource('contacts', 'ContactFormController');

//ｃontact/idnexにたどり着いたら、ログイン機能を動かす
Route::get('contact/index', 'ContactFormController@index');

Route::group(['prefix' =>'contact', 'middleware'=>'auth'], function(){
     Route::get('index', 'ContactFormController@index')->name('contact');
});
