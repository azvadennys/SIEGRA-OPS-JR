@extends('layouts.app', ['title' => 'Edit Data Kendaraan'])

@section('content')

    <div class="container-fluid mt-6">
            <div class="row justify-content-center">
                <div class="col-xl-8 order-xl-1 mb-3">
                    {{-- Informasi Jabatan --}}
                    <div class="card z-index-0 fadeIn3 fadeInBottom mb-5">
                        <div class="card-header card-header-primary ">

                            <h4 class="card-title text-white font-weight-bolder text-center">Edit Data Kendaraan</h4>
                            <p class="card-category text-white font-weight-bolder text-center">Nomor Polisi
                                {{ $data->nopol }}</p>

                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger text-white text-center alert-dismissible fade show my-2"
                                    role="alert">
                                    @foreach ($errors->all() as $error)
                                        <strong>{{ $error }}</strong><br>
                                    @endforeach
                                </div>
                            @endif
                            <form method="post" action="{{ route('kendaraan.update', $data->nopol) }}" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <label for="nopol">Nomor Polisi</label>
                                        <input class="form-control" id="nopol" type="text" name="nopol"
                                            maxlength="10" value="{{ old('nopol', $data->nopol) }}" required>
                                        @error('nopol')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label for="jenis" class="">Jenis Kendaraan</label>
                                        <input class="form-control" list="listJenis" id="jenis" name="jenis_kendaraan"
                                            maxlength="4" value="{{ old('jenis_kendaraan', $data->jenis_kendaraan) }}"
                                            required>
                                        @error('jenis_kendaraan')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                        <datalist id="listJenis">
                                            @foreach ($jenis as $index)
                                                <option value="{{ $index }}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Nama">Nama Pemilik</label>
                                            <input class="form-control" id="Nama" type="text" name="nama"
                                                value="{{ old('nama', $data->nama) }}" required>
                                            @error('nama')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_hp" class="form-control-label">Nomor Handphone</label>
                                            <input class="form-control" type="number" id="no_hp" name="no_hp"
                                                min="10000000000" minlength="11" aria-describedby="no_hpHelp"
                                                value="{{ old('no_hp', $data->no_hp) }}" required>
                                            <small id="no_hpHelp" class="form-text text-muted">* Contoh
                                                6285320197002</small>
                                            @error('no_hp')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="alamat" class="form-control-label">Alamat</label>
                                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5" required>{{ old('alamat', $data->alamat) }}</textarea>
                                            @error('alamat')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label for="Nama">Tanggal PKB</label>
                                            <input class="form-control" id="tgl_pkb" type="date" name="tgl_pkb"
                                                value="{{ old('tgl_pkb', $data->tgl_pkb) }}" required>
                                            @error('tgl_pkb')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" class="btn bg-primary text-white">Simpan</button>
                                    <a href="{{ route('kendaraan') }}" class="btn bg-info text-white">Kembali</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection
@push('custom_js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
