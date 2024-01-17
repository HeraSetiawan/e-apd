<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exclude_column = ['password'];
        $columns = Schema::getColumnListing('karyawan');
        $selectedColumns = array_diff($columns, $exclude_column);
       return view('page.karyawan.index', ['karyawan' => Karyawan::select($selectedColumns)->latest()->get()]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKaryawanRequest $request)
    {
        $foto = $request->foto->store('avatars');
        $hasil_mcu = $request->hasil_mcu->store('berkas');
        $siml = $request->siml->store('berkas');
        $hasil_bst = $request->hasil_bst->store('berkas');
        Karyawan::create([
            'nama_lengkap' => $request->nama_lengkap,
            'foto' => $foto,
            'nik' => $request->nik,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan,
            'jenis_operasi' => $request->jenis_operasi,
            'asal_rig' => $request->asal_rig,
            'asal_base' => $request->asal_base,
            'schedule' => $request->schedule,
            'telepon' => $request->telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'hse_passport_number' => $request->hse_passport_number,
            'masa_berlaku_hse_passport' => $request->masa_berlaku_hse_passport,
            'tanggal_mcu_terakhir' => $request->tanggal_mcu_terakhir,
            'siml' => $siml,
            'hasil_mcu' => $hasil_mcu,
            'keterangan_mcu' => $request->keterangan_mcu,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'golongan_darah' => $request->golongan_darah,
            'tanggal_bst_terakhir' => $request->tanggal_bst_terakhir,
            'hasil_bst' => $hasil_bst,
            'apd_wajib' => $request->apd_wajib,
            'ukuran_coverall' => $request->ukuran_coverall,
            'ukuran_safety_shoes' => $request->ukuran_safety_shoes,
            'ukuran_safety_gloves' => $request->ukuran_safety_gloves,
            'ukuran_raincoat' => $request->ukuran_raincoat,
            'nomor_relasi_darurat' => $request->nomor_relasi_darurat,
            'nama_relasi_darurat' => $request->nama_relasi_darurat,
        ]);

        return redirect('/karyawan')->with('pesan','Berhasil tambah Admin baru')->with('warna', 'info');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        return view('page.karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return view('page.karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKaryawanRequest $request, Karyawan $karyawan)
    {
        if ($request->foto) {
            $foto = $request->foto->store('avatars'); //simpan foto
            $fileLama = public_path($request->old_foto); //cari lokasi foto lama
            if (File::exist($fileLama)) {
                unlink($fileLama);
            } //hapus foto
        } else {
            $foto = $request->old_foto; //gunakan foto lama
        }

        if ($request->hasil_mcu) {
            $hasil_mcu = $request->hasil_mcu->store('berkas');
            $fileLama = public_path($request->old_hasil_mcu);
            if (File::exist($fileLama)) {
                unlink($fileLama);
            }
        } else {
            $hasil_mcu = $request->old_hasil_mcu;
        }

        if ($request->siml) {
            $siml = $request->siml->store('berkas');
            $fileLama = public_path($request->old_siml);
            if (File::exist($fileLama)) {
                unlink($fileLama);
            }
        } else {
            $siml = $request->old_siml;
        }

        if ($request->hasil_bst) {
            $hasil_bst = $request->hasil_bst->store('berkas');
            $fileLama = public_path($request->old_hasil_bst);
            if (File::exist($fileLama)) {
                unlink($fileLama);
            }
        } else {
            $hasil_bst = $request->old_hasil_bst;
        }

        Karyawan::where('id', $karyawan->id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'foto' => $foto,
            'nik' => $request->nik,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan,
            'jenis_operasi' => $request->jenis_operasi,
            'asal_rig' => $request->asal_rig,
            'asal_base' => $request->asal_base,
            'schedule' => $request->schedule,
            'telepon' => $request->telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'hse_passport_number' => $request->hse_passport_number,
            'masa_berlaku_hse_passport' => $request->masa_berlaku_hse_passport,
            'tanggal_mcu_terakhir' => $request->tanggal_mcu_terakhir,
            'siml' => $siml,
            'hasil_mcu' => $hasil_mcu,
            'keterangan_mcu' => $request->keterangan_mcu,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'golongan_darah' => $request->golongan_darah,
            'tanggal_bst_terakhir' => $request->tanggal_bst_terakhir,
            'hasil_bst' => $hasil_bst,
            'apd_wajib' => $request->apd_wajib,
            'ukuran_coverall' => $request->ukuran_coverall,
            'ukuran_safety_shoes' => $request->ukuran_safety_shoes,
            'ukuran_safety_gloves' => $request->ukuran_safety_gloves,
            'ukuran_raincoat' => $request->ukuran_raincoat,
            'nomor_relasi_darurat' => $request->nomor_relasi_darurat,
            'nama_relasi_darurat' => $request->nama_relasi_darurat,
        ]);

        return redirect('/karyawan')->with('pesan', "Berhasil update $karyawan->nama_lengkap")->with('warna','primary');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        // unlink($karyawan->foto);
        Karyawan::destroy($karyawan->id);
        return redirect('/karyawan')->with('pesan', "Berhasil hapus data pengguna $karyawan->nama_lengkap")
            ->with('color', 'danger');
    }
}
