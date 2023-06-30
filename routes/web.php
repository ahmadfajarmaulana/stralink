<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;

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


Route::post('/update/{id}', [ArtistController::class, 'update'])->name('update');
Route::get('/', [ArtistController::class, 'index']);
Route::get('/read', [ArtistController::class, 'read']);
Route::get('/create', [ArtistController::class, 'create']);
Route::post('/store', [ArtistController::class, 'store']);
Route::get('/show/{id}', [ArtistController::class, 'show']);