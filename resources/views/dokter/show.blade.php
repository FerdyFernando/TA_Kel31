@extends('layout.layout')

@section('content')
    <h4 class="mt-5">Detail Dokter</h4>

    <div class="mt-3">
        <p><strong>Nama:</strong> {{ $data->nama_dokter }}</p>
        <p><strong>Spesialis:</strong> {{ $data->spesialis }}</p>
        <p><strong>No. Telp:</strong> {{ $data->no_telp }}</p>
        <p><strong>Daftar Janji Temu:</strong> </p>
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th>No. </th>
                <th>Tanggal Temu</th>
                <th>Waktu Temu</th>
                <th>Nama Pasien</th>
                <th>Keluhan</th>
            </tr>
            </thead>

            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $data->tanggal_temu }}</td>
                    <td>{{ $data->waktu_temu }}</td>
                    <td>{{ $data->nama_pasien}}</td>
                    <td>{{ $data->keluhan}}</td>
                </tr>
                @endforeach <!-- Add this line to close the foreach loop -->
            </tbody>
        </table>
        
        <!-- Add other details as needed -->
    </div>

    <a href="{{ route('dokter.index') }}" class="btn btn-primary mt-3">Kembali</a>
@stop
