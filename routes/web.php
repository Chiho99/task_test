<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\TestController;
use App\Models\ContactForm;
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
// Route::get('contact/index', 'ContactFormController@index');
Route::get('shops/index', 'ShopController@index');

Route::group(['prefix' =>'contacts', 'middleware'=>'auth'], function(){
    Route::get('/contacts', 'ContactFormController@index')->name('contacts.index');
    Route::get('contacts/create', 'ContactFormController@create')->name('contacts.create');
    Route::post('/contacts', 'ContactFormController@store')->name('contacts.store');
    Route::get('contacts/{id}', 'ContactFormController@show')->name('contacts.show');
    Route::get('/contacts/{id}/edit', 'ContactFormController@edit')->name('contacts.edit');
    Route::post('/contacts/{id}', 'ContactFormController@update')->name('contacts.update');
    Route::post('/contacts/{id}', 'ContactFormController@destroy')->name('contacts.destroy');
});
// Route::resource('contacts', 'ContactFormController');

