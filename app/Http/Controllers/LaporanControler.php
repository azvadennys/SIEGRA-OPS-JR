<?php

namespace App\Http\Controllers;

use App\Models\data_kecelakaan;
use App\Models\korban;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'korban' => data_kecelakaan::orderby('created_at', 'desc')->get(),
        ];
        // dd($data);
        return view('admin.laporan.index', $data);
    }
    public function indexKecelakaan()
    {
        $data = [
            'korban' => data_kecelakaan::orderby('created_at', 'desc')->get(),
        ];
        // dd($data);
        return view('admin.laporan.indexKecelakaan', $data);
    }
    public function cetakKecelakaan(Request $request)
    {
        $laporanType = $request->input('laporan_type'); // 'harian', 'bulanan', atau 'tahunan'

        // Validasi input atau tangani kesalahan jika diperlukan

        // Inisialisasi variabel tanggal, bulan, dan tahun dengan nilai default null
        $tanggal = null;
        $bulan_tahun = null;

        // Berdasarkan jenis laporan, dapatkan parameter tanggal, bulan, atau tahun
        if ($laporanType === 'harian') {
            $tanggal = $request->input('tanggal');
            $waktu = date('d F Y', strtotime($tanggal));
        } elseif ($laporanType === 'bulanan') {
            $bulan_tahun = $request->input('bulan');
            $waktu = date('F Y', strtotime($bulan_tahun));
            $rentang = null;
        } elseif ($laporanType === 'rentang') {
            $rentang = $request->input('rentang');

            // dd($rentang);
            $rentangTanggalArray = explode(' - ', $rentang);
            // Menghapus spasi ekstra dari hasil pemisahan
            $startDate = Carbon::createFromFormat('m/d/Y', $rentangTanggalArray[0])->startOfDay();
            $endDate = Carbon::createFromFormat('m/d/Y', $rentangTanggalArray[1])->endOfDay();
            $tanggalAwal = trim($rentangTanggalArray[0]);
            $tanggalAkhir = trim($rentangTanggalArray[1]);

            $waktu = date('d F Y', strtotime($tanggalAwal)) . ' sd ' . date('d F Y', strtotime($tanggalAkhir));
        }
        $query = data_kecelakaan::with(['alamat_tkp.Village.district.regency']);

        if ($request->region == 'village') {
            $type = 'KELURAHAN';
            $query->selectRaw('MAX(data_kecelakaan.id) as id, villages.name as region_name, COUNT(*) as total')
                ->leftJoin('data_alamat', 'data_alamat.data_kecelakaan_id', '=', 'data_kecelakaan.id')
                ->leftJoin('villages', 'data_alamat.villages_id', '=', 'villages.id')
                ->groupBy('villages.name')
                ->orderBy('total', 'desc');
        } elseif ($request->region == 'district') {
            $type = 'KECAMATAN';
            $query->selectRaw('MAX(data_kecelakaan.id) as id,districts.name as region_name, COUNT(*) as total')
                ->leftJoin('data_alamat', 'data_alamat.data_kecelakaan_id', '=', 'data_kecelakaan.id')
                ->leftJoin('villages', 'data_alamat.villages_id', '=', 'villages.id')
                ->leftJoin('districts', 'villages.district_id', '=', 'districts.id')
                ->groupBy('districts.name')
                ->orderBy('total', 'desc');
        } else {
            $type = 'KABUPATEN / KOTA';
            $query->selectRaw('MAX(data_kecelakaan.id) as id,regencies.name as region_name, COUNT(*) as total')
                ->leftJoin('data_alamat', 'data_alamat.data_kecelakaan_id', '=', 'data_kecelakaan.id')
                ->leftJoin('villages', 'data_alamat.villages_id', '=', 'villages.id')
                ->leftJoin('districts', 'villages.district_id', '=', 'districts.id')
                ->leftJoin('regencies', 'districts.regency_id', '=', 'regencies.id')
                ->groupBy('regencies.name')
                ->orderBy('total', 'desc');
        }
        // Apply additional conditions
        if (!is_null($tanggal)) {
            $query->whereDate('data_kecelakaan.created_at', '=', $tanggal);
        }

        if (!is_null($bulan_tahun)) {
            $query->whereYear('data_kecelakaan.created_at', '=', substr($bulan_tahun, 0, 4))
                ->whereMonth('data_kecelakaan.created_at', '=', substr($bulan_tahun, 5, 2));
        }

        if (!is_null($rentang)) {
            $query->whereBetween('data_kecelakaan.created_at', [$startDate, $endDate]);
        }

        $korban = $query->get();

        // dd($korban);
        $data = [
            'korban' => $korban,
            'type' => $type,
            'waktu' => $waktu,
        ];
        // dd($data);
        // Lakukan sesuai dengan kebutuhan Anda, misalnya, kirim data ke view
        return view('admin.laporan.cetakKecelakaan', $data);
    }
    public function cetak(Request $request)
    {
        $laporanType = $request->input('laporan_type'); // 'harian', 'bulanan', atau 'tahunan'

        // Validasi input atau tangani kesalahan jika diperlukan

        // Inisialisasi variabel tanggal, bulan, dan tahun dengan nilai default null
        $tanggal = null;
        $bulan_tahun = null;

        // Berdasarkan jenis laporan, dapatkan parameter tanggal, bulan, atau tahun
        if ($laporanType === 'harian') {
            $tanggal = $request->input('tanggal');
            $waktu = date('d F Y', strtotime($tanggal));
        } elseif ($laporanType === 'bulanan') {
            $bulan_tahun = $request->input('bulan');
            $waktu = date('F Y', strtotime($bulan_tahun));
            $rentang = null;
        } elseif ($laporanType === 'rentang') {
            $rentang = $request->input('rentang');

            // dd($rentang);
            $rentangTanggalArray = explode(' - ', $rentang);
            // Menghapus spasi ekstra dari hasil pemisahan
            $startDate = Carbon::createFromFormat('m/d/Y', $rentangTanggalArray[0])->startOfDay();
            $endDate = Carbon::createFromFormat('m/d/Y', $rentangTanggalArray[1])->endOfDay();
            $tanggalAwal = trim($rentangTanggalArray[0]);
            $tanggalAkhir = trim($rentangTanggalArray[1]);

            $waktu = date('d F Y', strtotime($tanggalAwal)) . ' sd ' . date('d F Y', strtotime($tanggalAkhir));
        }
        // dd($request);


        // Query menggunakan Eloquent Query Builder dengan kondisi dinamis
        $query = data_kecelakaan::groupBy('status')->select('status', DB::raw('count(*) as total'), DB::raw('sum(nominal_santunan) as total_santunan'));

        if (!is_null($tanggal)) {
            $query->whereDate('created_at', '=', $tanggal);
        }

        if (!is_null($bulan_tahun)) {
            $query->whereYear('created_at', '=', substr($bulan_tahun, 0, 4))
                ->whereMonth('created_at', '=', substr($bulan_tahun, 5, 2));
        }
        if (!is_null($rentang)) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $korban = $query->get();

        // dd($korban);
        $data = [
            'korban' => $korban,
            'waktu' => $waktu,
        ];
        // dd($data);
        // Lakukan sesuai dengan kebutuhan Anda, misalnya, kirim data ke view
        return view('admin.laporan.cetak', $data);
    }

    public function laporanWord()
    {
    }
}
