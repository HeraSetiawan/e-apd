<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function index() {
        return view('page.karyawan.index', [ 'karyawan' => User::all()]);
    }

    function create() {
        return view('page.karyawan.create');
    }

    function store(Request $request) {

        $request->validate([
            'foto' => 'image|max:1024'
        ],[
            'foto.image' => 'file bukan bertipe gambar',
            'foto.max' => 'ukuran file tidak boleh lebih dari 1MB',
        ]);

        $foto = $request->foto->store('avatars');

        User::create([
            'name' => $request->name,
            'foto' => $foto,
            'nik' => $request->nik,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'lokasi' => $request->lokasi,
        ]);

        return redirect('/karyawan')->with('pesan', 'berhasil tambah user baru');
    }

    function edit(User $user) {
        return view('page.admin.edit', compact('user'));
    }

    function update(Request $request, $id) {

        $request->validate([
            'foto' => 'image|max:1024'
        ],[
            'foto.image' => 'file bukan bertipe gambar',
            'foto.max' => 'ukuran file tidak boleh lebih dari 1MB',
        ]);

        if ($request->foto != null) {
            $foto = $request->foto->store('avatars');
            // unlink($request->old_foto);
        } else {
            $foto = $request->old_foto;
        }
        
        User::where('id', $id)->update([
            'name' => $request->name,
            'foto' => $foto,
            'nik' => $request->nik,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'lokasi' => $request->lokasi,
        ]);

        return redirect('/karyawan')->with('pesan', 'Berhasil update data pengguna');
    }

    function destroy(User $user) {
        unlink($user->foto);
        User::destroy($user->id);
        return redirect('/karyawan')->with('pesan', "Berhasil hapus data pengguna $user-");
    }
}
