<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogCategoriesController;
use App\Http\Controllers\BlogController;

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

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/admin/blog/blog-categories', BlogCategoriesController::class)->middleware('auth');

Route::resource('/admin/blog', BlogController::class)->middleware(['auth']);

Route::post('images', 'ImageController@store')->name('images.store')->middleware(['auth']);



require __DIR__.'/auth.php'; 
