@extends('layouts.app')

@section('content')

<style>
    body{
        background:#f4f4f4;
    }

    .retur-card{
        width: 70%;
        margin:auto;
        margin-top:40px;
        background:white;
        border-radius:10px;
        padding:30px;
    }
</style>

<div class="retur-card">

    <h3 class="fw-bold mb-4">Tambah Retur</h3>

    <form action="{{ route('retur.store') }}" method="POST">
        @csrf

        {{-- Kategori --}}
        <label>Kategori Barang</label>
        <select name="kategori" class="form-select mb-3">
            <option selected disabled>Pilih Kategori Barang</option>
            <option>Botol</option>
            <option>Tenda</option>
            <option>Jaket</option>
            <option>Matras</option>
        </select>

        {{-- Kode Retur --}}
        <label>Kode Retur</label>
        <input 
            type="text" 
            class="form-control mb-3" 
            value="Otomatis"
            readonly>

        {{-- Nama Barang --}}
        <label>Nama Barang</label>
        <input 
            type="text" 
            name="nama_barang" 
            class="form-control mb-3" 
            placeholder="Tuliskan Nama Barang">

        <div class="row">
            <div class="col-md-6">
                <label>Jumlah Barang</label>
                <input 
                    type="number" 
                    name="jumlah_retur" 
                    class="form-control mb-3" 
                    placeholder="Masukkan Jumlah Barang"
                    required>
            </div>

            <div class="col-md-6">
                <label>Satuan</label>
                <input 
                    type="text" 
                    name="satuan" 
                    class="form-control mb-3" 
                    placeholder="Masukkan Satuan">
            </div>
        </div>

        {{-- Tanggal --}}
        <label>Tanggal Retur</label>
        <input 
            type="date" 
            name="tanggal_retur" 
            class="form-control mb-3"
            required>

        {{-- Alasan --}}
        <label>Alasan Retur</label>
        <input 
            type="text" 
            name="alasan_retur" 
            class="form-control mb-3" 
            placeholder="Tuliskan Alasan Retur"
            required>

        {{-- BUTTON --}}
        <div class="d-flex justify-content-end gap-2">

            <a href="{{ route('retur.index') }}" class="btn btn-light">
                Batal
            </a>

            <button type="submit" class="btn btn-danger">
                <i class="fa fa-save"></i> Simpan
            </button>

        </div>

    </form>

</div>

@endsection
