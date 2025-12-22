<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penerimaan Barang</title>
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

        .input-catatan {
            resize: none;
            padding: 10px 12px;
            width: 100%;
            border: 1px solid #000;
            border-radius: 5px;
            font-size: 14px;
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

        .col-sku { width: 12%; }
        .col-nama { width: 35%; }
        .col-kategori { width: 10%; }
        .col-surat { width: 12%; }
        .col-diterima { width: 12%; }
        .col-kondisi { width: 12%; }
        .col-aksi { width: 7%; }
    </style>
</head>
<body>
<x-navbar />

<div class="layout">
    <x-sidebar />

    <div class="content">
        <h4>Penerimaan Stok</h4>

        <div class="layout" style="margin-top:10px;gap:20px">
            <div class="card" style="width:60%">
                <p>Informasi Penerimaan</p>
                <input type="hidden" id="penerimaan_id">

                <div style="margin-top:20px">
                    <p>No. Surat Jalan</p>
                    <input id="no_surat_jalan" type="text" placeholder="Tuliskan nomor surat jalan" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">
                </div>

                <div style="margin-top:10px">
                    <p>Tanggal Penerimaan</p>
                    <input id="tanggal_penerimaan" type="date" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">
                </div>

                <div style="margin-top:10px">
                    <p>Catatan</p>
                    <textarea id="catatan" class="input-catatan" placeholder="Tuliskan catatan"></textarea>
                </div>
            </div>

            <div class="card" style="width:100%">
                <p style="text-align:center">Tambah Produk Diterima</p>

                <div style="margin-top:20px;display:flex;gap:20px">
                    <div style="width:100%">
                        <p>SKU</p>
                        <input id="sku" type="text" placeholder="Tuliskan SKU" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">

                        <div style="margin-top:10px">
                            <p>Nama Produk</p>
                            <select id="produk_id" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">
                                <option value="">Pilih Produk</option>
                                @foreach ($produk as $p)
                                    <option value="{{ $p->id_produk }}">{{ $p->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div style="margin-top:10px">
                            <p>Jumlah Surat Jalan</p>
                            <input id="jumlah_surat_jalan" type="number" placeholder="Tuliskan Jumlah Surat Jalan" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">
                        </div>
                    </div>

                    <div style="width:100%">
                        <p>Jumlah Diterima</p>
                        <input id="jumlah_diterima" type="number" placeholder="Tuliskan Jumlah Diterima" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">

                        <div style="margin-top:10px">
                            <p>Kondisi</p>
                            <input id="kondisi" type="text" placeholder="Tuliskan Kondisi" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">
                        </div>
                    </div>
                </div>

                <div style="margin-top:10px">
                    <button onclick="tambahDetail()" style="background:#E6091A;color:#fff;padding:6px 30px;border:none;border-radius:8px;cursor:pointer">
                        Tambah
                    </button>
                </div>
            </div>
        </div>

        <div style="margin-top:10px;display:flex;justify-content:end;gap:20px">
            <button onclick="simpanPenerimaan()" style="background:#E6091A;color:#fff;padding:10px;border:none;border-radius:15px;cursor:pointer">
                Simpan Penerimaan
            </button>

            <button onclick="simpanDraft()" style="background:#F7F98A;color:#000;padding:10px;border-radius:15px;border:1px solid #000;cursor:pointer">
                Simpan Draft
            </button>
        </div>

        <h4 style="margin-top:20px">Daftar Penerimaan</h4>

        <div class="card" style="height:235px">
            <div class="table-wrapper">
                <div class="table-header">
                    <table>
                        <thead>
                        <tr>
                            <th class="col-sku">SKU</th>
                            <th class="col-nama">Nama Produk</th>
                            <th class="col-kategori">Kategori</th>
                            <th class="col-surat">Jumlah Surat Jalan</th>
                            <th class="col-diterima">Jumlah Diterima</th>
                            <th class="col-kondisi">Kondisi</th>
                            <th class="col-aksi">Aksi</th>
                        </tr>
                        </thead>
                    </table>
                </div>

                <div class="table-body">
                    <table>
                        <tbody id="table-penerimaan-body">
                            <tr>
                                <td colspan="7" style="height:160px;color:#999">Data masih kosong</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
const csrf = '{{ csrf_token() }}';

function simpanDraft() {
    fetch('/penerimaan/draft', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            id_admin: 1,
            id_produk: document.getElementById('produk_id').value,
            no_surat_jalan: document.getElementById('no_surat_jalan').value,
            tanggal_terima: document.getElementById('tanggal_penerimaan').value,
            catatan: document.getElementById('catatan').value,
            status: 'draft'
        })
    })
    .then(async res => {
        const data = await res.json();
        if (!res.ok) throw data;
        return data;
    })
    .then(res => {
        document.getElementById('penerimaan_id').value = res.data.id_penerimaan;
        alert(res.message);
    })
    .catch(err => {
        console.error(err);
        alert(err.message ?? 'Terjadi kesalahan');
    });
}

