<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\StokBarangController;
use App\Http\Livewire\Login;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Route;

// Guest
Route::get('/', Login::class);
Route::get('login',Login::class);
Route::controller(LoginController::class)->group(function(){
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function(){

    Route::get('dashboard',function(){
        return view('page.dashboard');
    })->name('dashboard');

    
    Route::get('/karyawan/biodata', function(){
        return view('page.karyawan.show', ['karyawan' => Karyawan::find(auth()->user()->id)]);
    })->name('biodata');

    // kru
    Route::middleware('cekRole:KRU')->group(function(){
        Route::get('/dashboard/kru', function(){
            return view('page.dashboard_kru', ['karyawan' => Karyawan::find(auth()->user()->id)]);
        })->name('dashboard kru');

        Route::get('/permintaan/kru',function(){
            return view('page.permintaan.kru');
        });

        Route::get('/permintaan/kru',[PermintaanController::class, 'indexKru']);
        Route::put('/permintaan/kru/{id}',[PermintaanController::class, 'updateKru']);
    });
    

    // --admin area--
    Route::middleware("cekRole:SS")->group(function(){

        Route::get('/dashboard/admin', function(){
            return view('page.dashboard_admin', ['karyawan' => Karyawan::find(auth()->user()->id)]);
        })->name('dashboard admin');

        // karyawan
        Route::get('/karyawan/admin',[KaryawanController::class, 'indexAdmin']);
        Route::get('/karyawan/admin/create',[KaryawanController::class, 'create']);
        Route::post('/karyawan/admin',[KaryawanController::class, 'store']);
        Route::get('/karyawan/admin/{karyawan}',[KaryawanController::class, 'show']);
        Route::get('/karyawan/admin/{karyawan}/edit',[KaryawanController::class, 'edit']);
        Route::put('/karyawan/admin/{karyawan}',[KaryawanController::class, 'update']);
        Route::delete('/karyawan/admin/{karyawan}',[KaryawanController::class,'destroy']);
        
        // permintaan
        Route::get('/permintaan/admin',[PermintaanController::class, 'indexAdmin'])->name('permintaan admin');
        Route::get('/permintaan/create',[PermintaanController::class, 'create']);
        Route::get('/permintaan/kru/create',[PermintaanController::class, 'createKru']);
        Route::post('/permintaan',[PermintaanController::class, 'store']);
        Route::post('permintaan/terima',[PermintaanController::class,'terima'])->name('terima permintaan');
        Route::post('permintaan/kru', [PermintaanController::class, 'store_kru'])->name('pemberian apd kru');
        // stok barang
        Route::get('/stokbarang/admin', [StokBarangController::class, 'indexAdmin'])->name('stok admin');

        // Riwayat Apd
        Route::get('/riwayat/admin/apd', function(){
            return view('');
        });
    });
    // --end admin area--

    // asisten
    Route::middleware("cekRole:AS")->group(function(){
        Route::get('/permintaan/asisten',[PermintaanController::class, 'indexAsisten'])->name('permintaan asisten');
        Route::patch('/permintaan/{id}',[PermintaanController::class, 'updateAsisten'])->name('update permintaan asisten');
    });

    // super admin
    Route::middleware("cekRole:SA")->group(function(){
        
        // karyawan
        Route::get('/karyawan',[KaryawanController::class, 'index']);
        Route::get('/karyawan/create',[KaryawanController::class, 'create']);
        Route::post('/karyawan',[KaryawanController::class, 'store']);
        Route::get('/karyawan/{karyawan}',[KaryawanController::class, 'show']);
        Route::get('/karyawan/{karyawan}/edit',[KaryawanController::class, 'edit']);
        Route::put('/karyawan/{karyawan}',[KaryawanController::class, 'update']);
        Route::delete('/karyawan/{karyawan}',[KaryawanController::class,'destroy']);

       

        // stok barang kontroller
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
        // permintaan
        Route::get('/permintaan',[PermintaanController::class, 'index']);
        Route::get('/permintaan/{permintaan}',[PermintaanController::class, 'show']);
        
        Route::controller(PermintaanController::class)->group(function(){
            Route::prefix('permintaan')->group(function(){
                Route::get('respon/{permintaan_id}','respon')->name('respon permintaan');  
                Route::get('tolak/{permintaan_id}','tolak')->name('tolak permintaan');
                
                Route::post('respon','kirimBarang')->name('kirim barang');
            });
        });
    });


    
    });
        

