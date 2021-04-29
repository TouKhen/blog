<?php

use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Front\PostController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

Route::name('home')->get('/', [PostController::class, 'index']);

Route::get('/logout')->name('logout');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'auth'], function () {
    Lfm::routes();
});

Route::prefix('admin')->group(function () {
   Route::middleware('redac')->group(function () {
       Route::name('admin')->get('/', [AdminController::class, 'index']);
   });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
