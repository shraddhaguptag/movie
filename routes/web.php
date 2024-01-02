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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movies', [App\Http\Controllers\MoviesController::class, 'index'])->name('movies.index');
Route::get('/movie/{id}', [App\Http\Controllers\MoviesController::class, 'show'])->name('movie.show');

Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/dashboard', function () {
       return view('admin.dashboard');
    });
    Route::get('notifications', [App\Http\Controllers\AdminController::class, 'sendIndex'])->name('real.time.notifications');
    Route::post('send/message', [App\Http\Controllers\AdminController::class, 'sendMessage'])->name('send.web.message');

 
 });
 