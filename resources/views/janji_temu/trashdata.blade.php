@extends('layout.layout')

@section('content')

<h4 class="mt-5">Trashed Janji Temu Data</h4>

<table class="table table-hover table-dark mt-2">
    <thead>
        <tr>
            <th>No.</th>
            <th>Dokter</th>
            <th>Pasien</th>
            <th>Keluhan</th>
            <th>Tanggal temu</th>
            <th>Waktu temu</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trashedDatas as $data)
        <tr>
        <td>{{ $data->id_appointment }}</td>
            <td>{{ $data->nama_dokter }}</td>
            <td>{{ $data->nama_pasien }}</td>
            <td>{{ $data->keluhan }}</td>
            <td>{{ $data->tanggal_temu }}</td>
            <td>{{ $data->waktu_temu }}</td>
            <td>
                <!-- Add restore and permanent delete buttons -->
                <a href="{{ route('janji_temu.restore', $data->id_appointment) }}" type="button"
                    class="btn btn-success rounded-3">Restore</a>
                <a href="{{ route('janji_temu.forceDelete', $data->id_appointment) }}" type="button"
                    class="btn btn-danger rounded-3">Permanent Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
