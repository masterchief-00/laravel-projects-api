<?php

use App\Http\Controllers\API\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['cors'])->group(function () {
    Route::post('/upload-project', [ProjectController::class, 'store']);
    Route::get('/getDetails/monitor',[ProjectController::class,'index']);
    Route::get('/getDetails/projects',[ProjectController::class,'getProjects']);

});

