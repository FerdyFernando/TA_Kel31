@extends('layout.layout')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Ubah Data Janji Temu</h5>
        <form method="post" action="{{ route('janji_temu.update', '$data->id_appointment) }}">
            @csrf
            <div class="mb-3">
                <label for="id_appointment" class="form-label">ID Appointment</label>
                <input type="text" class="form-control" id="id_appointment" name="id_appointment" value = "{{ $data->id_appointment }}">
            </div>
            <div class="mb-3">
                <label for="id_dokter" class="form-label">ID Dokter</label>
                <input type="text" class="form-control" id="id_dokter" name="id_dokter" value = "{{ $data->id_dokter }}">
            </div>
            <div class="mb-3">
                <label for="id_pasien" class="form-label">ID Pasien</label>
                <input type="text" class="form-control" id="id_pasien" name="id_pasien" value = "{{ $data->id_pasien }}">
            </div>
            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <input type="text" class="form-control" id="keluhan" name="keluhan" value = "{{ $data->keluhan }}">
            </div>
            <div class="mb-3">
                <label for="tanggal_temu" class="form-label">Tanggal Temu</label>
                <input type="text" class="form-control" id="tanggal_temu" name="tanggal_temu" value = "{{ $data->tanggal_temu }}">
            </div>
            <div class="mb-3">
                <label for="waktu_temu" class="form-label">Waktu Temu</label>
                <input type="text" class="form-control" id="waktu_temu" name="waktu_temu" value = "{{ $data->waktu_temu }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop
