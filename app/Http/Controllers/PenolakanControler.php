<?php

namespace App\Http\Controllers;

use App\Models\data_alamat;
use App\Models\data_kecelakaan;
use App\Models\data_kendaraan;
use App\Models\data_kendaraan_model;
use App\Models\Village;
use Illuminate\Http\Request;

class PenolakanControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexPenolakan()
    {
        $data = [
            'korban' => data_kecelakaan::where('pelanggaran', '!=', '["0"]')->orderby('created_at', 'desc')->get(),
        ];
        // dd($data);
        return view('admin.laporan.penolakan', $data);
    }
}
