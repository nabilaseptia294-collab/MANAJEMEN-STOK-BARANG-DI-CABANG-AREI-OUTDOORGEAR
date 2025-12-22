@extends('layouts.app')

@section('content')

<h2 class="mb-4">Edit Permintaan Stok</h2>

<form method="POST" action="{{ route('permintaan.update', $permintaan) }}">
    @csrf
    @method('PUT')

    <div class="card mb-4">
        <div class="card-body">

            <h5 class="border-bottom pb-2 mb-3">Informasi Permintaan</h5>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">No. Permintaan</label>
                    <input type="text" class="form-control" value="PMT-{{ $permintaan->id }}" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Permintaan</label>
                    <input type="date" name="tanggal_permintaan" value="{{ $permintaan->tanggal_permintaan }}" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Admin Pengaju</label>
                    <input type="text" class="form-control" value="{{ $permintaan->admin->name ?? 'Admin' }}" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Cabang</label>
                    <select name="cabang" class="form-select" required>
                        @foreach($daftar_cabang as $c)
                            <option value="{{ $c }}" {{ $permintaan->cabang == $c ? 'selected' : '' }}>{{ $c }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="form-label">Alasan Permintaan (Opsional)</label>
                <textarea name="alasan" class="form-control" rows="2">{{ $permintaan->alasan }}</textarea>
            </div>

        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">

            <h5 class="border-bottom pb-2 mb-3">Produk Diminta</h5>

            <div class="row align-items-end g-2 mb-3">
                <div class="col-md-6">
                    <label class="form-label">Pilih Produk</label>
                    <select id="input-produk-id" class="form-select">
                        @foreach($produks as $p)
                            <option value="{{ $p->id_produk }}" data-sku="{{ $p->sku }}" data-nama="{{ $p->nama_produk }}">
                                {{ $p->nama_produk }} ({{ $p->sku }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Jumlah</label>
                    <input type="number" id="input-qty" min="1" value="1" class="form-control">
                </div>

                <div class="col-md-4">
                    <button type="button" onclick="addProduct()" class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah Item
                    </button>
                </div>
            </div>

            <table class="table table-bordered" id="detail-table">
                <thead class="table-light">
                    <tr>
                        <th>Nama Produk</th>
                        <th>SKU</th>
                        <th>Jumlah</th>
                        <th width="80">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permintaan->details as $detail)
                    <tr>
                        <td>{{ $detail->produk->nama_produk }}</td>
                        <td>{{ $detail->produk->sku }}</td>
                        <td>{{ $detail->qty }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">Hapus</button>
                        </td>
                        <input type="hidden" name="produk[]" value="{{ $detail->id_produk }}">
                        <input type="hidden" name="qty[]" value="{{ $detail->qty }}">
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <button type="submit" class="btn btn-danger w-100">
        <i class="fa fa-save"></i> Update Permintaan
    </button>
</form>

<script>
function addProduct() {
    const select = document.getElementById('input-produk-id');
    const selected = select.options[select.selectedIndex];
    const produkId = select.value;
    const nama = selected.getAttribute('data-nama');
    const sku = selected.getAttribute('data-sku');
    const qty = document.getElementById('input-qty').value;
    if (!qty || qty < 1) { alert('Jumlah minimal 1'); return; }
    const tbody = document.querySelector('#detail-table tbody');
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${nama}</td>
        <td>${sku}</td>
        <td>${qty}</td>
        <td><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">Hapus</button></td>
        <input type="hidden" name="produk[]" value="${produkId}">
        <input type="hidden" name="qty[]" value="${qty}">
    `;
    tbody.appendChild(row);
    document.getElementById('input-qty').value = 1;
}
</script>

@endsection
