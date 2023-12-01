<?php

namespace App\Http\Controllers;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class pasienController extends Controller
{
    public function create()
    {
        return view('pasien.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required',
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);
        DB::insert(
            'INSERT INTO pasien(id_pasien, nama_pasien, alamat, no_telp) VALUES (:id_pasien, :nama_pasien, :alamat, :no_telp)',
            [
                'id_pasien' => $request->id_pasien,
                'nama_pasien' => $request->nama_pasien,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp
            ]
        );
        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil disimpan');
    }

    public function index()
{
   
    $datas = DB::table('pasien')->whereNull('deleted_at')->get();

    return view('pasien.index')->with('datas', $datas);
}

    public function edit($id)
    {
        $data = DB::table('pasien')->where('id_pasien', $id)->first();
        return view('pasien.edit')->with('data', $data);
    }

    
    public function update($id, Request $request)
    {
        $request->validate([
            'id_pasien' => 'required',
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);
        DB::update(
            'UPDATE pasien SET id_pasien = :id_pasien, nama_pasien = :nama_pasien, alamat = :alamat, no_telp = :no_telp',
            [
                'id' => $id,
                'id_pasien' => $request->id_pasien,
                'nama_pasien' => $request->nama_pasien,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp
            ]
        );

        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil diubah');
    }



public function delete($id)
{
    // Soft delete data
    DB::table('pasien')->where('id_pasien', $id)->update(['deleted_at' => now()]);

    return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil dihapus');
}




public function trash()
{
    // Menampilkan data yang telah dihapus secara lunak
    $trashedDatas = DB::table('pasien')->whereNotNull('deleted_at')->get();

    return view('pasien.trashdata')->with('trashedDatas', $trashedDatas);
}
public function forceDelete($id)
{
    DB::table('pasien')->where('id_pasien', $id)->delete();

    return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil dihapus permanen');
}


}
