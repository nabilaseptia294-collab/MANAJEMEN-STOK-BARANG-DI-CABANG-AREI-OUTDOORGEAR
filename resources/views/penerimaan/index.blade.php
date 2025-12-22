<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerimaan Barang</title>

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
            padding: 20px;
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .action-buttons {
            display: flex;
            gap: 16px;
            margin-bottom: 30px;
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
        }

        .btn-action:hover {
            opacity: 0.9;
        }

        .tab-menu {
            display: flex;
            width: 100%;
            margin-top: 10px;
        }

        .tab-item {
            flex: 1;
            text-align: center;
            padding: 14px 0;
            font-weight: 600;
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
        .col-surat { width: 10%; }
        .col-penerimaan { width: 12%; }
        .col-tanggal { width: 12%; }
        .col-aksi { width: 7%; }
    </style>
</head>

<body>
    <x-navbar />

    <div class="layout">
        <x-sidebar />

        <div class="content">
            <h4>Operasional Gudang</h4>

            <div class="layout" style="margin-top: 10px; gap: 20px;">
                <div class="card">
                    <div class="action-buttons">
                        <button class="btn-action">+ Buat Permintaan</button>
                        <a style="text-decoration: none;font-size: 14px;" href="/penerimaan/tambah" class="btn-action">+ Tambah Penerimaan</a>
                        <button class="btn-action">Pengelolaan Stok</button>
                    </div>

                    <div class="tab-menu">
                        <div class="tab-item">Riwayat Permintaan</div>
                        <div class="tab-item active">Riwayat Penerimaan</div>
                        <div class="tab-item">Stok</div>
                    </div>
                </div>
            </div>

            <div class="search-wrapper">
                <input type="text" placeholder="Cari Nomor Penerimaan">
            </div>

            <div class="card" style="height:345px; margin-top:20px">
            <div class="table-wrapper">
    <div class="table-header">
        <table>
            <thead>
                <tr>
                    <th class="col-no">No</th>
                    <th class="col-surat">No. Surat Jalan</th>
                    <th class="col-penerimaan">No. Penerimaan</th>
                    <th class="col-tanggal">Tanggal Penerimaan</th>
                    <th class="col-aksi">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="table-body">
        <table>
            <tbody id="table-penerimaan-body">
                @forelse ($penerimaan as $i => $p)
                    <tr>
                        <td class="col-no">{{ $i + 1 }}</td>
                        <td class="col-surat">{{ $p->no_surat_jalan }}</td>
                        <td class="col-penerimaan">{{ $p->no_penerimaan }}</td>
                        <td class="col-tanggal">
                            {{ \Carbon\Carbon::parse($p->tanggal_terima)->format('d-m-Y') }}
                        </td>
                        <td class="col-aksi">
                            <div style="display:flex;gap:10px;justify-content:center">
                                <a >
                                    <img src="{{ asset('images/pencil-icon.png') }}" width="20">
                                </a>
                                <a >
                                    <img src="{{ asset('images/trash-icon.png') }}" width="20">
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="height:260px;color:#999;text-align:center">
                            Data masih kosong
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
</body>
</html>
