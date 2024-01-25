<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use App\Models\StokBarang;
use Illuminate\Http\Request;
use App\Models\BarangPermintaan;
use App\Models\Karyawan;
use App\Models\RiwayatApdKru;
use App\Models\StokArea;
use Illuminate\Support\Facades\Auth;

class PermintaanController extends Controller
{

    function lokasiUser()  {
        return Auth::user()->asal_rig;
    }

    public function index()
    {
        $permintaan = Permintaan::with('barang_permintaan.stokBarang')->latest()->paginate(10);
        return view('page.permintaan.index', compact('permintaan'));
    }

    function indexAsisten() {
        $permintaan = Permintaan::with('barang_permintaan.stokBarang')->where('status',"1")->paginate(5);
        // dd($permintaan);
        return view('page.permintaan.index', compact('permintaan'));
    }

    public function indexAdmin()
    {
        $permintaan = Permintaan::with('barang_permintaan.stokBarang')->where('asal_rig', auth()->user()->asal_rig)->orderBy('id', 'DESC')->get();
        // dd($permintaan);
        return view('page.permintaan.show', compact('permintaan'));
    }

    public function indexKru()
    {
        return view('page.permintaan.kru');
    }

    public function create()
    {
        return view('page.permintaan.create');
    }

    public function createKru()
    {
        $stok_area = StokArea::where('lokasi', $this->lokasiUser())->get();
        $list_kru = \App\Models\Karyawan::where('asal_rig', $this->lokasiUser())
                                            ->where('role', 'KRU')->get();
        // dd($list_kru);
        return view('page.stokbarang.pemberian_apd', compact('stok_area', 'list_kru'));
    }

    
    public function store(Request $request)
    {
        $file_permintaan = $request->file_permintaan->store('dokumen');
        $permintaan = Permintaan::create([
            'nomor' => $request->nomor,
            'tanggal' => $request->tanggal,
            'asal_rig' => $request->asal_rig,
            'file_permintaan' => $file_permintaan
        ]);

        $permintaanId = $permintaan->id;
        
        foreach ($request->id_barang as $key => $value) {
            BarangPermintaan::create([
                'permintaan_id'     => $permintaanId,
                'stok_barang_id'    => $value,
                'jumlah_diminta'    => $request->jumlah_permintaan[$key],
            ]);
        }

        return redirect("/permintaan/admin")
            ->with('pesan','berhasil mengirim permintaan')
            ->with('warna', 'success');
    }

    public function store_kru(Request $req) {
        RiwayatApdKru::create([
            'karyawan_id'         => $req->karyawan_id,
            'file_permintaan_apd' => $req->file_permintaan_apd->store('dokumen/tanda terima apd'),
        ]);

        foreach ($req->id_barang as $key => $value) {
           $stok_area = StokArea::find($value);
            $stok_area->decrement('qty', $req->qty[$key]);
        }

        return redirect("/stokbarang/admin")
            ->with('pesan','berhasil mengurangi stok area')
            ->with('warna', 'success');
    }

    public function edit(Permintaan $permintaan)
    {
        return view('page.permintaan.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAsisten(Request $req,$id)
    {
        Permintaan::where('id', $id)->update([
            'file_pengiriman' => $req->file_pengiriman->store('dokumen/pengiriman'),
            'status' => "2",
        ]);

        return redirect('/permintaan/asisten')->with('pesan')
            ->with('pesan','berhasil mengirim file')
            ->with('warna', 'success');
    }

    public function updateKru($id) {
        
    }

    public function destroy(Permintaan $permintaan)
    {
        //
    }

    function respon($id) {
        $barangPermintaan = BarangPermintaan::where('permintaan_id',$id)->get();
        $permintaan = Permintaan::find($id);
        // dd($barangPermintaan);
        return view('page.permintaan.respon', compact('barangPermintaan', 'permintaan'));
    }

    function kirimBarang(Request $req) {
        
        foreach ($req->barang_id as $key => $value) {
            //masukan ke tabel barang keluar
            // kurangi stok
            $stok = StokBarang::find($value);
            $stok->decrement('qty_barang_masuk', $req->jumlah_dikirim[$key]);
            BarangPermintaan::where('id', $req->barang_permintaan_id[$key ])
            ->update([
                'jumlah_dikeluarkan' => $req->jumlah_dikirim[$key]
            ]);
         }

        Permintaan::where('id', $req->permintaan_id)->update([
            'status' => '1' //permintaan barang diterima
        ]);

        return redirect('/permintaan')
                ->with('pesan', 'Berhasil kirim, jumlah stok akan otomatis berkurang')
                ->with('warna', 'success');
    }

    function tolak($id) {
        Permintaan::where('id', $id)->update([
            'status' => "4",
        ]);

        return redirect('/permintaan')
                ->with('pesan', 'Berhasil tolak permintaan')
                ->with('warna', 'danger');
    }

    function terima(Request $request) {
        
        foreach ($request->nama_barang as $key => $value) {
            StokArea::create([
                'nama_barang' => $value,
                'qty' => $request->qty[$key],
                'lokasi' => $request->lokasi, 
            ]);
        }
        Permintaan::where('id', $request->id)->update([
            'status' => "3",
        ]);
        
        return redirect('permintaan/admin')
                ->with('pesan', 'Berhasil selesaikan pesanan')
                ->with('warna', 'info');
    }
}
