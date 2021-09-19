<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodolistController;

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
    return view('login');
});

Route::get('login',[AuthController::Class,'index'])->name('login');
Route::post('process_login',[AuthController::Class,'process_login'])->name('process_login');
Route::get('logout',[AuthController::Class,'logout'])->name('logout');
Route::get('registration',[AuthController::Class,'registration'])->name('registration');
Route::post('process_reg',[AuthController::Class,'process_reg'])->name('process_reg');
Route::get('reset_password',[AuthController::Class,'reset_password'])->name('reset_password');
Route::post('password_update',[AuthController::Class,'password_update'])->name('password_update');

//auth
//auth->admin || user

Route::group(['middleware'=>['auth']],function(){
    Route::group(['middleware'=>['check_login:admin']],function(){
        Route::get('admin',[AdminController::Class,'index'])->name('admin');
         Route::get('inactive/user/{id}',[AdminController::Class,'inactive']);
         Route::get('active/user/{id}',[AdminController::Class,'active']);
         Route::get('delete/user/{id}',[AdminController::Class,'delete']);


    });
    Route::group(['middleware'=>['check_login:User']],function(){
         Route::get('user',[TodolistController::Class,'show'])->name('tasks');
         Route::post('store',[TodolistController::Class,'store'])->name('store');
         Route::get('private/task/{id}',[TodolistController::Class,'inactive']);
         Route::get('public/task/{id}',[TodolistController::Class,'active']);
         Route::get('delete/task/{taskById}',[TodolistController::Class,'delete']);
         
        
    });
});