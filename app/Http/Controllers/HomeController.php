<?php

namespace App\Http\Controllers;

use App\Models\data_kecelakaan;
use App\Models\data_kendaraan_model;
use App\Models\korban;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = [
            "hariIni" => HomeController::rekapHariIni(),
            "bulanIni" => HomeController::rekapBulanIni(),
            "tahunIni" => HomeController::rekapTahunIni(),
            "seluruh" => HomeController::rekapSeluruh(),
            "KorbanTahunIni" => HomeController::KorbanTahunIni(),
            "SantunanTahunIni" => HomeController::SantunanTahunIni(),
            'totalKendaraan' => data_kendaraan_model::count(),
            'totalKecelakaan' => data_kecelakaan::count(),
            "title" => 'Dashboard',

        ];
        // dd($data);
        return view('pages.dashboard', $data);
    }

    public function KorbanTahunIni()
    {
        // Mengambil data dari tabel korbans untuk tahun ini
        $tahunIni = now()->year;
        $dataTahunIni = data_kecelakaan::whereYear('created_at', $tahunIni)->get();

        // Menghitung total biaya, diskon, dan setelah_diskon
        $totalKorban = $dataTahunIni->count();

        $response = [
            'totalKorban' => $totalKorban,
            'tanggal' => 'TAHUN INI (' . date('Y', strtotime($tahunIni)) . ')'
        ];

        return $response;;
    }
    public function SantunanTahunIni()
    {
        $tahunIni = now()->year;
        $totalSantunan = data_kecelakaan::whereYear('created_at', $tahunIni)->sum('nominal_santunan');


        $response = [
            'totalSantunan' => $totalSantunan,
            'tanggal' => 'TAHUN INI (' . date('Y', strtotime($tahunIni)) . ')'
        ];

        return $response;;
    }
    public function totalKendaraan()
    {
        $totalKendaraan = data_kendaraan_model::count();

        $response = [
            'totalKendaraan' => $totalKendaraan,
            // 'tanggal' => 'TAHUN INI (' . date('Y', strtotime($tahunIni)) . ')'
        ];

        return $response;;
    }
    public function rekapHariIni()
    {
        // Mengambil data dari tabel korbans untuk hari ini
        $hariIni = now()->format('Y-m-d');
        $dataHariIni = data_kecelakaan::whereDate('created_at', $hariIni)->get();

        // Menghitung total biaya, diskon, dan setelah_diskon
        $totalBiaya = $dataHariIni->sum('biaya');
        $totalDiskon = $dataHariIni->sum('diskon');
        $totalSetelahDiskon = $dataHariIni->sum('setelah_diskon');

        $response = [
            'dataHariIni' => $dataHariIni,
            'totalBiaya' => $totalBiaya,
            'totalDiskon' => $totalDiskon,
            'totalSetelahDiskon' => $totalSetelahDiskon,
            'tanggal' => 'Hari Ini (' . date('d F Y', strtotime($hariIni)) . ')',
        ];

        return $response;;
    }

    public function rekapBulanIni()
    {
        // Mengambil data dari tabel korbans untuk bulan ini
        $bulanIni = now()->format('Y-m');
        $dataBulanIni = data_kecelakaan::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->get();

        // Menghitung total biaya, diskon, dan setelah_diskon
        $totalBiaya = $dataBulanIni->sum('biaya');
        $totalDiskon = $dataBulanIni->sum('diskon');
        $totalSetelahDiskon = $dataBulanIni->sum('setelah_diskon');

        $response = [
            'dataBulanIni' => $dataBulanIni,
            'totalBiaya' => $totalBiaya,
            'totalDiskon' => $totalDiskon,
            'totalSetelahDiskon' => $totalSetelahDiskon,
            'tanggal' => 'Bulan Ini (' . date('F Y', strtotime($bulanIni)) . ')'
        ];

        return $response;;
    }

    public function rekapTahunIni()
    {
        // Mengambil data dari tabel korbans untuk tahun ini
        $tahunIni = now()->year;
        $dataTahunIni = data_kecelakaan::whereYear('created_at', $tahunIni)->get();

        // Menghitung total biaya, diskon, dan setelah_diskon
        $totalBiaya = $dataTahunIni->sum('biaya');
        $totalDiskon = $dataTahunIni->sum('diskon');
        $totalSetelahDiskon = $dataTahunIni->sum('setelah_diskon');

        $response = [
            'dataTahunIni' => $dataTahunIni,
            'totalBiaya' => $totalBiaya,
            'totalDiskon' => $totalDiskon,
            'totalSetelahDiskon' => $totalSetelahDiskon,
            'tanggal' => 'Tahun Ini (' . date('Y', strtotime($tahunIni)) . ')'
        ];

        return $response;;
    }

    public function rekapSeluruh()
    {
        $dataSeluruh = data_kecelakaan::all();

        // Menghitung total biaya, diskon, dan setelah_diskon
        $totalBiaya = $dataSeluruh->sum('biaya');
        $totalDiskon = $dataSeluruh->sum('diskon');
        $totalSetelahDiskon = $dataSeluruh->sum('setelah_diskon');

        $response = [
            'dataSeluruh' => $dataSeluruh,
            'totalBiaya' => $totalBiaya,
            'totalDiskon' => $totalDiskon,
            'totalSetelahDiskon' => $totalSetelahDiskon,
            'tanggal' => 'Seluruhnya'
        ];

        return $response;;
    }
}