function tambahDetail() {
    const penerimaanId = document.getElementById('penerimaan_id').value;
    if (!penerimaanId) {
        alert('Simpan draft dulu');
        return;
    }

    fetch(`/penerimaan/${penerimaanId}/detail`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf
        },
        body: JSON.stringify({
            id_produk: document.getElementById('produk_id').value,
            sku: document.getElementById('sku').value,
            jumlah_surat_jalan: document.getElementById('jumlah_surat_jalan').value,
            jumlah_diterima: document.getElementById('jumlah_diterima').value,
            kondisi: document.getElementById('kondisi').value
        })
    })
    .then(async res => {
        const data = await res.json();
        if (!res.ok) throw data;
        return data;
    })
    .then(() => loadDetail(penerimaanId))
    .catch(err => {
        console.error(err);
        alert(err.message ?? 'Gagal tambah detail');
    });
}

function loadDetail(id) {
    fetch(`/penerimaan/${id}`, {
        headers: { 'Accept': 'application/json' }
    })
    .then(async res => {
        const data = await res.json();
        if (!res.ok) throw data;
        return data;
    })
    .then(res => {
        let html = '';
        res.detail.forEach(d => {
            html += `
                <tr>
                    <td class="col-sku">${d.sku}</td>
                    <td class="col-nama">${d.produk.nama_produk}</td>
                    <td class="col-kategori">${d.produk.kategori}</td>
                    <td class="col-surat">${d.jumlah_surat_jalan}</td>
                    <td class="col-diterima">${d.jumlah_diterima}</td>
                    <td class="col-kondisi">${d.kondisi}</td>
                    <td class="col-aksi">
                        <div style="display:flex; gap:10px">
                            <div>
                                <img src="{{ asset('images/pencil-icon.png') }}" style="width:20px;height:20px">
                            </div>
                            <div>
                                <img src="{{ asset('images/trash-icon.png') }}" style="width:20px;height:20px">
                            </div>
                        </div>
                    </td>
                </tr>
            `;
        });

        document.getElementById('table-penerimaan-body').innerHTML = html;

        ['sku', 'jumlah_surat_jalan', 'jumlah_diterima', 'kondisi', 'produk_id'].forEach(i => {
            const el = document.getElementById(i);
            if (!el) return;
            if (el.tagName === 'SELECT') el.selectedIndex = 0;
            else el.value = '';
        });
    })
    .catch(err => {
        console.error(err);
        alert('Gagal load detail');
    });
}

function hapusDetail(detailId, penerimaanId) {
    fetch(`/penerimaan/detail/${detailId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrf,
            'Accept': 'application/json'
        }
    })
    .then(async res => {
        if (!res.ok) throw await res.json();
        return res.json();
    })
    .then(() => loadDetail(penerimaanId))
    .catch(err => {
        console.error(err);
        alert('Gagal hapus detail');
    });
}

function simpanPenerimaan() {
    const id = document.getElementById('penerimaan_id').value;
    if (!id) return alert('Belum ada draft');
    if (!confirm('Yakin simpan penerimaan?')) return;

    fetch(`/penerimaan/${id}/finalize`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrf,
            'Accept': 'application/json'
        }
    })
    .then(async res => {
        const data = await res.json();
        if (!res.ok) throw data;
        return data;
    })
    .then(res => {
        window.location.href = '/penerimaan';
    })
    .catch(err => {
        console.error(err);
        alert(err.message ?? 'Gagal finalize');
    });
}
</script>

</body>
</html>
