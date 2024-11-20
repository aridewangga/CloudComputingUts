<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!

*/

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login_proses'])->name('login-proses');
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register',[LoginController::class,'register_proses'])->name('register-proses');



Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'], function(){
    Route::get('/dashboard',[Homecontroller::class,'dashboard'])->name('dashboard');

    Route::get('/user',[Homecontroller::class,'index'])->name('user.index');
    Route::get('/create',[Homecontroller::class,'create'])->name('user.create');
    Route::post('/mahasiswa',[Homecontroller::class,'mahasiswa'])->name('user.mahasiswa');

    Route::get('/edit/{id}',[Homecontroller::class,'edit'])->name('user.edit');
    Route::put('/update/{id}',[Homecontroller::class,'update'])->name('user.update');
    Route::delete('/delete/{id}',[Homecontroller::class,'delete'])->name('user.delete');
});
