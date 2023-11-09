<?php

namespace App\Http\Controllers;

use App\Models\data_alamat;
use App\Models\data_kecelakaan;
use App\Models\data_kendaraan;
use App\Models\Village;
use Illuminate\Http\Request;

class DataKecelakaanControler extends Controller
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
        return view('admin.korban.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            // 'anggota' => data_kecelakaan::orderby('created_at', 'desc')->get(),
            'kelurahan' => Village::with(['district', 'district.regency', 'district.regency.province'])->whereHas('district.regency.province', function ($query) {
                $query->where('name', 'BENGKULU');
            })->get(),
            'kendaraan' => data_kendaraan::all(),
            'asal_berkas' => data_kecelakaan::distinct()->pluck('asal_berkas'),
            'instansi' => data_kecelakaan::distinct()->pluck('asal_berkas'),
            'samsat' => data_kecelakaan::distinct()->pluck('asal_berkas'),
        ];
        // dd($data['kelurahan']);
        return view('admin.korban.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nopol' => 'required',
                'pembuat_laporan' => 'required',
                'kel_tkp' => 'required',
                'kel_korban' => 'required',
                'kasus_laka' => 'required',
                'pelanggaran' => 'required',
            ],
            [
                'nopol.required' => 'Nomor Polisi Harus Diisi',
                'pembuat_laporan.required' => 'Pembuat Laporan Harus Diisi',
                'kel_tkp.required' => 'Kelurahan, Kecamatan & Kab/Kota TKP Harus Diisi',
                'kel_korban.required' => 'Kelurahan, Kecamatan & Kab/Kota Korban Harus Diisi',
                'kasus_laka.required' => 'Kasus Laka Harus Diisi',
                'pelanggaran.required' => 'Kesimpulan Pelanggaran Harus Diisi',
            ]
        );
        // dd($request);
        // $kecelakaan = $request->all();
        $kecelakan_id = data_kecelakaan::create([
            'nopol' => $request->nopol,
            'asal_berkas' => $request->asal_berkas,
            'instansi' => $request->instansi,
            'samsat' => $request->samsat,
            'pembuat_laporan' => $request->pembuat_laporan,
            'tgl_laporan' => $request->tgl_laporan,
            'no_laporan' => $request->no_laporan,
            'petugas' => $request->petugas,
            'nama_korban' => $request->nama_korban,
            'tgl_kejadian' => $request->tgl_kejadian,
            'kasus_laka' => $request->kasus_laka,
            'uraian_singkat' => $request->uraian_singkat,
            'no_hp' => $request->no_hp,
            'status' => $request->status,
            'cidera' => $request->cidera,
            'nominal_santunan' => $request->nominal_santunan,
            'pelanggaran' => json_encode($request->pelanggaran),
        ])->id;

        data_alamat::create([
            'alamat' => $request->alamat_tkp,
            'data_kecelakaan_id' => $kecelakan_id,
            'villages_id' => $request->kel_tkp,
            'jenis' => 'tkp',
        ]);

        data_alamat::create([
            'alamat' => $request->alamat_korban,
            'data_kecelakaan_id' => $kecelakan_id,
            'villages_id' => $request->kel_korban,
            'jenis' => 'korban',
        ]);
        // dd($kecelakan_id);
        // session()->flash('success', 'Data added successfully!');
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function show(data_kecelakaan $data_kecelakaan, $id)
    {
        $data = [
            'data' => data_kecelakaan::with(['alamat_tkp', 'alamat_korban'])->where('id', $id)->first(),
            'kelurahan' => Village::with(['district', 'district.regency', 'district.regency.province'])->whereHas('district.regency.province', function ($query) {
                $query->where('name', 'BENGKULU');
            })->get(),
            'kendaraan' => Data_Kendaraan::all(),
            'asal_berkas' => data_kecelakaan::distinct()->pluck('asal_berkas'),
            'instansi' => data_kecelakaan::distinct()->pluck('asal_berkas'),
            'samsat' => data_kecelakaan::distinct()->pluck('asal_berkas'),
        ];
        // dd($data['data']);
        return view('admin.korban.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function edit(data_kecelakaan $korban, $id)
    {
        $data = [
            'data' => data_kecelakaan::with(['alamat_tkp', 'alamat_korban'])->where('id', $id)->first(),
            'kelurahan' => Village::with(['district', 'district.regency', 'district.regency.province'])->whereHas('district.regency.province', function ($query) {
                $query->where('name', 'BENGKULU');
            })->get(),
            'kendaraan' => data_kendaraan::all(),
            'asal_berkas' => data_kecelakaan::distinct()->pluck('asal_berkas'),
            'instansi' => data_kecelakaan::distinct()->pluck('asal_berkas'),
            'samsat' => data_kecelakaan::distinct()->pluck('asal_berkas'),
        ];
        return view('admin.korban.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, data_kecelakaan $korban, $id)
    {

        // dd($request);
        // $korban = $request->all();
        $validated = $request->validate(
            [
                'nopol' => 'required',
                'pembuat_laporan' => 'required',
                'kel_tkp' => 'required',
                'kel_korban' => 'required',
                'kasus_laka' => 'required',
                'pelanggaran' => 'required',
            ],
            [
                'nopol.required' => 'Nomor Polisi Harus Diisi',
                'pembuat_laporan.required' => 'Pembuat Laporan Harus Diisi',
                'kel_tkp.required' => 'Kelurahan, Kecamatan & Kab/Kota TKP Harus Diisi',
                'kel_korban.required' => 'Kelurahan, Kecamatan & Kab/Kota Korban Harus Diisi',
                'kasus_laka.required' => 'Kasus Laka Harus Diisi',
                'pelanggaran.required' => 'Kesimpulan Pelanggaran Harus Diisi',
            ]
        );
        data_kecelakaan::where('id', $id)->update([
            'nopol' => $request->nopol,
            'asal_berkas' => $request->asal_berkas,
            'instansi' => $request->instansi,
            'samsat' => $request->samsat,
            'pembuat_laporan' => $request->pembuat_laporan,
            'tgl_laporan' => $request->tgl_laporan,
            'no_laporan' => $request->no_laporan,
            'petugas' => $request->petugas,
            'nama_korban' => $request->nama_korban,
            'tgl_kejadian' => $request->tgl_kejadian,
            'kasus_laka' => $request->kasus_laka,
            'uraian_singkat' => $request->uraian_singkat,
            'no_hp' => $request->no_hp,
            'status' => $request->status,
            'cidera' => $request->cidera,
            'nominal_santunan' => $request->nominal_santunan,
            'pelanggaran' => json_encode($request->pelanggaran),
        ]);
        data_alamat::where('data_kecelakaan_id', $id)->delete();

        data_alamat::create([
            'alamat' => $request->alamat_tkp,
            'data_kecelakaan_id' => $id,
            'villages_id' => $request->kel_tkp,
            'jenis' => 'tkp',
        ]);

        data_alamat::create([
            'alamat' => $request->alamat_korban,
            'data_kecelakaan_id' => $id,
            'villages_id' => $request->kel_korban,
            'jenis' => 'korban',
        ]);

        // session()->flash('success', 'Data added successfully!');
        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function destroy(data_kecelakaan $korban, $id)
    {
        data_kecelakaan::where('id', $id)->delete();
        // session()->flash('success', 'Data added successfully!');
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
