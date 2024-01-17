<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\StokBarangController;
use App\Http\Livewire\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class);

Route::get('login',Login::class);
Route::controller(LoginController::class)->group(function(){
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});


Route::middleware(['auth'])->group(function(){
    Route::view('dashboard','page.dashboard')->name('dashboard');
    Route::resources(
        [
            'karyawan' => KaryawanController::class,
            'permintaan' => PermintaanController::class,
        ]);
    Route::controller(StokBarangController::class)->group(function(){
        Route::prefix('stokbarang')->group(function(){
            Route::get('/','index');
            Route::get('/create','create');
            Route::post('/','store');
            Route::get('/{stok_barang}/edit','edit');
            Route::put('/{stok_barang}','update');
            Route::delete('/{stok_barang}','destroy');
        });
    });
    Route::controller(PermintaanController::class)->group(function(){
        Route::prefix('permintaan')->group(function(){
            Route::get('respon/{permintaan_id}','respon')->name('respon permintaan');  
            Route::get('tolak/{permintaan_id}','tolak')->name('tolak permintaan');
            Route::post('respon','kirimBarang')->name('kirim barang');
        });
    });
});

    // Route::controller(PermintaanController::class)->group(function(){
    //     Route::prefix('permintaan')->group(function(){
    //         Route::get('/','index');
    //         Route::get('/create','create');
    //         Route::post('/','store');
    //         Route::get('/{stok_barang}/edit','edit');
    //         Route::put('/{stok_barang}','update'); 
    //         Route::delete('/{stok_barang}','destroy');
    //     }); 
    // });