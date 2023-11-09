<?php

namespace App\Http\Controllers;

use App\Models\data_kecelakaan;
use App\Models\korban;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $query = data_kecelakaan::query();

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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $korban = $request->all();
        data_kecelakaan::create($korban);
        // session()->flash('success', 'Data added successfully!');
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function show(data_kecelakaan $korban, $id)
    {
        $data = [
            'korban' => data_kecelakaan::find($id),
        ];
        // dd($data);
        return view('show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function edit(data_kecelakaan $korban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, data_kecelakaan $korban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function destroy(data_kecelakaan $korban)
    {
        //
    }
}
