@extends('layout.layout')

@section('content')

<h4 class="mt-5">Data Dokter</h4>

<a href="{{ route('dokter.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<table class="table table-hover table-dark mt-2">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Spesialis</th>
            <th>No. Telp</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_dokter }}</td>
            <td>{{ $data->nama_dokter }}</td>
            <td>{{ $data->spesialis }}</td>
            <td>{{ $data->no_telp }}</td>
            <td>
                <a href="{{ route('dokter.show', $data->id_dokter) }}" 
                class="btn btn-info rounded-3">Detail</a>
                <a href="{{ route('dokter.edit', $data->id_dokter) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_dokter }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_dokter }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog text-dark">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('dokter.delete', $data->id_dokter) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>
@stop
