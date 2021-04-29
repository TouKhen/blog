<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('multi', fn () => request('name'));

Route::get('user/{id}', fn ($id) => 'User '.$id);

Route::get('posts/{post}/comments/{comment}', fn ($postId, $commentId) =>
    'Post => '.$postId.' <br> Comment => '.$commentId
);


// Error 404 page not found
Route::get('user/{name?}', fn ($name = 'default') => $name);

Route::prefix('admin')->group(function () {
    Route::get('users', fn () => 'user admin');
    Route::get('notif', fn() => 'notif');
});
