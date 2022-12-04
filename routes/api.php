<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\PostController ;

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



Route::get('/',function (){
    return['success'=>true,
    'message' => 'Bienvenue sur notre api',
];});

Route::get('/users',[UserController::class ,'index']);
Route::post('/users',[UserController::class,'store']);
Route::get('/users/{user}',[UserController::class,'show']);
Route::put('/users/{user}',[UserController::class,'update']);

Route::get('/posts',[PostController::class,'index']);
Route::post('/posts',[PostController::class,'store']);
Route::post('/posts/{post}',[PostController::class,'update']);
Route::get('/posts/{id}/delete',[PostController::class,'destroy']);
Route::get('{user_id}/posts',[PostController::class,'UserPost']);
