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
                    <th width="220">Aksi</th>
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
                        @if($p->status === 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($p->status === 'disetujui')
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>
<!-- DETAIL -->
<a href="{{ route('permintaan.show', $p->id) }}"class="btn btn-sm btn-outline-primary mb-1">
    Detail
</a>

@if($p->status === 'pending')
    <!-- EDIT -->
    <a href="{{ route('permintaan.edit', $p->id) }}" 
   class="btn btn-warning">
    Edit Permintaan
</a>

    <!-- HAPUS -->
    <form action="{{ route('permintaan.destroy', $p->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-outline-danger mb-1"
            onclick="return confirm('Yakin hapus permintaan ini?')">
        Hapus
    </button>
</form>
@endif

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
