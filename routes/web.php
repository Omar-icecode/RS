<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketerController;

Route::get('/',[MarketerController::class, 'dashboard']);

Route::post('/add_marketer',[MarketerController::class, 'store']);

Route::get('/client', [MarketerController::class, 'client'])->name('searchMarketer');

Route::get('/livesearch', [MarketerController::class, 'livesearch'])->name('livesearch');

Route::post('/add_client', [MarketerController::class, 'store_client']);

Route::put('/pay/{marketer}', [MarketerController::class, 'pay_marketer']);

Route::get('/marketer/{marketer}',[MarketerController::class, 'show']);
