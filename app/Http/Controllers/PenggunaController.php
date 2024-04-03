<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
 public function index() {
        $data['pengguna'] = Pengguna::get();
        return view('admin.daftar-pengguna.index', $data);
}

    public function create(){
        return view('admin.daftar-pengguna.create');
    }

    public function store(Request $request){
        Pengguna::create([
            'nama'      => $request->nama,
            'jurusan'   => $request->jurusan,
            'no_hp'     => $request->no_hp,
            'kelas'     => $request->kelas,
            'jk'        => $request->jk
        ]);

        return redirect()->route('daftar-pengguna.index')->with('success', 'Data berhasil dibuat');
    }

    public function edit($id){
        $data['pengguna'] = Pengguna::find($id);
        return view('admin.daftar-pengguna.edit', $data);

    }

    public function update(Request $request, $id){
        Pengguna::find($id)->update([
            'nama'      => $request->nama,
            'jurusan'   => $request->jurusan,
            'no_hp'     => $request->no_hp,
            'kelas'     => $request->kelas,
            'jk'        => $request->jk
        ]);

        return redirect()->route('daftar-pengguna.index')->with('success', 'Data berhasil diubah');

    }

    public function destroy($id){
        Pengguna::find($id)->delete();
        return redirect()->route('daftar-pengguna.index')->with('success', 'Data berhasil dihapus');
    }
}
