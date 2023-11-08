<?php

namespace App\Http\Controllers;

use App\Models\data_kecelakaan;
use App\Models\Data_Kendaraan;
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
            'anggota' => data_kecelakaan::orderby('created_at', 'desc')->get(),
            'kelurahan' => Village::with(['district', 'district.regency', 'district.regency.province'])->whereHas('district.regency.province', function ($query) {
                $query->where('name', 'BENGKULU');
            })->get(),
            'kendaraan' => Data_Kendaraan::all(),
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
        dd($request);
        $korban = $request->all();
        korban::create($korban);
        // session()->flash('success', 'Data added successfully!');
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function show(korban $korban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\korban  $korban
     * @return \Illuminate\Http\Response
     */
    public function edit(korban $korban, $id)
    {
        $data = [
            'index' => korban::where('id', $id)->first(),
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
    public function update(Request $request, korban $korban, $id)
    {

        // dd($request);
        // $korban = $request->all();
        korban::where('id', $id)->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_LP' => $request->no_LP,
            'lamarawat' => $request->lamarawat,
            'biaya' => $request->biaya,
            'diskon' => $request->diskon,
            'setelah_diskon' => $request->setelah_diskon,
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
    public function destroy(korban $korban, $id)
    {
        korban::where('id', $id)->delete();
        // session()->flash('success', 'Data added successfully!');
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
