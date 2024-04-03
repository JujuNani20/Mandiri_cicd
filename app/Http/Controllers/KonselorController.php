<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use Illuminate\Http\Request;

class KonselorController extends Controller
{
    public function index() {
        $data['konselor'] = Konselor::get();
        return view('admin.daftar-konselor.index', $data);
}

    public function create(){
        return view('admin.daftar-konselor.create');
    }

    public function store(Request $request){
        Konselor::create([
            'nama'      => $request->nama,
            'jurusan'   => $request->jurusan,
            'no_hp'     => $request->no_hp,
            'kelas'     => $request->kelas,
            'jk'        => $request->jk
        ]);

        return redirect()->route('daftar-konselor.index')->with('success', 'Data berhasil dibuat');
    }

    public function edit($id){
        $data['konselor'] = Konselor::find($id);
        return view('admin.daftar-konselor.edit', $data);

    }

    public function update(Request $request, $id){
        Konselor::find($id)->update([
            'nama'      => $request->nama,
            'jurusan'   => $request->jurusan,
            'no_hp'     => $request->no_hp,
            'kelas'     => $request->kelas,
            'jk'        => $request->jk
        ]);

        return redirect()->route('daftar-konselor.index')->with('success', 'Data berhasil diubah');

    }

    public function destroy($id){
        Konselor::find($id)->delete();
        return redirect()->route('daftar-konselor.index')->with('success', 'Data berhasil dihapus');
    }

}
