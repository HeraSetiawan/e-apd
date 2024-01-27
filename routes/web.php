<?php

use App\Models\Karyawan;
use App\Models\StokArea;
use App\Models\Permintaan;
use App\Http\Livewire\Login;
use App\Models\RiwayatApdKru;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\StokBarangController;
use App\Models\BarangPermintaan;
use App\Models\StokBarang;

// Guest
Route::get('/', Login::class);
Route::get('login',Login::class);
Route::controller(LoginController::class)->group(function(){
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function(){

    Route::get('dashboard',function(){
        // chart donat
        $permintaan = Permintaan::groupBy('asal_rig')->select('asal_rig', DB::raw('count(*) as total'))
            ->get()->pluck('total', 'asal_rig');
        $jsonPermintaan = $permintaan->toJson();

        // data total
        $jumlah_kru = Karyawan::count('id');
        $jumlah_stok = StokBarang::sum('qty_barang_masuk');

        // chart bagan
        $topValues = BarangPermintaan::join('stok_barang', 'barang_permintaan.stok_barang_id', '=', 'stok_barang.id')
        ->tahun(request('keyTahun') ?? date('Y'))->bulan(request('keyBulan') ?? date('m'))
        ->groupBy('stok_barang_id', 'stok_barang.nama_barang') // Tambahkan 'stok_barang.nama_barang' ke dalam GROUP BY
        ->orderByRaw('COUNT(*) DESC')
        ->take(10)
        ->get(['stok_barang_id', 'stok_barang.nama_barang', DB::raw('COUNT(*) as total')]);
    
        $dataChart = $topValues->pluck('total', 'nama_barang');
        $top10 = $dataChart->toJson();
        // dd($dataChart);
        return view('page.dashboard', compact('jsonPermintaan', 'jumlah_kru', 'jumlah_stok','top10'));
    })->name('dashboard');

    
    Route::get('/karyawan/biodata', function(){
        return view('page.karyawan.show', ['karyawan' => Karyawan::find(auth()->user()->id)]);
    })->name('biodata');

    // kru
    Route::middleware('cekRole:KRU')->group(function(){
        Route::get('/dashboard/kru', function(){
            return view('page.dashboard_kru', ['karyawan' => Karyawan::find(auth()->user()->id)]);
        })->name('dashboard kru');

        Route::get('/permintaan/kru',[PermintaanController::class, 'indexKru']);
        Route::put('/permintaan/kru/{id}',[PermintaanController::class, 'updateKru']);
    });
    

    // --admin area--
    Route::middleware("cekRole:SS")->group(function(){

        Route::get('/dashboard/admin', function(){
            $karyawan = Karyawan::find(auth()->user()->id);
            $jumlah_kru = Karyawan::where('asal_rig', auth()->user()->asal_rig)->count('id');
            $jumlah_stok = StokArea::where('lokasi', auth()->user()->asal_rig)->sum('qty');
            return view('page.dashboard_admin', compact('karyawan', 'jumlah_kru', 'jumlah_stok'));
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
            return view('page.riwayat.index_admin', [
                'riwayat' => RiwayatApdKru::join('karyawan', 'karyawan.id', '=', 'riwayat_apd_kru.karyawan_id')
                ->where('karyawan.asal_rig', auth()->user()->asal_rig)
                ->get() 
            ]);
        });
    });
    // --end admin area--

    // asisten
    Route::middleware("cekRole:AS")->group(function(){
        Route::get('/permintaan/asisten',[PermintaanController::class, 'indexAsisten'])->name('permintaan asisten');
        Route::patch('/permintaan/{id}',[PermintaanController::class, 'updateAsisten'])->name('update permintaan asisten');
    });

    // --super admin--
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

        // riwayat
        Route::get('/riwayat', [StokBarangController::class,'riwayat']);
    });
// --super admin--

    
    });
        

