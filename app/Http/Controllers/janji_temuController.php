<?php

namespace App\Http\Controllers;
use App\Models\janji_temu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class janji_temuController extends Controller
{
    public function create()
    {
        return view('janji_temu.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'id_appointment' => 'required',
            'id_dokter' => 'required',
            'id_pasien' => 'required',
            'tanggal_temu' => 'required',
            'waktu_temu' => 'required',
        ]);
        DB::insert(
            'INSERT INTO janji_temu(id_appointment, id_dokter, id_pasien, keluhan, tanggal_temu, waktu_temu) VALUES (:id_appointment, :id_dokter, :id_pasien, :keluhan, :tanggal_temu, :waktu_temu)',
            [
                'id_appointment' => $request->id_appointment,
                'id_dokter' => $request->id_dokter,
                'id_pasien' => $request->id_pasien,
                'keluhan' => $request->keluhan,
                'tanggal_temu' => $request->tanggal_temu,
                'waktu_temu' => $request->waktu_temu

            ]
        );
        return redirect()->route('janji_temu.index')->with('success', 'Data Janji Temu berhasil disimpan');
    }

    public function index()
    {
        // Use leftJoin to include deleted records
        $datas = janji_temu::leftJoin('dokter', 'janji_temu.id_dokter', '=', 'dokter.id_dokter')
            ->leftJoin('pasien', 'janji_temu.id_pasien', '=', 'pasien.id_pasien')
            ->get();

        return view('janji_temu.index')->with('datas', $datas);
    }



    public function edit($id)
    {
        $data = DB::table('janji_temu')->where('id_appointment', $id)->first();
        return view('janji_temu.edit')->with('data', $data);
    }

    
    public function update($id, Request $request)
    {
        $request->validate([
            'id_appointment' => 'required',
            'id_dokter' => 'required',
            'id_pasien' => 'required',
            'tanggal_temu' => 'required',
            'waktu_temu' => 'required',
        ]);
        DB::update(
            'UPDATE janji_temu SET id_appointment = :id_appointment, id_dokter = :id_dokter, id_pasien = :id_pasien, keluhan = :keluhan, tanggal_temu = :tanggal_temu, waktu_temu = :waktu_temu',
            [
                'id' => $id,
                'id_appointment' => $request->id_appointment,
                'id_dokter' => $request->id_dokter,
                'id_pasien' => $request->id_pasien,
                'keluhan' => $request->keluhan,
                'tanggal_temu' => $request->tanggal_temu,
                'waktu_temu' => $request->waktu_temu

            ]
        );

    return redirect()->route('janji_temu.index')->with('success', 'Data Janji Temu berhasil diubah');
    }

    public function delete($id)
    {
        try {
            // Soft delete the record
            janji_temu::destroy($id);
            return redirect()->route('janji_temu.index')->with('success', 'Data Janji Temu berhasil dihapus');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Output the error message for debugging
        }
    }

    public function restore($id)
{
    janji_temu::withTrashed()->where('id_appointment', $id)->restore();
    return redirect()->route('janji_temu.index')->with('success', 'Data Janji Temu berhasil direstore');
}

public function forceDelete($id)
{
    janji_temu::withTrashed()->where('id_appointment', $id)->forceDelete();
    return redirect()->route('janji_temu.trash')->with('success', 'Data Janji Temu berhasil dihapus permanen');
}

public function trash()
{
    $trashedDatas = janji_temu::onlyTrashed()
        ->join('dokter', 'janji_temu.id_dokter', '=', 'dokter.id_dokter')
        ->join('pasien', 'janji_temu.id_pasien', '=', 'pasien.id_pasien')
        ->select('janji_temu.*', 'dokter.nama_dokter', 'pasien.nama_pasien')
        ->get();

    return view('janji_temu.trashdata')->with('trashedDatas', $trashedDatas);
}


}
