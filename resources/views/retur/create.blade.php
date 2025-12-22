@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('retur.store') }}" method="POST">
        @csrf

        <input type="number" name="jumlah_retur" class="form-control mb-2" placeholder="Jumlah Retur">
        <input type="date" name="tanggal_retur" class="form-control mb-2">
        <textarea name="alasan_retur" class="form-control mb-2" placeholder="Alasan"></textarea>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
