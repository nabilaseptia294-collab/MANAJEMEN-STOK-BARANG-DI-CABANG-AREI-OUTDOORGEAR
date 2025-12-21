@extends('layouts.app')

@section('content')

<h2 class="mb-4">Daftar Permintaan Stok</h2>

<div class="mb-3">
    <a href="{{ route('permintaan.create') }}" class="btn btn-danger">
        <i class="fa fa-plus"></i> Tambah Permintaan Baru
    </a>
</div>

<div class="card">
    <div class="card-body">

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Cabang</th>
                    <th>Admin Pengaju</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($permintaans as $p)
                <tr>
                    <td>PMT-{{ $p->id_permintaan_stok }}</td>
                    <td>{{ $p->cabang }}</td>
                    <td>{{ $p->admin->name ?? 'Admin Tidak Dikenal' }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->tanggal_permintaan)->format('d/m/Y') }}</td>
                    <td>
                        @if($p->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @else
                            <span class="badge bg-success">Approved</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('permintaan.show', $p->id_permintaan_stok) }}"
                           class="btn btn-sm btn-outline-primary">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Belum ada permintaan stok
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
