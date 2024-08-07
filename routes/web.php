<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
| profundidad de pozo: 6mts
| x día: 3 metros - 1 metro por noche = 2 mts
*/

Route::get('/', function () {
    return view('welcome');
});
