<?php

use App\Http\Controllers\PdsController;

Route::get('/', [PdsController::class, 'index']);
Route::post('/pds/store', [PdsController::class, 'store'])->name('pds.store');
