<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dokterController extends Controller
{
    public function create()
    {
        return view('dokter.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required',
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'no_telp' => 'required'
        ]);
        DB::insert(
            'INSERT INTO dokter(id_dokter, nama_dokter, spesialis, no_telp) VALUES (:id_dokter, :nama_dokter, :spesialis, :no_telp)',
            [
                'id_dokter' => $request->id_dokter,
                'nama_dokter' => $request->nama_dokter,
                'spesialis' => $request->spesialis,
                'no_telp' => $request->no_telp,
            ]
        );
        return redirect()->route('dokter.index')->with('success', 'Data Dokter berhasil disimpan');
    }

    public function index()
    {
        $datas = DB::select('select * from dokter');
        return view('dokter.index')->with('datas', $datas);
    }

    public function edit($id)
    {
        $data = DB::table('dokter')->where('id_dokter', $id)->first();
        return view('dokter.edit')->with('data', $data);
    }

    
    public function update($id, Request $request)
    {
        $request->validate([
            'id_dokter' => 'required',
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'no_telp' => 'required'
        ]);
        DB::update(
            'UPDATE dokter SET id_dokter = :id_dokter, nama_dokter = :nama_dokter, spesialis = :spesialis, no_telp = :no_telp WHERE id_dokter = :id',
            [
                'id' => $id,
                'id_dokter' => $request->id_dokter,
                'nama_dokter' => $request->nama_dokter,
                'spesialis' => $request->spesialis,
                'no_telp' => $request->no_telp,
            ]
        );

    return redirect()->route('dokter.index')->with('success', 'Data Dokter berhasil diubah');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM dokter WHERE id_dokter = :id_dokter', ['id_dokter' => $id]);
        return redirect()->route('dokter.index')->with('success', 'Data Dokter berhasil dihapus');
    }

        

}
