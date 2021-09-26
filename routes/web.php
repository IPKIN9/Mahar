<?php

use App\Http\Controllers\Contoh\ContohController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\KadesController;
use App\Http\Controllers\PemutakhiranController;
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

Route::group(['prefix' => 'lokasi'], function() {
    Route::get('index', [LokasiController::class, 'index'])->name('lokasi.index');
    Route::post('insert', [LokasiController::class, 'insert'])->name('lokasi.insert');
    Route::get('getspecdata/{id}', [LokasiController::class, 'edit']);
    Route::post('update', [LokasiController::class, 'update'])->name('lokasi.update');
    Route::delete('deletespecdata/{id}', [LokasiController::class, 'delete']);
});

Route::group(['prefix' => 'kades'], function() {
    Route::get('index', [KadesController::class, 'index'])->name('kades.index');
    Route::post('insert', [KadesController::class, 'insert'])->name('kades.insert');
    Route::get('getspecdata/{id}', [KadesController::class, 'edit']);
    Route::post('update', [KadesController::class, 'update'])->name('kades.update');
    Route::delete('deletespecdata/{id}', [KadesController::class, 'delete']);
});

Route::group(['prefix' => 'pemutakhiran'], function() {
    Route::get('index', [PemutakhiranController::class, 'index'])->name('pemutakhiran.index');
    Route::post('insert', [PemutakhiranController::class, 'insert'])->name('pemutakhiran.insert');
    Route::get('getspecdata/{id}', [PemutakhiranController::class, 'edit']);
    Route::post('update', [PemutakhiranController::class, 'update'])->name('pemutakhiran.update');
    Route::delete('deletespecdata/{id}', [PemutakhiranController::class, 'delete']);
});





