<?php

use Illuminate\Support\Facades\Route;

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
Route::get('employee/createItem', 'EmpController@createItem');
Route::resource('forms','FormController');
Route::resource('employee','EmpController');
Route::resource('contact','contactController');
Route::resource('home','inicioController');
Route::resource('/review','ReviewController');
Route::resource('sobre','SobreController');
Route::resource('menu','MenuController');
Route::resource('order','OrderController');
Route::resource('popular','PopularController');

Route::resource('userlogin','UserloginController');

Route::resource('register','RegistrationController');

//Route::get('employee/createcontent','EmpController@createcontent');

Route::resource('content','ContentController');

Route::post('custom-register','CustomAuthController@register')->name('custom.register');
Route::post('custom-login','CustomAuthController@login')->name('custom.login');


Route::resource('customer','CustomerController');

Route::get('/logout','CustomAuthController@logout');