<?php

use App\Http\Controllers\Contoh\ContohController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\RkpController;
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

Route::group(['prefix' => 'detail'], function () {
    Route::get('index', [DetailController::class, 'index'])->name('detail.index');
    Route::post('insert', [DetailController::class, 'insert'])->name('detail.insert');
    Route::get('getspecdata/{id}', [DetailController::class, 'edit']);
    Route::post('update', [DetailController::class, 'update'])->name('detail.update');
    Route::delete('deletespecdata/{id}', [DetailController::class, 'delete']);
});

Route::group(['prefix' => 'bidang'], function () {
    Route::get('index', [BidangController::class, 'index'])->name('bidang.index');
    Route::post('insert', [BidangController::class, 'insert'])->name('bidang.insert');
    Route::get('getspecdata/{id}', [BidangController::class, 'edit']);
    Route::post('update', [BidangController::class, 'update'])->name('bidang.update');
    Route::delete('deletespecdata/{id}', [BidangController::class, 'delete']);
});

Route::group(['prefix' => 'lokasi'], function () {
    Route::get('index', [LokasiController::class, 'index'])->name('lokasi.index');
    Route::post('insert', [LokasiController::class, 'insert'])->name('lokasi.insert');
    Route::get('getspecdata/{id}', [LokasiController::class, 'edit']);
    Route::post('update', [LokasiController::class, 'update'])->name('lokasi.update');
    Route::delete('deletespecdata/{id}', [LokasiController::class, 'delete']);
});

Route::prefix('rkp')->group(function () {
    Route::get('index', [RkpController::class, 'index'])->name('rkp.index');
    Route::post('insert', [RkpController::class, 'insert'])->name('rkp.insert');
    Route::get('getspecdata/{id}', [RkpController::class, 'edit']);
    Route::post('update', [RkpController::class, 'update'])->name('rkp.update');
    Route::delete('deletespecdata/{id}', [RkpController::class, 'delete']);
});
