<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CareerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/sent', function () {
//     return view('pages.sent');
// });


Route::get('/',[HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/technologies', [HomeController::class, 'technologies']);
Route::get('/company', [HomeController::class, 'company']);
Route::post('/send', [MessageController::class, 'store'])->name('send');
Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Auth::routes();

Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');

Route::get('/{any}', [HomeController::class, 'home'])->where('any', '.*')->middleware('auth');;
