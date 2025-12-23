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

<x-navbar />
<div class="layout">
    <x-sidebar />
    <div class="content">
<div class="p-6 bg-gray-100  font-sans text-sm">
    
    <div class="flex items-center gap-2 mb-6">
        <a href="{{ route('produk.index') }}" class="text-gray-500 hover:text-[#E00025] mr-2 transition-colors">
            <i class="fas fa-arrow-left text-lg"></i>
        </a>
        <i class="fas fa-box text-black text-lg"></i>
        <h1 class="text-xl font-bold text-gray-900">Tambah Produk Baru</h1>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 relative border border-gray-100 max-w-5xl mx-auto">
        
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-5">
                
                <div class="space-y-5">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">SKU / Kode Barang</label>
                        <input type="text" name="sku" placeholder="Contoh: TAS-001" class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:border-[#E00025] focus:ring-1 focus:ring-[#E00025] transition-shadow">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Kategori</label>
                        <div class="relative">
                            <select name="kategori" class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:border-[#E00025] focus:ring-1 focus:ring-[#E00025] bg-white appearance-none">
                                <option disabled selected>Pilih Kategori</option>
                                <option value="Ransel">Ransel</option>
                                <option value="Pakaian">Pakaian</option>
                                <option value="Aksesoris">Aksesoris</option>
                                <option value="Peralatan">Peralatan Luar Ruangan</option>
                                <option value="Alas Kaki">Alas Kaki</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Harga (Rp)</label>
                        <input type="number" name="harga" placeholder="Contoh: 150000" class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:border-[#E00025] focus:ring-1 focus:ring-[#E00025]">
                    </div>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Nama Produk</label>
                        <input type="text" name="nama_produk" placeholder="Nama Produk Lengkap" class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:border-[#E00025] focus:ring-1 focus:ring-[#E00025]">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Satuan</label>
                        <input type="text" name="satuan" placeholder="Contoh: PCS, Unit" class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:border-[#E00025] focus:ring-1 focus:ring-[#E00025]">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Status Produk</label>
                        <div class="relative">
                            <select name="status" class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:border-[#E00025] focus:ring-1 focus:ring-[#E00025] bg-white appearance-none">
                                <option value="aktif">Aktif</option>
                                <option value="tidak_aktif">Tidak Aktif</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                         <label class="block text-gray-700 font-bold mb-2">Gambar Produk</label>
                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden bg-white">
                            <label class="cursor-pointer bg-gray-200 text-gray-700 px-5 py-2.5 font-bold hover:bg-gray-300 transition-colors border-r border-gray-300 whitespace-nowrap text-xs md:text-sm">
                                Pilih File...
                                <input type="file" name="gambar" class="hidden">
                            </label>
                            <span class="px-4 text-gray-400 italic text-xs truncate">Format JPG, PNG (Max 2MB)</span>
                        </div>
                    </div>

                    <div class="flex gap-3 pt-6">
                        <button type="submit" class="bg-[#E00025] text-white px-8 py-2.5 rounded font-bold hover:bg-red-700 shadow-md flex items-center gap-2 transition-transform active:scale-95">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('produk.index') }}" class="bg-white border border-gray-300 text-gray-700 px-6 py-2.5 rounded font-bold hover:bg-gray-50 flex items-center gap-2 transition-colors">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
    </div>
</div>

@endsection