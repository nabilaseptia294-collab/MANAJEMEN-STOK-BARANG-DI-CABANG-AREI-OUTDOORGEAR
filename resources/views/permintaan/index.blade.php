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
                    <th width="250">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($permintaans as $p)
                <tr>
                    <td>PMT-{{ $p->id}}</td>
                    <td>{{ $p->cabang }}</td>
                    <td>{{ $p->admin->name ?? 'Admin' }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->tanggal_permintaan)->format('d/m/Y') }}</td>
                    <td>
                        <span class="badge {{ $p->status == 'pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('permintaan.show', $p->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-eye"></i> Detail
                            </a>

                            @if($p->status === 'pending')
                                <a href="{{ route('permintaan.edit', $p->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('permintaan.destroy', $p->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus?')">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection