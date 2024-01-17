<?php

namespace App\Http\Controllers;

use App\Models\StokBarang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StokBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.stokbarang.index', ['stokbarang' => StokBarang::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.stokbarang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $valid = $request->validate([
            'nama_barang' => 'required|unique:stok_barang', 
        ],
        [
            'nama_barang.required' => 'nama barang wajib di isi',
            'nama_barang.unique' => 'nama barang sudah ada',
        ]
    );

        StokBarang::create([
            "nama_barang" => $request->nama_barang,
            "slug" => Str::of($request->nama_barang)->slug('-'),
            "qty_barang_masuk" => $request->qty_barang_masuk,
            "tanggal_masuk" => $request->tanggal_masuk,
            "nama_penerima" => $request->nama_penerima,
        ]);

        return redirect('/stokbarang')->with('pesan', "berhasil tambah $request->nama_barang")->with('warna', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(StokBarang $stokBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StokBarang $stokBarang)
    {
        return view('page.stokbarang.edit', ['stokbarang' => $stokBarang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StokBarang $stokBarang)
    {
        
        if ($request->nama_barang == $stokBarang->nama_barang || StokBarang::where('nama_barang', $request->nama_barang)->doesntExist()) {
            $namaBarang =  $request->nama_barang;
        } else {
            $request->validate([
                'nama_barang' => 'required|unique:stok_barang', 
            ],
            [
                'nama_barang.unique' => 'nama barang sudah ada',
            ]); //jika nama barang sudah ada kembalikan
        }

        StokBarang::where('slug', $stokBarang->slug)->update([
            "nama_barang" => $namaBarang,
            "slug" => Str::of($request->nama_barang)->slug('-'),
            "qty_barang_masuk" => $request->qty_barang_masuk,
            "tanggal_masuk" => $request->tanggal_masuk,
            "nama_penerima" => $request->nama_penerima,
        ]);

        return redirect('/stokbarang ')->with('pesan', "berhasil update $stokBarang->nama_barang")->with('warna','info');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StokBarang $stokBarang)
    {
        StokBarang::where('slug', $stokBarang->slug)->delete();
        return redirect('stokbarang')->with('pesan', "berhasil hapus $stokBarang->nama_barang")->with('warna', 'danger');
    }
}