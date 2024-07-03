<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Identifica;
use App\Http\Controllers\DocumentoController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/identificar', [Identifica::class, 'index']);

Route::resource('Documento', DocumentoController::class);
