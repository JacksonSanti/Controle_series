<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/series',[SeriesController::class, 'index']);

Route::get('/series/criar',[SeriesController::class, 'create']);

Route::post('/series/criar',[SeriesController::class, 'store']);

Route::post('/series/remover/{id}',[SeriesController::class, 'destroy']);



