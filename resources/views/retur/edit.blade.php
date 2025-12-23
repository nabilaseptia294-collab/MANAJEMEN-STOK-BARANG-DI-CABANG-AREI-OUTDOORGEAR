@extends('layouts.app')

@section('content')
<div class="container p-4">
    <h2 class="mb-3 fw-bold">Edit Retur Barang</h2>

    <div class="card p-4">
        <form action="{{ route('retur.update', $retur->id_retur) }}" method="POST">
            @csrf
            @method('PUT') <div class="mb-3">
                <label for="sku" class="form-label">SKU (Kode Retur)</label>
                <input type="text" class="form-control bg-light" id="sku" value="{{ $retur->sku }}" readonly>
                <small class="text-muted text-italic">*SKU tidak dapat diubah</small>
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="{{ $retur->nama_barang }}">
            </div>

            <div class="mb-3">
                <label for="alasan_retur" class="form-label">Alasan Retur</label>
                <textarea name="alasan_retur" class="form-control" id="alasan_retur" rows="3" required>{{ $retur->alasan_retur }}</textarea>
            </div>

            <div class="mb-3">
                <label for="jumlah_retur" class="form-label">Unit (Jumlah)</label>
                <input type="number" name="jumlah_retur" class="form-control" id="jumlah_retur" value="{{ $retur->jumlah_retur }}" required>
            </div>

            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <select name="satuan" class="form-select">
                    <option value="PCS" {{ $retur->satuan == 'PCS' ? 'selected' : '' }}>PCS</option>
                    <option value="Lusin" {{ $retur->satuan == 'Lusin' ? 'selected' : '' }}>Lusin</option>
                    <option value="Box" {{ $retur->satuan == 'Box' ? 'selected' : '' }}>Box</option>
                </select>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger">Simpan Perubahan</button>
                <a href="{{ route('retur.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection