<?php

use App\Http\Controllers\API\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('/upload-project', [ProjectController::class, 'store']);
Route::middleware(['cors'])->group(function () {
    Route::post('/upload-project', [ProjectController::class, 'store']);
});
// Route::post('/upload-project', ['middleware' => 'cors' , 'uses'=> 'MyController@Action']
