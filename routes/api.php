<?php

use App\Http\Controllers\Api\ApiProjectController;
use App\Http\Controllers\Api\ApiProjectTypeController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Group Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/project-types', [ApiProjectTypeController::class, 'index']);
    Route::post('/project-types', [ApiProjectTypeController::class, 'store']);
    Route::get('/project-types/{ProjectType}', [ApiProjectTypeController::class, 'show']);
    Route::patch('/project-types/{ProjectType}', [ApiProjectTypeController::class, 'update']);
    Route::delete('/project-types/{id}', [ApiProjectTypeController::class, 'destroy']); 

    
   //Projects
    Route::post('/projects',[ApiProjectController::class, 'store']);
    

    // log out
    Route::get('/logout', [AuthController::class, 'logout']);
});
// post
Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);
// Route::apiResource('/projects', App\Http\Controllers\Api\ProjectTypeApiController::class);
//  Auth 
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
