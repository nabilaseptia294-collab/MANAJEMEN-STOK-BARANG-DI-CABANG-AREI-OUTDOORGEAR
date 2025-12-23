@extends('layouts.app')

@section('content')

<h2 class="mb-4">Detail Permintaan Stok</h2>

{{-- Card Informasi permintaan --}}
<div class="card mb-3">
    <div class="card-body">
        <table class="table table-borderless">
            {{-- ID Permintaan --}}
            <tr>
                <th width="200">ID Permintaan</th>
                <td>PMT-{{ $permintaan->id}}</td>
            </tr>

            {{-- Cabang --}}
            <tr>
                <th>Cabang</th>
                <td>{{ $permintaan->cabang }}</td>
            </tr>

            {{-- Admin Pengaju --}}
            <tr>
                <th>Admin Pengaju</th>
                <td>{{ $permintaan->admin->name ?? '-' }}</td>
            </tr>

            {{-- Tanggal Permintaan --}}
            <tr>
                <th>Tanggal Permintaan</th>
                <td>{{ \Carbon\Carbon::parse($permintaan->tanggal_permintaan)->format('d/m/Y') }}</td>
            </tr>

            {{-- Status permintaan --}}
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

            {{-- Alasan permintaan, hanya tampil jika ada --}}
            @if($permintaan->alasan)
            <tr>
                <th>Alasan</th>
                <td>{{ $permintaan->alasan }}</td>
            </tr>
            @endif
        </table>
    </div>
</div>

{{-- Card: Detail barang yang diminta --}}
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
                    <td>{{ $d->produk->nama_produk ?? 'Produk tidak ditemukan' }}</td>
                    <td>{{ $d->qty }}</td>
                </tr>
                @empty
                {{-- Jika tidak ada detail barang --}}
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

{{-- Tombol aksi --}}
<div class="mt-3">
    {{-- Kembali ke daftar permintaan --}}
    <a href="{{ route('permintaan.index') }}" class="btn btn-secondary">
        Kembali
    </a>

    {{-- Edit hanya muncul jika status masih pending --}}
    @if($permintaan->status === 'pending')
    <a href="{{ route('permintaan.edit', $permintaan) }}" class="btn btn-warning">        
        Edit Permintaan
    </a>
    @endif
</div>

@endsection
