<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penerimaan Barang</title>

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

        .col-sku { width: 1%; }
        .col-nama { width: 10%; }
        .col-kategori { width: 12%; }
        .col-jumlah { width: 12%; }
        .col-satuan { width: 7%; }
    </style>
</head>

<body>
    <x-navbar />

    <div class="layout">
        <x-sidebar />

        <div class="content">
            <div class="layout" style="margin-top: 10px; gap: 20px;">
                <div class="card" style="padding:20px">
    <h4>Detail Penerimaan</h4>
    <div style="display: grid; grid-template-columns: auto 1fr; gap: 12px 20px; font-size: 14px; align-items: start; margin-top: 16px;">
        @if($penerimaan)
        <span style="grid-column: 1;">No. Surat Jalan</span>
        <span style="grid-column: 2;">: &nbsp {{ $penerimaan->no_surat_jalan }}</span>
        
        <span style="grid-column: 1;">Tanggal Penerimaan</span>
        <span style="grid-column: 2;">: &nbsp {{ $penerimaan->tanggal_terima }}</span>
        
        <span style="grid-column: 1;">Catatan</span>
        <span style="grid-column: 2;">: &nbsp {{ $penerimaan->catatan }}</span>
        @endif
    </div>
</div>
            </div>
<h4 style="margin-top:24px;margin-bottom:8px">Daftar Penerimaan</h4>

            <div class="card" style="height:345px; margin-top:20px;padding:20px">
            <div class="table-wrapper">
    <div class="table-header">
        <table>
            <thead>
                <tr>
                    <th class="col-sku">SKU</th>
                    <th class="col-nama">Nama Produk</th>
                    <th class="col-kategori">Kategori</th>
                    <th class="col-jumlah">Jumlah</th>
                    <th class="col-satuan">Satuan</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="table-body">
        <table>
            <tbody id="table-penerimaan-body">
                @forelse ($penerimaan->detail as $i => $detail)
            <tr>
                <td class="col-sku">{{ $detail->sku }}</td>
                <td class="col-nama">{{ $detail->produk->nama_produk ?? '-' }}</td>
                <td class="col-kategori">{{ $detail->produk->kategori ?? '-' }}</td>
                <td class="col-jumlah">{{ $detail->jumlah_diterima }}</td>
                <td class="col-satuan">{{ $detail->produk->satuan ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Tidak ada barang dalam penerimaan ini</td>
            </tr>
        @endforelse

            </tbody>
        </table>
    </div>
</div>

        </div>
        </div>
    </div>
</body>
</html>
