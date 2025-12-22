@extends('layouts.app')

@section('content')

<h2 class="mb-4">Detail Permintaan Stok</h2>

<div class="card mb-3">
    <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th width="200">ID Permintaan</th>
                <td>PMT-{{ $permintaan->id}}</td>
            </tr>
            <tr>
                <th>Cabang</th>
                <td>{{ $permintaan->cabang }}</td>
            </tr>
            <tr>
                <th>Admin Pengaju</th>
                <td>{{ $permintaan->admin->name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal Permintaan</th>
                <td>{{ \Carbon\Carbon::parse($permintaan->tanggal_permintaan)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($permintaan->status === 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($permintaan->status === 'disetujui')
                        <span class="badge bg-success">Disetujui</span>
                    @else
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>
            </tr>
            @if($permintaan->alasan)
            <tr>
                <th>Alasan</th>
                <td>{{ $permintaan->alasan }}</td>
            </tr>
            @endif
        </table>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Detail Barang Diminta</h5>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @forelse($permintaan->details as $i => $d)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $d->produk->nama_produk ?? '-' }}</td>
                    <td>{{ $d->qty }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">
                        Tidak ada detail barang
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('permintaan.index') }}" class="btn btn-secondary">
        Kembali
    </a>

    @if($permintaan->status === 'pending')
    <a href="{{ route('permintaan.edit', $permintaan) }}" class="btn btn-warning">           class="btn btn-warning">
            Edit Permintaan
        </a>
    @endif
</div>

@endsection
