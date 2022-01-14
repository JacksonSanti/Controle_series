<?php

use App\Http\Controllers\EntrarController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
use App\Http\Controllers\EpisodiosController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/',[SeriesController::class, 'index']);

Route::get('/series',[SeriesController::class, 'index'])
->name('listar_series');

Route::get('/series/criar',[SeriesController::class, 'create'])
->middleware('autenticador');

Route::post('/series/criar',[SeriesController::class, 'store'])
->middleware('autenticador');

Route::delete('/series/remover/{id}',[SeriesController::class, 'destroy'])
->middleware('autenticador');

Route::post('/series/{id}/editaNome',[SeriesController::class, 'editaNome'])
->middleware('autenticador');

Route::get('/series/{SerieId}/temporadas',[TemporadasController::class, 'index']);

Route::get('/temporadas/{temporada}/episodios',[EpisodiosController::class, 'index']);

Route::get('/temporadas/{temporada}/episodios/assistir',[EpisodiosController::class, 'assistir'])
->middleware('autenticador');

Route::get('/entrar', [EntrarController::class,'index'])->name('entrar_login');
Route::post('/entrar', [EntrarController::class,'entrar']);

Route::get('/registrar', [RegistroController::class,'create']);
Route::post('/registrar', [RegistroController::class,'store']);

Route::get('/sair', function ()
{
    Auth::logout();
    return redirect('/');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
