<?php

use App\Http\Controllers\Contoh\ContohController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\BidangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Base.TemplateDash');
})->name('dashboard.index');

Route::prefix('contoh')->group(function () {
    Route::get('index', [ContohController::class, 'index'])->name('contoh.index');
    Route::post('insert', [ContohController::class, 'insert'])->name('contoh.insert');
    Route::get('getspecdata/{id}', [ContohController::class, 'edit']);
    Route::post('update', [ContohController::class, 'update'])->name('contoh.update');
    Route::delete('deletespecdata/{id}', [ContohController::class, 'delete']);
});

Route::group(['prefix' => 'detail'], function() {
    Route::get('index', [DetailController::class, 'index'])->name('detail.index');
    Route::post('insert', [DetailController::class, 'insert'])->name('detail.insert');
    Route::get('getspecdata/{id}', [DetailController::class, 'edit']);
    Route::post('update', [DetailController::class, 'update'])->name('detail.update');
    Route::delete('deletespecdata/{id}', [DetailController::class, 'delete']);
});

Route::group(['prefix' => 'bidang'], function() {
    Route::get('index', [BidangController::class, 'index'])->name('bidang.index');
    Route::post('insert', [BidangController::class, 'insert'])->name('bidang.insert');
    Route::get('getspecdata/{id}', [BidangController::class, 'edit']);
    Route::post('update', [BidangController::class, 'update'])->name('bidang.update');
    Route::delete('deletespecdata/{id}', [BidangController::class, 'delete']);
});


