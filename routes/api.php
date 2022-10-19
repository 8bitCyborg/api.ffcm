<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LeadersController;
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
Route::delete('/deletePost/{id}', [PostsController::class, 'destroy']);

Route::post('/leaders/addLeader', [LeadersController::class, 'store']);
Route::get('/leaders/getLeaders', [LeadersController::class, 'index']);
Route::delete('/leaders/delete/{id}', [LeadersController::class, 'destroy']);

//Protected Routes;
Route::group(['middleware' => ['auth:sanctum']], function () {
});
