@extends('layouts.app')

@section('content')

<h2 style="margin-bottom:20px">Tambah Produk</h2>

<div style="background:white; padding:20px; width:400px; border-radius:8px">
    <form action="/produk" method="POST">
        @csrf

        <p>Nama Produk</p>
        <input type="text" name="nama_produk" style="width:100%; padding:8px">

        <p>Kategori</p>
        <input type="text" name="kategori" style="width:100%; padding:8px">

        <p>Satuan</p>
        <input type="text" name="satuan" style="width:100%; padding:8px">

        <p>Harga</p>
        <input type="number" name="harga" style="width:100%; padding:8px">

        <br><br>
        <button class="btn-red">Simpan</button>
        <a href="/produk">Batal</a>
    </form>
</div>

@endsection
