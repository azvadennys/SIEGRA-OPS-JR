@extends('layouts.app', ['title' => 'Daftar Penolakan Santunan'])

@section('content')
    {{-- @include('layouts.navbars.auth.topnav', ['title' => 'Data Korban']) --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow border-1">
                    <!-- Card header -->
                    <div class="card-header card-header-primary mb-4">
                        <h3 class=" ">Daftar Penolakan Santunan</h3>

                        <div class="row justify-content-center mt-3">
                            <div class="col-6 text-center">
                                {{-- @if (session()->has('success'))
                            <div class="alert alert-info my-2" role="alert">
                                <strong>{{ session('success') }}</strong>
                            </div>
                            @endif --}}
                                @if (session()->has('Errors'))
                                    <div class="alert alert-danger my-2" role="alert">
                                        <strong>{{ session('Errors') }}</strong>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger my-2" role="alert">

                                        @foreach ($errors->all() as $error)
                                            <strong>{{ $error }}</strong><br>
                                        @endforeach

                                    </div>
                                @endif

                                {{-- @error('id')
                            <div class="alert alert-danger my-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror --}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="row  justify-content-end">
                            <div class="col-lg-2 col-4">
                                {{-- <a href="{{ route('kecelakaan.create') }}"
                                    class=" btn btn-md btn-success p-2 btnTambah">TAMBAH</a> --}}
                                {{-- <a href="{{ route('laporananggota.excel') }}"
                                    class=" btn btn-sm btn-success p-2 btnTambah">Cetak Excel</a> --}}
                            </div>
                        </div>
                        <div class="row justify-content-center ">
                            <div class="table-responsive col-11">
                                <table id="table_id"
                                    class=" table align-items-center table-hover table-striped table-bordered"
                                    style="width: 100%">
                                    <thead class="thead-light">
                                        <tr class="text-center">
                                            {{-- <th scope="col">No</th> --}}
                                            <th class="text-center">No</th>
                                            <th scope="col">Nama Korban</th>
                                            <th scope="col">Nomor Handphone</th>
                                            <th scope="col">Tanggal Kejadian</th>
                                            <th scope="col">Tanggal Transaksi</th>
                                            <th class="text-right pr-6" data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php

                                            $i = 1;
                                        @endphp
                                        @foreach ($korban as $key => $index)
                                            <tr class="text-left">
                                                <td class="text-center">
                                                    {{ $i++ }}


                                                </td>
                                                <td>
                                                    {{ $index->nama_korban }}
                                                </td>
                                                <td>
                                                    {{ $index->no_hp }}
                                                </td>
                                                <td>
                                                    {{ date('d F Y', strtotime($index->tgl_kejadian)) }}
                                                </td>
                                                <td>
                                                    {{ date('d F Y', strtotime($index->created_at)) }}
                                                </td>

                                                <td>
                                                    @php
                                                        $textTolak = 'Informasi Pengajuan Santunan *JASA RAHARJA* Atas Nama *' . $index->nama_korban . '* Telah *DITOLAK*.' . PHP_EOL . PHP_EOL . 'Silahkan melihat surat pelonakan melalui link dibawah ini : ' . PHP_EOL . route('laporan.penolakan',['id' => $index->id, 'name' => $index->nama_korban]);
                                                        $url_encoded = urlencode($textTolak);
                                                    @endphp
                                                    <div class="text-right">
                                                        <a href="https://api.whatsapp.com/send/?phone={{ $index->no_hp }}&text={{ $url_encoded }}"
                                                            class="btn btn-success btn-sm btnEdit" target="_blank"><i
                                                                class="fa fa-fa-whatsapp"></i> Whatsapp</a>
                                                        <a href="{{ route('laporan.penolakan',['id' => $index->id, 'name' => $index->nama_korban]) }}"
                                                            class="btn btn-info  btn-sm btnEdit"><i class="fa fa-edit"></i>
                                                            Cetak Surat Penolakan</a>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-start">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="" id="delete-form" method="post">
            @csrf
            @method('DELETE')
        </form>
    @endsection

    @section('custom_html')
        {{-- @foreach ($akun as $index)
            <form action="{{ route('anggota.destroy', $index->id) }}" id="delete-form-{{ $index->id }}" method="post">
                @csrf
                @method('DELETE')
            </form>
        @endforeach --}}
    @endsection

    @push('custom_js')
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });
        </script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.js"></script>
        <script>
            let removeBtns = document.querySelectorAll('.remove-btn');
            removeBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();

                    const id = e.target.getAttribute('data-id');
                    const route = e.target.getAttribute('data-route');
                    const deleteForm = document.querySelector('#delete-form');
                    // Set action atribut formulir dengan nilai route
                    deleteForm.action = route;

                    Swal.fire({
                        title: 'Apakah anda yakin menghapus data?',
                        text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.value) {
                            deleteForm.submit();
                        }
                    })
                })
            })
        </script>
    @endpush
