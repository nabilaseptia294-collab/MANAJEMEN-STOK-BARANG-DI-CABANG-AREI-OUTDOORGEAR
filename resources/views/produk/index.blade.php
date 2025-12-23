@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 16px;
        }
</style>

<x-navbar/>
<div class="layout">
    <x-sidebar />
    <div class="content">
        <div class="p-6 bg-gray-100 font-sans text-sm text-gray-700">
    
    <div class="flex items-center gap-2 mb-6">
        <i class="fas fa-box text-black text-lg"></i>
        <h1 class="text-xl font-bold text-gray-900">Manajemen Produk</h1>
    </div>

    <div class="flex flex-col md:flex-row gap-4 mb-6 justify-between items-center">
        <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
            <a href="{{ route('produk.create') }}" class="bg-[#E00025] hover:bg-red-700 text-white px-4 py-2 rounded shadow flex items-center gap-2 font-medium transition-colors">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
            
            <form action="{{ route('produk.index') }}" method="GET" class="relative w-full md:w-96">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kode atau nama produk..." class="w-full pl-4 pr-10 py-2 rounded shadow-sm border border-transparent focus:outline-none focus:ring-2 focus:ring-[#E00025] bg-white">
                <button type="submit" class="absolute right-0 top-0 h-full w-10 text-gray-500 rounded-r hover:bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        
        <form action="{{ route('produk.index') }}" method="GET">
            <div class="relative">
                <select name="status" onchange="this.form.submit()" class="appearance-none bg-[#E00025] hover:bg-red-700 text-white pl-4 pr-8 py-2 rounded shadow font-medium cursor-pointer focus:outline-none">
                    <option value="" class="bg-white text-gray-800" {{ request('status') == '' ? 'selected' : '' }}>Semua Status</option>
                    <option value="aktif" class="bg-white text-gray-800" {{ request('status') == 'aktif' ? 'selected' : '' }}>Status Aktif</option>
                    <option value="tidak_aktif" class="bg-white text-gray-800" {{ request('status') == 'tidak_aktif' ? 'selected' : '' }}>Status Tidak Aktif</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-white">
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#E00025] text-white font-bold text-sm uppercase tracking-wide">
                    <tr>
                        <th class="px-6 py-4">Nama Barang</th>
                        <th class="px-6 py-4">SKU</th>
                        <th class="px-6 py-4">Satuan</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Harga</th> <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    
                    @forelse ($produks as $produk)
                    <tr class="hover:bg-red-50 transition-colors bg-white">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                @if($produk->gambar)
                                    <img src="{{ asset('storage/'.$produk->gambar) }}" class="w-10 h-10 object-cover rounded border border-gray-200">
                                @else
                                    <div class="w-10 h-10 bg-gray-100 rounded border border-gray-200 flex items-center justify-center shrink-0 text-gray-400">
                                        <i class="fas fa-image text-lg"></i>
                                    </div>
                                @endif
                                <span class="font-semibold text-gray-900">{{ $produk->nama_produk }}</span>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4 font-medium">{{ $produk->sku ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $produk->satuan }}</td>
                        <td class="px-6 py-4 capitalize">{{ $produk->kategori }}</td>
                        
                        <td class="px-6 py-4 font-medium text-gray-900">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </td>
                        
                        <td class="px-6 py-4">
                            @if(strtolower($produk->status) == 'aktif')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-200 shadow-sm inline-block min-w-[80px] text-center">
                                    Aktif
                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold border border-red-200 shadow-sm inline-block min-w-[80px] text-center">
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-3 text-lg">
                                <a href="{{ route('produk.edit', $produk->id_produk) }}" class="text-gray-500 hover:text-blue-600 transition-colors">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Hapus produk ini?')" class="text-gray-500 hover:text-[#E00025] transition-colors">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500 bg-gray-50">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-box-open text-4xl mb-3 text-gray-300"></i>
                                <p>Belum ada data produk.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
</div>

@endsection