@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<h2 class="mb-4">Daftar Permintaan Stok</h2>

{{-- Tombol tambah permintaan baru --}}
<div class="mb-3">
    <a href="{{ route('permintaan.create') }}" class="btn btn-danger">
        <i class="fa fa-plus"></i> Tambah Permintaan Baru
=======
<style>
.layout {
    display: flex;
    flex-direction: row;
}

.content {
    flex: 1;
    padding: 16px;
}

.card {
    width: 100%;
    background-color: #fff;
    border-radius: 16px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.action-buttons {
    display: flex;
    gap: 16px;
    margin-bottom: 10px;
}

.btn-action {
    padding: 12px 22px;
    background-color: #e30613;
    color: #fff;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-action:hover {
    opacity: 0.9;
}

.tab-menu {
            display: flex;
            width: 100%;
        }

        .tab-item {
            flex: 1;
            text-align: center;
            padding: 14px 0;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            position: relative;
            transition: color 0.2s ease;
        }

        .tab-item:hover {
            color: #e30613;
        }

        .tab-item.active {
            color: #e30613;
        }

        .tab-item.active::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -2px;
            transform: translateX(-50%);
            width: 80%;
            height: 4px;
            background-color: #e30613;
            border-radius: 4px;
        }

.search-wrapper {
    margin-top: 16px;
}

.search-wrapper input {
    width: 50%;
    padding: 12px 16px;
    border-radius: 12px;
    border: 1px solid #000;
    background-color: #FFFFFF;
    opacity: 0.5;
    outline: none;
    padding-left: 30px;
    background: url('/images/search-icon.png') no-repeat 10px center;
    background-size: 15px 15px;
}

.table-wrapper {
    display: flex;
    flex-direction: column;
    height: 100%;
    overflow: hidden;
}

.table-header table,
.table-body table {
    width: 100%;
    table-layout: fixed;
    border-collapse: collapse;
}

.table-body {
    flex: 1;
    overflow-y: auto;
    overflow-x: hidden;
}

.table-header th {
    padding: 10px;
    text-align: center;
    font-weight: 600;
    font-size: 0.85rem;
    color: #fff;
    background-color: #E6091A;
}

.table-body td {
    padding: 14px 12px;
    border-bottom: 1px solid #e9ecef;
    text-align: center;
    font-size: 0.9rem;
}

.table-body tbody tr:nth-child(even) {
    background-color: #DCDCDC;
}

.col-no { width: 1%; }
.col-cabang { width: 15%; }
.col-admin { width: 20%; }
.col-tanggal { width: 15%; }
.col-status { width: 12%; }
.col-aksi { width: 15%; }

