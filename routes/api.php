<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/post/list', [PostController::class,'index']);

Route::get('/post/list/{id}', [PostController::class,'show']);

Route::post('/post/create', [PostController::class,'create']);

Route::put('/post/update/{id}', [PostController::class,'update']);

Route::delete('/post/delete/{id}', [PostController::class,'delete']);
