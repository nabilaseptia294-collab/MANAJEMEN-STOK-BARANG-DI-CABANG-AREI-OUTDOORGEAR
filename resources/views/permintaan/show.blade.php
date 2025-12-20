@extends('layouts.app')

@section('content')

<h2 class="mb-3">
    Detail Permintaan Stok: 
    <span class="text-danger">PMT-{{ $permintaan->id_permintaan_stok }}</span>
</h2>

<a href="{{ route('permintaan.index') }}" class="btn btn-link mb-3 p-0">
    ← Kembali ke Daftar
</a>

<div class="card">
    <div class="card-body">

        {{-- IDENTITAS PERMINTAAN --}}
        <h5 class="border-bottom pb-2 mb-3">Identitas Permintaan</h5>

        <table class="table table-borderless mb-3">
            <tbody>
                <tr>
                    <th width="220">No. Permintaan</th>
                    <td>PMT-{{ $permintaan->id_permintaan_stok }}</td>
                </tr>
                <tr>
                    <th>Tanggal Permintaan</th>
                    <td>{{ \Carbon\Carbon::parse($permintaan->tanggal_permintaan)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Nama Admin</th>
                    <td>{{ $permintaan->admin->name ?? 'Admin Tidak Dikenal' }}</td>
                </tr>
                <tr>
                    <th>Nama Cabang</th>
                    <td><strong>{{ $permintaan->cabang }}</strong></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($permintaan->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @else
                            <span class="badge bg-success">Approved</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Alasan</th>
                    <td>{{ $permintaan->alasan ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

        <hr>

        {{-- DETAIL PRODUK --}}
        <h5 class="border-bottom pb-2 mb-3">Daftar Produk yang Diminta</h5>

        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>SKU</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($permintaan->details as $detail)
                <tr>
                    <td>{{ $detail->produk->sku ?? '-' }}</td>
                    <td>{{ $detail->produk->nama_produk ?? 'Produk Dihapus' }}</td>
                    <td>{{ $detail->qty }}</td>
                    <td>{{ $detail->produk->satuan ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Tidak ada detail produk
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
