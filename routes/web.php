<?php

use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/technologies', [HomeController::class, 'technologies']);
Route::get('/company', [HomeController::class, 'company']);
// Route::get('/contact', [HomeController::class, 'contact']);
Auth::routes();

Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');

Route::get('/{any}', [HomeController::class, 'home'])->where('any', '.*');
