<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Identifica;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/identificar', [Identifica::class, 'index']);
