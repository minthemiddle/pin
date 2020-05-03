<?php

use Illuminate\Http\Request;
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
    return redirect(route('pin.create'));
})->name('welcome');

Route::get('/pin/create', function () {
    return true;
})->name('pin.create');

Route::post('/pin/store', function () {
    return redirect(route('welcome'));
})->name('pin.store');
