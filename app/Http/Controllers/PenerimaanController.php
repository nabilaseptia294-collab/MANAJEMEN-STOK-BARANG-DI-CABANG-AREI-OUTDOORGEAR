<?php

namespace App\Http\Controllers;

use App\Models\penerimaan_barang as Penerimaan;
use App\Models\detail_penerimaan as PenerimaanDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenerimaanController extends Controller
{

    public function index()
    {
        return view('penerimaan.index', [
            'penerimaan' => Penerimaan::all()
        ]);
    }

    public function create()
{
    return view('penerimaan.tambah', [
        'produk' => Produk::all()
    ]);
}

    /**
     * Simpan penerimaan sebagai DRAFT
     */
    public function storeDraft(Request $request)
    {
        $request->validate([
            'no_surat_jalan' => 'required',
            'tanggal_terima' => 'required|date',
        ]);

        $penerimaan = Penerimaan::create([
            'id_admin' => $request->id_admin,
            'id_produk' => $request->id_produk,
            'no_penerimaan' => $this->generatePenerimaanNumber(),
            'no_surat_jalan' => $request->no_surat_jalan,
            'tanggal_terima' => $request->tanggal_terima,
            'catatan' => $request->catatan,
            'status' => 'draft',
        ]);

        return response()->json([
            'message' => 'Draft penerimaan berhasil disimpan',
            'data' => $penerimaan
        ]);
    }

    /**
     * Tambah produk ke penerimaan (detail)
     */
    public function addDetail(Request $request, $penerimaanId)
    {
        $request->validate([
            'id_produk' => 'required|exists:products,id_produk',
            'sku' => 'required',
            'jumlah_surat_jalan' => 'required|integer|min:0',
            'jumlah_diterima' => 'required|integer|min:0',
            'kondisi' => 'required',
        ]);

        $detail = PenerimaanDetail::create([
            'id_penerimaan' => $penerimaanId,
            'id_produk' => $request->id_produk,
            'sku' => $request->sku,
            'jumlah_surat_jalan' => $request->jumlah_surat_jalan,
            'jumlah_diterima' => $request->jumlah_diterima,
            'kondisi' => $request->kondisi,
        ]);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'data' => $detail
        ]);
    }

    /**
     * Hapus produk dari penerimaan
     */
    public function deleteDetail($id)
    {
        PenerimaanDetail::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Detail produk berhasil dihapus'
        ]);
    }

    /**
     * Simpan FINAL dan update stok
     */
    public function finalize($id)
    {
        DB::transaction(function () use ($id) {

            $penerimaan = Penerimaan::with('detail')->lockForUpdate()->findOrFail($id);

            if ($penerimaan->status === 'final') {
                throw new \Exception('Penerimaan sudah difinalisasi');
            }

            $penerimaan->update([
                'status' => 'final'
            ]);
        });

        return response()->json([
            'message' => 'Penerimaan berhasil disimpan.'
        ]);
    }

    /**
     * Detail penerimaan
     */
    public function show($id)
    {
        $penerimaan = Penerimaan::with(['detail.produk'])->findOrFail($id);

        return response()->json($penerimaan);
    }

    private function generatePenerimaanNumber()
    {
    $now = Carbon::now();
    $month = $now->format('m');
    $year = $now->format('y');

    $last = Penerimaan::whereMonth('created_at', $now->month)
        ->whereYear('created_at', $now->year)
        ->orderBy('id_penerimaan', 'desc')
        ->first();

    if ($last) {
        $lastNumber = intval(substr($last->no_penerimaan, -3));
        $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
    } else {
        $nextNumber = '001';
    }

    return "PNM-{$month}-{$year}-{$nextNumber}";
}
}
