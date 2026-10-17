<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeriadoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/feriados', [FeriadoController::class, 'index'])
    ->name('feriados.index');

Route::post('/feriados', [FeriadoController::class, 'consultar'])
    ->name('feriados.consultar');