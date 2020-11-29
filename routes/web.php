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

Route::get('/', function (Request $request) {
    if ($request->cookie('pin') === 'okay') {
        return redirect(route('welcome'));
    }

    $request->session()->flash('status', 'rejected');
    return redirect(route('pin.create'));
})->name('welcome');

Route::get('/pin/create', function () {
    return view('create');
})->name('pin.create');

Route::post('/pin/store', function (Request $request) {
    if ($request->pin === config('settings.PIN')) {
        $request->session()->flash('status', 'allowed');
        return redirect(route('welcome'))->cookie('pin', 'pass', 60);
    }

    return redirect(route('pin.create'));
})->name('pin.store');
