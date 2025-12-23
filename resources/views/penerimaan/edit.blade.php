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
        .col-nama { width: 15%; }
        .col-kategori { width: 10%; }
        .col-surat { width: 12%; }
        .col-diterima { width: 12%; }
        .col-kondisi { width: 12%; }
        .col-aksi { width: 7%; }

        .custom-modal {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.4);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.custom-modal-box {
    background: #fff;
    width: 400px;
    border-radius: 10px;
    overflow: hidden;
    animation: modalFade 0.2s ease;
}

.custom-modal-header {
    padding: 12px 16px;
    font-weight: 600;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #ddd;
}

.custom-modal-body {
    padding: 16px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.custom-modal-body input {
    padding: 6px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.custom-modal-footer {
    padding: 12px 16px;
    text-align: right;
    border-top: 1px solid #ddd;
}

.btn-cancel {
    padding: 6px 12px;
    background: #ccc;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.btn-save {
    padding: 6px 12px;
    background: #E6091A;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

@keyframes modalFade {
    from { transform: scale(0.95); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

    </style>
</head>
<body>
<x-navbar />

<div class="layout">
    <x-sidebar />

    <div class="content">
        <h4>Edit Penerimaan Stok</h4>

        <div class="layout" style="margin-top:10px;gap:20px">
            <div class="card" style="width:60%">
                <p>Informasi Penerimaan</p>
               <input type="hidden" id="penerimaan_id" value="{{ $penerimaan->id_penerimaan }}">

                <div style="margin-top:20px">
                    <p style="font-size:14px">No. Surat Jalan</p>
                    <input required id="no_surat_jalan" type="text" value="{{ $penerimaan->no_surat_jalan }}" placeholder="Tuliskan nomor surat jalan" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">
                </div>

                <div style="margin-top:10px">
                    <p style="font-size:14px">Tanggal Penerimaan</p>
                    <input required id="tanggal_penerimaan" type="date" value="{{ $penerimaan->tanggal_terima }}" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">
                </div>

                <div style="margin-top:10px">
                    <p style="font-size:14px">Catatan</p>
                    <textarea id="catatan" class="input-catatan" placeholder="Tuliskan catatan">{{ $penerimaan->catatan }}</textarea>
                </div>
            </div>

            <div class="card" style="width:100%">
                <p style="text-align:center">Tambah Produk Diterima</p>

                <div style="margin-top:20px;display:flex;gap:20px">
                    <div style="width:100%">
                        <p style="font-size:14px">SKU</p>
                        <input required id="sku" type="text" placeholder="Tuliskan SKU" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">

                        <div style="margin-top:10px">
                            <p style="font-size:14px">Nama Produk</p>
                            <select id="produk_id" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">
                                <option value="">Pilih Produk</option>
                                @foreach ($produk as $p)
                                    <option value="{{ $p->id_produk }}">{{ $p->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div style="margin-top:10px">
                            <p style="font-size:14px">Jumlah Surat Jalan</p>
                            <input required id="jumlah_surat_jalan" type="number" placeholder="Tuliskan Jumlah Surat Jalan" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">
                        </div>
                    </div>

                    <div style="width:100%">
                        <p style="font-size:14px">Jumlah Diterima</p>
                        <input required id="jumlah_diterima" type="number" placeholder="Tuliskan Jumlah Diterima" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">

                        <div style="margin-top:10px">
                            <p style="font-size:14px">Kondisi</p>
                            <input required id="kondisi" type="text" placeholder="Tuliskan Kondisi" style="width:100%;border:1px solid #000;padding:6px;border-radius:5px">
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
            <button onclick="editPenerimaan({{ $penerimaan->id_penerimaan }})" type="button" style="display: flex; flex-direction: row; gap: 10px; background-color: #E6091A; color: #fff; padding: 10px; align-items: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px; border: none; cursor: pointer; transition: all 0.3s ease;">
    <img src="{{ asset('images/btn-simpan.png') }}" alt="Simpan" style="width: 20px; height: 20px;">
    <span style="font-size: 14px; font-weight: 500;">Simpan Perubahan</span>
    </button>

            <!-- <button onclick="simpanDraft()" style="background:#F7F98A;color:#000;padding:10px;border-radius:15px;border:1px solid #000;cursor:pointer;align-items: center;display: flex; gap: 6px;">
                <img src="{{ asset('images/btn-draft.png') }}" alt="Draft" style="width: 20px; height: 20px;">
                <span style="font-size: 14px; font-weight: 500;">Simpan Draft</span>
            </button> -->
        </div>

        <h4 style="margin-top:4px;margin-bottom:10px">Daftar Penerimaan</h4>

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
    @forelse ($penerimaan->detail as $detail)
        <tr>
            <td class="col-sku">
                {{ $detail->sku ?? '-' }}
            </td>

            <td class="col-nama">
                {{ $detail->produk->nama_produk ?? '-' }}
            </td>

            <td class="col-kategori">
                {{ $detail->produk->kategori ?? '-' }}
            </td>

            <td class="col-surat">
                {{ $detail->jumlah_surat_jalan }}
            </td>

            <td class="col-diterima">
                {{ $detail->jumlah_diterima }}
            </td>

            <td class="col-kondisi">
                {{ $detail->kondisi }}
            </td>

            <td class="col-aksi">
    <div style="display:flex; gap:10px">
        <button
            style="background:none;border:none;cursor:pointer"
            onclick="openEditModal(
                {{ $detail->id_detail_penerimaan }},
                {{ $detail->jumlah_surat_jalan }},
                {{ $detail->jumlah_diterima }},
                '{{ e($detail->kondisi) }}'
            )">
            <img src="{{ asset('images/pencil-icon.png') }}" style="width:20px;height:20px">
        </button>

        <button style="background:none;border:none;cursor:pointer" onclick="confirmHapusDetail({{ $detail->id_detail_penerimaan }})">
            <img src="{{ asset('images/trash-icon.png') }}" style="width:20px;height:20px">
        </button>
    </div>
</td>

        </tr>
    @empty
        <tr>
            <td colspan="7" style="height:160px;color:#999;text-align:center">
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

<div id="editDetailModal" class="custom-modal" onclick="outsideClose(event)">
    <div class="custom-modal-box">

        <div class="custom-modal-header">
            <span>Edit Detail Produk</span>
            <button style="background:none;border:none;cursor:pointer" type="button" class="close-btn" onclick="closeEditModal()">
                <img style="width:10px;height:10px" src="{{ asset('images/x-btn.png') }}" alt="Close">
            </button>
        </div>

        <div class="custom-modal-body">
            <input type="hidden" id="edit_detail_id">

            <label>Jumlah Surat Jalan</label>
            <input type="number" id="edit_jumlah_surat_jalan">

            <label>Jumlah Diterima</label>
            <input type="number" id="edit_jumlah_diterima">

            <label>Kondisi</label>
            <input type="text" id="edit_kondisi">
        </div>

        <div class="custom-modal-footer">
            <button class="btn-cancel" onclick="closeEditModal()">Batal</button>
            <button class="btn-save" onclick="updateDetail()">Simpan</button>
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

function editPenerimaan(penerimaanId) {
    fetch(`/penerimaan/${penerimaanId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf
        },
        body: JSON.stringify({
            no_surat_jalan: document.getElementById('no_surat_jalan').value,
            tanggal_penerimaan: document.getElementById('tanggal_penerimaan').value,
            catatan: document.getElementById('catatan').value
        })
    })
    .then(async res => {
        const data = await res.json();
        if (!res.ok) throw data;
        return data;
    })
    .then(res => {
        alert(res.message);
        window.location.href = '/penerimaan';
    })
    .catch(err => {
        console.error(err);
        alert(err.message ?? 'Gagal edit penerimaan');
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

function confirmHapusDetail(detailId) {
    if (!confirm('Yakin ingin menghapus detail ini?')) return;

    fetch(`/penerimaan/detail/${detailId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrf
        }
    })
    .then(res => {
        if (!res.ok) throw new Error('Gagal hapus');
        return res.json();
    })
    .then(res => {
        alert(res.message);
        location.reload();
    })
    .catch(() => {
        alert('Terjadi kesalahan saat menghapus');
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


function openEditModal(id, sj, diterima, kondisi) {
    document.getElementById('edit_detail_id').value = id;
    document.getElementById('edit_jumlah_surat_jalan').value = sj;
    document.getElementById('edit_jumlah_diterima').value = diterima;
    document.getElementById('edit_kondisi').value = kondisi;

    document.getElementById('editDetailModal').style.display = 'flex';
}

function closeEditModal() {
    document.getElementById('editDetailModal').style.display = 'none';
}

function outsideClose(e) {
    if (e.target.id === 'editDetailModal') {
        closeEditModal();
    }
}

function updateDetail() {
    const id = document.getElementById('edit_detail_id').value;

    fetch(`/penerimaan/detail/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf
        },
        body: JSON.stringify({
            jumlah_surat_jalan: document.getElementById('edit_jumlah_surat_jalan').value,
            jumlah_diterima: document.getElementById('edit_jumlah_diterima').value,
            kondisi: document.getElementById('edit_kondisi').value
        })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        closeEditModal();
        location.reload();
    })
    .catch(err => {
        console.error(err);
        alert('Gagal update detail');
    });
}
</script>

</body>
</html>
