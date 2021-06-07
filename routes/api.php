<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MoviesController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('jwt')->get('/movies',[MoviesController::class,'index']);

Route::post('/movies',[MoviesController::class,'store']);

Route::post('/login',[LoginController::class,'authenticate']);

Route::post('/register',[LoginController::class,'register']);
