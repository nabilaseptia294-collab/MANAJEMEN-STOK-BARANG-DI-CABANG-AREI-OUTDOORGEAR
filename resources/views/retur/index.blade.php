@extends('layouts.app')

@section('content')
<div class="container p-4">
    <h2 class="mb-3 fw-bold">Retur Barang</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('retur.create') }}" class="btn btn-danger">
            + Tambah Retur
        </a>
        <input type="text" class="form-control w-50" placeholder="Cari Kode Retur atau Nama Barang">
    </div>

    <div class="d-flex gap-2 mb-3">
        <select class="form-select" style="width: 200px">
            <option>Desember</option>
            <option>November</option>
            <option>Oktober</option>
        </select>
        <select class="form-select" style="width: 200px">
            <option>2025</option>
            <option>2024</option>
        </select>
    </div>

    <div class="card p-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table table-bordered align-middle text-center">
            <thead class="table-danger">
                <tr>
                    <th>SKU</th>
                    <th>Nama Barang</th>
                    <th>Alasan</th>
                    <th>Satuan</th>
                    <th>Unit</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($retur as $r)
                <tr>
                    <td>{{ $r->sku ?? '-' }}</td>
                    <td>{{ $r->nama_barang ?? '-' }}</td>
                    <td>{{ $r->alasan_retur }}</td>
                    <td>{{ $r->satuan ?? 'PCS' }}</td>
                    <td>{{ $r->jumlah_retur }}</td>
                    <td>
                        <span class="badge bg-success">Sukses</span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('retur.edit', $r->id_retur) }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit text-white"></i>
                            </a>

                            <form action="{{ route('retur.destroy', $r->id_retur) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Belum ada data retur</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection