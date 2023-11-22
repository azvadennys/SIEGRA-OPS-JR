<?php

namespace App\Http\Controllers;

use App\Models\data_kendaraan_model;
use Illuminate\Http\Request;

class DataKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'data' => data_kendaraan_model::orderby('tgl_pkb', 'desc')->get(),
        ];
        // dd($data);
        return view('admin.kendaraan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $data = [
            'jenis' => data_kendaraan_model::distinct()->pluck('jenis_kendaraan'),
        ];
        return view('admin.kendaraan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate(
            [
                'nopol' => 'required|unique:data_kendaraan',
                'jenis_kendaraan' => 'required',
                'nama' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
                'tgl_pkb' => 'required',
            ],
            [
                'nopol.unique' => 'Nomor Polisi Sudah Ada',
            ]
        );
        data_kendaraan_model::create($validated);
        return back()->with('success', 'Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data_kendaraan_model  $data_Kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(data_kendaraan_model $data_Kendaraan, $id)
    {

        $data = [
            'data' => data_kendaraan_model::where('nopol', $id)->first(),
            'jenis' => data_kendaraan_model::distinct()->pluck('jenis_kendaraan'),
        ];
        // dd($data['data']);
        return view('admin.kendaraan.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\data_kendaraan_model  $data_Kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(data_kendaraan_model $data_Kendaraan, $id)
    {
        $data = [
            'data' => data_kendaraan_model::where('nopol', $id)->first(),
            'jenis' => data_kendaraan_model::distinct()->pluck('jenis_kendaraan'),
        ];
        // dd($data['data']);
        return view('admin.kendaraan.edit', $data);
        // dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data_Kendaraan  $data_Kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, data_kendaraan_model $data_Kendaraan, $id)
    {
        if ($id == $request->nopol) {
            $validated = $request->validate(
                [
                    'jenis_kendaraan' => 'required',
                    'nama' => 'required',
                    'no_hp' => 'required',
                    'alamat' => 'required',
                    'tgl_pkb' => 'required',
                ]
            );
        } else {
            $validated = $request->validate(
                [
                    'nopol' => 'required|unique:data_kendaraan',
                    'jenis_kendaraan' => 'required',
                    'nama' => 'required',
                    'no_hp' => 'required',
                    'alamat' => 'required',
                    'tgl_pkb' => 'required',
                ],
                [
                    'nopol.unique' => 'Nomor Polisi Sudah Ada',
                ]
            );
        }

        data_kendaraan_model::where('nopol', $id)->update($validated);
        return redirect()->route('kendaraan.edit', $request->nopol)->with('success', 'Berhasil Edit Data');
        // dd($request);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\data_kendaraan_model  $data_Kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(data_kendaraan_model $data_Kendaraan, $id)
    {
        // dd($id);
        data_kendaraan_model::where('nopol', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Data');
        // dd($id);
    }
}
