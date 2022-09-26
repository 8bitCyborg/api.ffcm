<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;

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

//Public Routes; 
Route::post('/login', [AuthController::class, 'login']);
Route::post('/addPost', [PostsController::class, 'store']);
Route::get('/getPosts', [PostsController::class, 'index']);

//Protected Routes;
Route::group(['middleware' => ['auth:sanctum']], function () {
});
