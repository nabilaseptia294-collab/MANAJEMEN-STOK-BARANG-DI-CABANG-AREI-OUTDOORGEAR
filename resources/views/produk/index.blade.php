@extends('layouts.app')

@section('content')
<div style="background:#f5f5f5; min-height:100vh; padding:24px">

    {{-- HEADER --}}
    <div style="margin-bottom:20px">
        <h1 style="font-size:22px; font-weight:bold;">AREI Outdoor Gear</h1>
        <h2 style="font-size:20px; font-weight:bold;">Manajemen Produk</h2>
        <p style="color:#666;">Kelola data produk AREI</p>
    </div>

    {{-- ACTION BAR --}}
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px">
        <a href="{{ route('produk.create') }}"
           style="
            background:#c62828;
            color:white;
            padding:10px 16px;
            border-radius:6px;
            font-weight:bold;
           ">
            + Tambah Produk
        </a>

        <input
            type="text"
            placeholder="Cari nama produk..."
            style="
                padding:8px 12px;
                width:220px;
                border-radius:6px;
                border:1px solid #ccc;
            ">
    </div>

    {{-- TABLE CARD --}}
    <div style="background:white; border-radius:8px; padding:16px">

        <table width="100%" cellpadding="10" cellspacing="0">
            <thead style="background:#f0f0f0">
                <tr>
                    <th align="left">Nama Produk</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Admin</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($produks as $produk)
                <tr style="border-bottom:1px solid #eee">
                    <td>{{ $produk->nama_produk }}</td>
                    <td align="center">{{ $produk->kategori }}</td>
                    <td align="center">{{ $produk->satuan }}</td>
                    <td align="center">
                        Rp {{ number_format($produk->harga,0,',','.') }}
                    </td>
                    <td align="center">-</td>
                    <td align="center">
                        <a href="{{ route('produk.edit', $produk->id_produk) }}"
                           style="color:#1976d2; margin-right:8px">
                            Edit
                        </a>

                        <form action="{{ route('produk.destroy', $produk->id_produk) }}"
                              method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button
                                onclick="return confirm('Hapus produk?')"
                                style="
                                    background:none;
                                    border:none;
                                    color:#c62828;
                                    cursor:pointer;
                                ">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection
