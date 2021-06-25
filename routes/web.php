<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\FilesController;



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
//Route::post('/files',[FilesController::class ,'index'])->name('user.files.index');
Route::post('/upload',[FilesController::class ,'store'])->name('user.files.store');

