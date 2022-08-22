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

// Route::get('/', function () {
//     return view('welcome');
// });

// Modul Backend Auth
Route::get('/', [App\Http\Controllers\Auth::class, 'index']);
Route::post('/loginPost', [App\Http\Controllers\Auth::class, 'loginx']);
Route::get('/logout', [App\Http\Controllers\Auth::class, 'logout']);
// End Modul Backend Auth

// Modul Backend Administrator
Route::get('/admin', [App\Http\Controllers\Administrator::class, 'index']);
Route::post('/dashboard', [App\Http\Controllers\Administrator::class, 'to_dashboard']);
Route::get('/home', [App\Http\Controllers\Administrator::class, 'dashboard']);
// End Modul Backend Administrator

// Modul Backend User
Route::get('/user', [App\Http\Controllers\User::class, 'index']);
Route::get('/add_user', [App\Http\Controllers\User::class, 'tambah_user']);
Route::post('/create_user', [App\Http\Controllers\User::class, 'save_user']);
Route::get('/edit/{id}', [App\Http\Controllers\User::class, 'ubah_user']);
Route::post('/update_user', [App\Http\Controllers\User::class, 'update_user']);
Route::get('/hapus_user/{id}', [App\Http\Controllers\User::class, 'delete_user']);
// End Modul Backend User
