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
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-chart">
                    <div class="card-header card-header-warning text-center">
                        TOTAL KECELAKAAN BERDASARKAN KOTA/KAB
                        <div class="ct-chart" id="websiteViewsChar"></div>

                    </div>
                    <div class="card-body">

                        <canvas id="barChart"></canvas>
                        {{-- <h4 class="card-title">Email Subscriptions</h4>
                        <p class="card-category">Last Campaign Performance</p> --}}
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            {{-- <i class="material-icons">access_time</i> campaign sent 2 days ago --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script> --}}
    <script>
        var korbanData = {!! $tkpByYear !!};

        var regencies = [];
        var totals = [];

        korbanData.forEach(function(item) {
            regencies.push(item.regency);
            totals.push(item.total);
        });

        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: regencies,
                datasets: [{
                    label: 'Total Korban',
                    data: totals,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var korbanData = {!! $tkpByYear !!};

        var regencies = [];
        var totals = [];

        korbanData.forEach(function(item) {
            regencies.push(item.regency);
            totals.push(item.total);
        });
        dataDailySalesChart = {
            labels: regencies,
            series: [
                totals
            ]
        };

        optionsDailySalesChart = {
            lineSmooth: Chartist.Interpolation.cardinal({
                tension: 0
            }),
            low: 0,
            high: 150, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            chartPadding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            },
        }


        var animationHeaderChart = new Chartist.Line('#websiteViewsChar', dataDailySalesChart,
            optionsDailySalesChart);
    </script>
@endpush
