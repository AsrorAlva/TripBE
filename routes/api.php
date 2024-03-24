<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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


Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('/register', [UserController::class, 'store']);
    Route::get('userProfile', [LoginController::class, 'userProfile']); 
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/refresh', [LoginController::class, 'refresh']);   
});