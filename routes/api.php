<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;
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

Route::group([
    'middleware' => 'auth:api'
], function () {

    // Services routes
    Route::post('add/service', [ServiceController::class, 'store']);
    Route::post('update/service/{id}', [ServiceController::class, 'update']);
    Route::get('get/services', [ServiceController::class, 'index']);
    Route::delete('delete/service/{id}', [ServiceController::class, 'destroy']);

    // Tecnology routes
    Route::post('add/technology', [TechnologyController::class, 'store']);
    Route::post('update/technology/{id}', [TechnologyController::class, 'update']);
    Route::get('get/technologies', [TechnologyController::class, 'index']);
    Route::delete('delete/technology/{id}', [TechnologyController::class, 'destroy']);

    // Testimony routes
    Route::post('add/testimony', [TestimonyController::class, 'store']);
    Route::post('update/testimony/{id}', [TestimonyController::class, 'update']);
    Route::get('get/testimonies', [TestimonyController::class, 'index']);
    Route::delete('delete/testimony/{id}', [TestimonyController::class, 'destroy']);

    // Messages
    Route::get('get/messages', [MessageController::class, 'index']);
    Route::delete('delete/message/{id}', [MessageController::class, 'destroy']);

    //  Messages
    Route::get('get/users', [HomeController::class, 'users']);
    Route::delete('delete/user/{id}', [HomeController::class, 'destroyUser']);
    Route::post('update/user/{id}', [HomeController::class, 'updateUser']);
});