.badge {
    padding: 4px 8px;
    border-radius: 5px;
    font-size: 0.8rem;
    font-weight: 600;
}
.bg-warning { background-color: #F7F98A; color:#000; }
.bg-success { background-color: #97EF94; color:#000; }
.bg-danger { background-color: #F87979; color:#000; }
</style>

<x-navbar />

<div class="layout">
    <x-sidebar />
    <div class="content">
        <!-- <h2 class="mb-4">Daftar Permintaan Stok</h2>

<div class="action-buttons">
    <a href="{{ route('permintaan.create') }}" class="btn-action">
        <i class="fa fa-plus" style="margin-right:5px;"></i> Tambah Permintaan Baru
>>>>>>> 84189c8 (Update model dan blade penerimaan)
    </a>
</div> -->
<h4 class="mb-4">Operasional Gudang</h4>
<div class="layout" style="margin-top: 10px; gap: 20px;">
                <div class="card">
                    <div class="action-buttons" style="padding: 20px">
                        <a href="{{ route('permintaan.create') }}" class="btn-action">+ Buat Permintaan</button>
                        <a style="text-decoration: none;font-size: 14px;" href="/penerimaan/tambah" class="btn-action">+ Tambah Penerimaan</a>
                        <button class="btn-action">Pengelolaan Stok</button>
                    </div>

                    <div class="tab-menu">
                        <div class="tab-item active">
                            <a style="text-decoration: none;color: #000;font-size: 14px;" href="/permintaan">Riwayat Permintaan</a>
                        </div>
                        <div o class="tab-item ">
                            <a style="text-decoration: none;color: #000;font-size: 14px;" href="/penerimaan">Riwayat Penerimaan</a>
                        </div>
                        <div class="tab-item">Stok</div>
                    </div>
                </div>
            </div>


<div class="search-wrapper">
    <input type="text" placeholder="Cari Nomor Permintaan">
</div>

<<<<<<< HEAD
<div class="card">
    <div class="card-body">
        {{-- Tabel daftar permintaan --}}
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
                    {{-- ID permintaan --}}
                    <td>PMT-{{ $p->id}}</td>

                    {{-- Nama cabang --}}
                    <td>{{ $p->cabang }}</td>

                    {{-- Nama admin pengaju --}}
                    <td>{{ $p->admin->name ?? 'Admin' }}</td>

                    {{-- Tanggal permintaan format d/m/Y --}}
                    <td>{{ \Carbon\Carbon::parse($p->tanggal_permintaan)->format('d/m/Y') }}</td>

                    {{-- Status permintaan --}}
                    <td>
                        <span class="badge {{ $p->status == 'pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>

                    {{-- Kolom aksi --}}
                    <td>
                        <div class="d-flex gap-1">
                            {{-- Tombol Detail --}}
                            <a href="{{ route('permintaan.show', $p->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-eye"></i> Detail
                            </a>

                            {{-- Tombol Edit hanya muncul jika status pending --}}
                            @if($p->status === 'pending')
                                <a href="{{ route('permintaan.edit', $p->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                {{-- Tombol Hapus hanya muncul jika status pending --}}
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
                {{-- Jika tidak ada data --}}
                <tr><td colspan="6" class="text-center">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
=======
<div class="card" style="margin-top:20px; height:400px; padding:20px">
    <div class="table-wrapper">
        <div class="table-header">
            <table>
                <thead>
                    <tr>
                        <th class="col-no">ID</th>
                        <th class="col-cabang">Cabang</th>
                        <th class="col-admin">Admin Pengaju</th>
                        <th class="col-tanggal">Tanggal</th>
                        <th class="col-status">Status</th>
                        <th class="col-aksi">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="table-body">
            <table>
                <tbody>
                    @forelse($permintaans as $p)
                    <tr>
                        <td class="col-no">PMT-{{ $p->id_permintaan_stok }}</td>
                        <td class="col-cabang">{{ $p->cabang }}</td>
                        <td class="col-admin">{{ $p->admin->name ?? 'Admin Tidak Dikenal' }}</td>
                        <td class="col-tanggal">{{ \Carbon\Carbon::parse($p->tanggal_permintaan)->format('d/m/Y') }}</td>
                        <td class="col-status">
                            @if($p->status === 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($p->status === 'disetujui')
                                <span class="badge bg-success">Disetujui</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                        <td class="col-aksi">
                            <div style="display:flex;gap:10px;justify-content:center">
                                <a href="{{ route('permintaan.show', $p->id_permintaan_stok) }}"
                                   class="btn-action" style="padding:6px 12px;font-size:12px;background:#97EF94">
                                   Detail
                                </a>

                                @if($p->status === 'pending')
                                <a href="{{ route('permintaan.edit', $p->id_permintaan_stok) }}"
                                   class="btn-action" style="padding:6px 12px;font-size:12px;background:#F7F98A">
                                   Edit
                                </a>

                                <form action="{{ route('permintaan.destroy', $p->id_permintaan_stok) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-action" style="padding:6px 12px;font-size:12px;background:#F87979"
                                            onclick="return confirm('Yakin hapus permintaan ini?')">
                                        Hapus
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="height:260px;color:#999;text-align:center">
                            Belum ada permintaan stok
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
>>>>>>> 84189c8 (Update model dan blade penerimaan)
    </div>
</div>
@endsection
