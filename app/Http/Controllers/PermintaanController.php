<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use App\Models\StokBarang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use App\Models\BarangPermintaan;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permintaan = Permintaan::with('barang_permintaan.stokBarang')->latest()->paginate(10);
        return view('page.permintaan.index', compact('permintaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.permintaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return redirect("/permintaan/$permintaanId")
            ->with('pesan','berhasil mengirim permintaan')
            ->with('warna', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $permintaan = Permintaan::where('asal_rig', auth()->user()->asal_rig)
            ->latest()->first();
        // dd(auth()->user()->asal_rig);
        return view('page.permintaan.show', compact('permintaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permintaan $permintaan)
    {
        return view('page.permintaan.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permintaan $permintaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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
}
