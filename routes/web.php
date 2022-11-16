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

Auth::routes();

Route::resource('tasks', App\Http\Controllers\TaskController::class)->middleware('auth');

// phpinfoを表示する
Route::get('/info', function () {
    return phpinfo();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
