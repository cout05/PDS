<?php

use App\Http\Controllers\PdsController;

use App\Http\Controllers\AdminController;

Route::get('/', [PdsController::class, 'index']);
Route::post('/pds/store', [PdsController::class, 'store'])->name('pds.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::delete('/batch-delete', [AdminController::class, 'batchDelete'])->name('batch-delete');
    Route::get('/{id}', [AdminController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AdminController::class, 'update'])->name('update');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy');
});
