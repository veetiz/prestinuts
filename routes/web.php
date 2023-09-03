<?php

use App\Http\Controllers\ProdottiController;
use App\Http\Controllers\UtenteController;
use Illuminate\Support\Facades\Auth;
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
*/


//Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('utente')
    ->middleware('auth')
    ->group(function(){
        Route::get('acquista', [UtenteController::class, 'acquistaProdotto'])->name('acquista-prodotto');
    });

Route::prefix('prodotto')
    ->group(function(){
        Route::get('cerca', [ProdottiController::class, 'cercaProdotto'])->name('cerca-prodotto');
        Route::get('visualizza/{ID}', [ProdottiController::class, 'visualizzaProdotto'])->name('visualizza-prodotto')->middleware('auth');

        Route::get('vendi', [ProdottiController::class, 'vendiProdotto'])->name('vendi-prodotto')->middleware('auth');
        Route::post('carica', [ProdottiController::class, 'caricaProdotto'])->name('carica-prodotto')->middleware('auth');
    });
