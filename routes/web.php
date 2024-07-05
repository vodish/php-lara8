<?php

use App\Http\Controllers\MyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/my', MyController::class);

Route::middleware('mymw')->prefix('test')->group(function() {
    Route::get('/', function() { return 'simple test'; });
    Route::get('/one',  function() { return 'test one'; });
});


