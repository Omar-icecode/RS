<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserAccess;
use App\Http\Controllers\MarketerController;

Route::get('/',[MarketerController::class, 'dashboard'])->middleware('auth');

Route::post('/add_marketer',[MarketerController::class, 'store'])->middleware('auth');

Route::post('/add_client', [MarketerController::class, 'store_client'])->middleware('auth');

Route::get('/clients', [MarketerController::class, 'clients'])->middleware('auth');

Route::get('/client', [MarketerController::class, 'client'])->middleware('auth')->name('searchMarketer');

Route::get('/livesearch', [MarketerController::class, 'livesearch'])->middleware('auth')->name('livesearch');

Route::put('/pay/{marketer}', [MarketerController::class, 'pay_marketer'])->middleware('auth');

Route::put('/client_service', [MarketerController::class, 'client_service'])->middleware('auth');

Route::get('/marketer/{marketer}',[MarketerController::class, 'show'])->middleware('auth');

Route::get('/accounts', [UserController::class, 'accounts'])->middleware('auth')->middleware(CheckUserAccess::class);

Route::post('/users',[UserController::class, 'store_users'])->middleware('auth');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

