<?php

use App\Http\Controllers\BlogController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::post('new-blog',[BlogController:: class,'blog'])->name('new.blog');
Route::get('all-blog',[BlogController:: class,'allBlog'])->name('all.blog');
Route::get('edit-blog/{id}',[BlogController:: class,'editblog'])->name('edit.blog');
Route::post('/update-blog',[BlogController::class,'updateBlog'])->name('update.blog');
Route::post('delete-blog',[BlogController:: class,'deleteblog'])->name('delete.blog');




