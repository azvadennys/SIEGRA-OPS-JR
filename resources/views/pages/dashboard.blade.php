@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
                <div class="card ">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Biaya Rawat</p>
                                    <h5 class="font-weight-bolder">
                                        Rp {{ number_format($hariIni['totalBiaya'], 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        {{ $hariIni['tanggal'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Diskon</p>
                                    <h5 class="font-weight-bolder">
                                        Rp {{ number_format($hariIni['totalDiskon'], 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        {{ $hariIni['tanggal'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Setelah Diskon</p>
                                    <h5 class="font-weight-bolder">
                                        Rp {{ number_format($hariIni['totalSetelahDiskon'], 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        {{ $hariIni['tanggal'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Biaya Rawat</p>
                                    <h5 class="font-weight-bolder">
                                        Rp {{ number_format($bulanIni['totalBiaya'], 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        {{ $bulanIni['tanggal'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Diskon</p>
                                    <h5 class="font-weight-bolder">
                                        Rp {{ number_format($bulanIni['totalDiskon'], 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        {{ $bulanIni['tanggal'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Setelah Diskon</p>
                                    <h5 class="font-weight-bolder">
                                        Rp {{ number_format($bulanIni['totalSetelahDiskon'], 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        {{ $bulanIni['tanggal'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Biaya Rawat</p>
                                    <h5 class="font-weight-bolder">
                                        Rp {{ number_format($tahunIni['totalBiaya'], 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        {{ $tahunIni['tanggal'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Diskon</p>
                                    <h5 class="font-weight-bolder">
                                        Rp {{ number_format($tahunIni['totalDiskon'], 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        {{ $tahunIni['tanggal'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Setelah Diskon</p>
                                    <h5 class="font-weight-bolder">
                                        Rp {{ number_format($tahunIni['totalSetelahDiskon'], 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        {{ $tahunIni['tanggal'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Biaya Rawat</p>
                                    <h5 class="font-weight-bolder">
                                        Rp {{ number_format($seluruh['totalBiaya'], 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        {{ $seluruh['tanggal'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Diskon</p>
                                    <h5 class="font-weight-bolder">
                                        Rp {{ number_format($seluruh['totalDiskon'], 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        {{ $seluruh['tanggal'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Setelah Diskon</p>
                                    <h5 class="font-weight-bolder">
                                        Rp {{ number_format($seluruh['totalSetelahDiskon'], 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        {{ $seluruh['tanggal'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">airport_shuttle</i>
                        </div>
                        <p class="card-category">TOTAL DATA KENDARAAN</p>
                        <h3 class="card-title">{{ $totalKendaraan }}
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            {{-- <i class="material-icons text-danger">warning</i>
                            <a href="javascript:;">Get More Space...</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">storage</i>
                        </div>
                        <p class="card-category">TOTAL DATA KECELAKAAN</p>
                        <h3 class="card-title">{{ $totalKecelakaan }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            {{-- <i class="material-icons">date_range</i> Last 24 Hours --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <p class="card-category">KORBAN {{ $KorbanTahunIni['tanggal'] }}</p>
                        <h3 class="card-title">{{ $KorbanTahunIni['totalKorban'] }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            {{-- <i class="material-icons">local_offer</i> Tracked from Github --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <p class="card-category">TOTAL SANTUNAN {{ $SantunanTahunIni['tanggal'] }}</p>
                        <h3 class="card-title">Rp {{ number_format($SantunanTahunIni['totalSantunan'], 0, ',', '.') }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            {{-- <i class="material-icons">update</i> Just Updated --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
