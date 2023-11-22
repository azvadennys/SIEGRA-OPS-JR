@extends('layouts.app', ['title' => 'Data Kecelakaan'])

@section('content')

    <div class="container-fluid mt-6">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-xl-8 order-xl-1 mb-3">
                    {{-- Informasi Jabatan --}}
                    <div class="card z-index-0 fadeIn3 fadeInBottom mb-5">
                        <div class="card-header card-header-primary ">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Tambah Data Kecelakaan</h4>

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
                            <form method="post" action="{{ route('kecelakaan.store') }}" autocomplete="off">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4 my-2">
                                        <label for="Berkas" class="">Asal Berkas</label>
                                        <input class="form-control" list="listBerkas" id="Berkas" name="asal_berkas"
                                            value="{{ old('asal_berkas') }}" required>
                                        <datalist id="listBerkas">
                                            @foreach ($asal_berkas as $index)
                                                <option value="{{ $index }}">
                                            @endforeach

                                        </datalist>

                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="instansi" class="form-label">Instansi</label>
                                        <input class="form-control" list="listInstansi" id="instansi" name="instansi"
                                            value="{{ old('instansi') }}" required>
                                        <datalist id="listInstansi">
                                            @foreach ($instansi as $index)
                                                <option value="{{ $index }}">
                                            @endforeach
                                        </datalist>

                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="samsat" class="form-label">Samsat</label>
                                        <input class="form-control" list="listSamsat" id="samsat" name="samsat"
                                            value="{{ old('samsat') }}" required>
                                        <datalist id="listSamsat">
                                            @foreach ($samsat as $index)
                                                <option value="{{ $index }}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="Pembuat" class="">Pembuat Laporan</label>
                                        <select class="form-control" id="pembuat" name="pembuat_laporan" required>
                                            <option disabled selected>Pilih Pembuat Laporan</option>
                                            <option {{ old('pembuat_laporan') == 'KEPOLISIAN' ? 'selected' : '' }}
                                                value="KEPOLISIAN">KEPOLISIAN</option>
                                            <option
                                                {{ old('pembuat_laporan') == 'KEPOLISIAN (SELAIN SATLANTAS POLRES)' ? 'selected' : '' }}
                                                value="KEPOLISIAN (SELAIN SATLANTAS POLRES)">KEPOLISIAN (SELAIN SATLANTAS
                                                POLRES)</option>
                                            <option {{ old('pembuat_laporan') == 'SYAHBANDAR' ? 'selected' : '' }}
                                                value="SYAHBANDAR">SYAHBANDAR</option>
                                            <option {{ old('pembuat_laporan') == 'POMDAM ABRI/TNI' ? 'selected' : '' }}
                                                value="POMDAM ABRI/TNI">POMDAM ABRI/TNI</option>
                                            <option
                                                {{ old('pembuat_laporan') == 'POLSUSKA (KERETA API)' ? 'selected' : '' }}
                                                value="POLSUSKA (KERETA API)">POLSUSKA (KERETA API)</option>
                                            <option {{ old('pembuat_laporan') == 'BANDARA UDARA' ? 'selected' : '' }}
                                                value="BANDARA UDARA">BANDARA UDARA</option>
                                        </select>

                                        @error('pembuat_laporan')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="tgl_laporan">Tanggal Laporan</label>
                                        <input class="form-control" id="tgl_laporan" type="date" name="tgl_laporan"
                                            value="{{ old('tgl_laporan') }}" required>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="no_laporan">No Laporan</label>
                                        <input class="form-control" id="no_laporan" type="text" name="no_laporan"
                                            value="{{ old('no_laporan') }}" required>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="petugas">Petugas</label>
                                        <input class="form-control" id="petugas" type="text" name="petugas"
                                            value="{{ old('petugas') }}" required>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="created_at">Tanggal Transaksi</label>
                                        <input class="form-control" id="created_at" type="date" name="created_at"
                                            value="{{ old('created_at') }}" required>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="nopol" class="form-control-label">Nomor Kendaraan</label>
                                            <select class="form-control " name="nopol" id="nopol" required>
                                                <option disabled selected>Pilih Nomor Kendaraan</option>
                                                @foreach ($kendaraan as $index)
                                                    <option {{ old('nopol') == $index->nopol ? 'selected' : '' }}
                                                        value="{{ $index->nopol }}">{{ $index->nopol }}</option>
                                                @endforeach
                                            </select>
                                            @error('nopol')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label for="nama_korban">Nama Korban</label>
                                        <input class="form-control" id="nama_korban" type="text" name="nama_korban"
                                            value="{{ old('nama_korban') }}" required>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label for="tgl_kejadian" class="form-control-label">Waktu
                                            Kejadian</label>
                                        <input class="form-control" type="datetime-local" id="tgl_kejadian"
                                            value="{{ old('tgl_kejadian') }}" name="tgl_kejadian" required>

                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="alamat_tkp" class="form-control-label">Alamat TKP</label>
                                            <textarea class="form-control" name="alamat_tkp" id="alamat_tkp" cols="30" rows="2" required>{{ old('alamat_tkp') }}</textarea>
                                            {{-- <input class="form-control" type="number" name="umur" required> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-8 my-2">
                                        <div class="form-group">
                                            <label for="kel_tkp" class="form-control-label">Kelurahan, Kecamatan &
                                                Kab/Kota</label>
                                            <select class="form-control" name="kel_tkp" id="kel_tkp" required>
                                                <option disabled selected>Pilih Kelurahan, Kecamatan &
                                                    Kab/Kota</option>
                                                @foreach ($kelurahan as $index)
                                                    <option {{ old('kel_tkp') == $index->id ? 'selected' : '' }}
                                                        value="{{ $index->id }}">KEL. {{ $index->name }}, KEC.
                                                        {{ $index->district->name }},
                                                        {{ $index->district->regency->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kel_tkp')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="alamat_korban" class="form-control-label">Alamat Korban</label>
                                            <textarea class="form-control" name="alamat_korban" id="alamat_korban" cols="30" rows="2" required>{{ old('alamat_korban') }}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-md-8 my-2">
                                        <div class="form-group">
                                            <label for="kel_korban" class="form-control-label">Kelurahan, Kecamatan &
                                                Kab/Kota</label>
                                            <select class="form-control kel_korban" name="kel_korban" id="kel_korban"
                                                required>
                                                <option disabled selected>Pilih Kelurahan, Kecamatan &
                                                    Kab/Kota</option>
                                                @foreach ($kelurahan as $index)
                                                    <option {{ old('kel_korban') == $index->id ? 'selected' : '' }}
                                                        value="{{ $index->id }}">KEL. {{ $index->name }}, KEC.
                                                        {{ $index->district->name }},
                                                        {{ $index->district->regency->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kel_korban')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror


                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="Laka" class="form-control-label">Kasus Laka</label>
                                            <select class="form-control" name="kasus_laka" id="Laka" required>
                                                <option disabled selected>Pilih Kasus Laka</option>
                                                <option value="TABRAKAN DEPAN - DEPAN"
                                                    {{ old('kasus_laka') == 'TABRAKAN DEPAN - DEPAN' ? 'selected' : '' }}>
                                                    001 - TABRAKAN DEPAN - DEPAN</option>
                                                <option value="TABRAKAN DEPAN - SAMPING"
                                                    {{ old('kasus_laka') == 'TABRAKAN DEPAN - SAMPING' ? 'selected' : '' }}>
                                                    002 - TABRAKAN DEPAN - SAMPING</option>
                                                <option value="TABRAKAN DEPAN - BELAKANG"
                                                    {{ old('kasus_laka') == 'TABRAKAN DEPAN - BELAKANG' ? 'selected' : '' }}>
                                                    003 - TABRAKAN DEPAN - BELAKANG</option>
                                                <option value="TABRAKAN BELAKANG - SAMPING"
                                                    {{ old('kasus_laka') == 'TABRAKAN BELAKANG - SAMPING' ? 'selected' : '' }}>
                                                    004 - TABRAKAN BELAKANG - SAMPING</option>
                                                <option value="TABRAKAN SAMPING - SAMPING"
                                                    {{ old('kasus_laka') == 'TABRAKAN SAMPING - SAMPING' ? 'selected' : '' }}>
                                                    005 - TABRAKAN SAMPING - SAMPING</option>
                                                <option value="TIDAK DALAM PENGUASAAN"
                                                    {{ old('kasus_laka') == 'TIDAK DALAM PENGUASAAN' ? 'selected' : '' }}>
                                                    006 - TIDAK DALAM PENGUASAAN</option>
                                                <option value="TABRAKAN BERUNTUN/GANDA"
                                                    {{ old('kasus_laka') == 'TABRAKAN BERUNTUN/GANDA' ? 'selected' : '' }}>
                                                    007 - TABRAKAN BERUNTUN/GANDA</option>
                                                <option value="MENABRAK PEJALAN KAKI/SEJENISNYA"
                                                    {{ old('kasus_laka') == 'MENABRAK PEJALAN KAKI/SEJENISNYA' ? 'selected' : '' }}>
                                                    008 - MENABRAK PEJALAN KAKI/SEJENISNYA</option>
                                            </select>

                                            @error('kasus_laka')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="uraian_singkat" class="form-control-label">Uraian
                                                Singkat</label>
                                            <input class="form-control" type="text" id="uraian_singkat"
                                                name="uraian_singkat" value="{{ old('uraian_singkat') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="no_hp" class="form-control-label">No
                                                Handphone</label>
                                            <input class="form-control" type="tel" id="no_hp" name="no_hp"
                                                minlength="11" aria-describedby="no_hpHelp" value="{{ old('no_hp') }}"
                                                required>
                                            <small id="no_hpHelp" class="form-text text-muted">* Contoh
                                                6285320197002</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="status" class="">Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option disabled selected>Pilih Status</option>
                                            <option {{ old('status') == 'MENINGGAL' ? 'selected' : '' }}
                                                value="MENINGGAL">MENINGGAL</option>
                                            <option {{ old('status') == 'LUKA-LUKA' ? 'selected' : '' }}
                                                value="LUKA-LUKA">LUKA-LUKA</option>
                                            <option {{ old('status') == 'CACAT TETAP' ? 'selected' : '' }}
                                                value="CACAT TETAP">CACAT TETAP</option>
                                        </select>

                                        @error('status')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="cidera" class="form-control-label">Cidera</label>
                                            <input class="form-control" type="text" id="cidera" name="cidera"
                                                value="{{ old('cidera') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label for="nominal_santunan" class="form-control-label">Nominal
                                                Santunan</label>
                                            <input class="form-control" type="number" id="nominal_santunan"
                                                name="nominal_santunan" value="{{ old('nominal_santunan') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="form-group">
                                            <label for="Pelanggaran" class="form-control-label">Kesimpulan
                                                Pelanggaran</label>
                                            <select class="form-control" id="Pelanggaran" name="pelanggaran[]"
                                                multiple="multiple" required>
                                                <option value="0"
                                                    {{ in_array('0', old('pelanggaran', [])) ? 'selected' : '' }}>Tidak Ada
                                                </option>
                                                <option value="1"
                                                    {{ in_array('1', old('pelanggaran', [])) ? 'selected' : '' }}>1.
                                                    Melawan arus lalu lintas</option>
                                                <option value="2"
                                                    {{ in_array('2', old('pelanggaran', [])) ? 'selected' : '' }}>2.
                                                    Mengemudikan Kendaraan Bermotor tanpa Surat Izin Mengemudi yang sah
                                                </option>
                                                <option value="3"
                                                    {{ in_array('3', old('pelanggaran', [])) ? 'selected' : '' }}>3.
                                                    Mengemudikan Kendaraan Bermotor yang telah dimodifikasi dimensi, mesin,
                                                    atau kemampuan daya angkutnya dengan tata cara yang tidak sesuai
                                                    ketentuan Peraturan Perundang-undangan</option>
                                                <option value="4"
                                                    {{ in_array('4', old('pelanggaran', [])) ? 'selected' : '' }}>4.
                                                    Menerobos palang pintu perlintasan kereta api, yaitu mengemudikan
                                                    Kendaraan Bermotor pada perlintasan antara kereta api dan Jalan yang
                                                    tidak berhenti ketika sinyal sudah berbunyi, palang pintu kereta api
                                                    sudah mulai ditutup, dan/atau ada isyarat lain</option>
                                                <option value="5"
                                                    {{ in_array('5', old('pelanggaran', [])) ? 'selected' : '' }}>5.
                                                    Mengemudikan Kendaraan Bermotor dengan tidak wajar dan/atau melakukan
                                                    kegiatan lain karena membuat konten yang dapat membahayakan keamanan,
                                                    keselamatan serta mengganggu ketertiban dan kelancaran lalu lintas dan
                                                    angkutan jalan</option>
                                                <option value="6"
                                                    {{ in_array('6', old('pelanggaran', [])) ? 'selected' : '' }}>6.
                                                    Mengemudikan Kendaraan Bermotor yang tidak teregistrasi atau tidak
                                                    dilengkapi dengan Surat Tanda Coba Kendaraan Bermotor</option>
                                            </select>


                                            @error('pelanggaran')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 ">
                                    <button type="submit" class="btn bg-primary text-white">Simpan</button>
                                    <a href="{{ route('kecelakaan') }}" class="btn bg-info text-white">Kembali</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('custom_js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> --}}
    {{-- <script>
        $(document).ready(function() {
            $('#kelurahan').select2();
        });
    </script> --}}
    <script>
        $(function() {
            // $('#kelurahan').select2();
            // $('#id_1').datetimepicker({
            //     "allowInputToggle": true,
            //     "showClose": true,
            //     "showClear": true,
            //     "showTodayButton": true,
            //     "format": "MM/DD/YYYY HH:mm:ss",
            // });
            $('#kel_korban').select2();
            $('#kel_tkp').select2();
            $('#pembuat').select2();
            $('#Laka').select2();
            $('#Pelanggaran').select2();
            $('#nopol').select2();
            $('#status').select2();
            // $('input[name="lamarawat"]').daterangepicker({
            //     opens: 'left'
            // }, function(start, end, label) {
            //     console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
            //         .format('YYYY-MM-DD'));
            // });
        });
    </script>
    <script type="text/javascript">
        // Mendapatkan referensi ke elemen-elemen input
        const biayaInput = document.getElementById('biaya');
        const diskonInput = document.getElementById('diskon');
        const setelahDiskonInput = document.getElementById('setelah_diskon');
        const diskonInputname = document.getElementById('diskon_1');
        const setelahDiskonInputname = document.getElementById('setelah_diskon_1');

        // Mendengarkan event input pada input biaya
        biayaInput.addEventListener('input', function() {
            const biaya = parseFloat(biayaInput.value);
            const diskonPersen = 0.05; // 5% diskon

            if (!isNaN(biaya)) {
                // Menghitung diskon
                const diskon = Math.floor(biaya *
                    diskonPersen); // Menggunakan Math.floor() untuk pembulatan
                // Menghitung biaya setelah diskon
                const biayaSetelahDiskon = Math.floor(biaya -
                    diskon); // Menggunakan Math.floor() untuk pembulatan
                diskonInputname.value = diskon;
                // console.log(diskonInputname.value);
                setelahDiskonInputname.value = biayaSetelahDiskon;
                // console.log(setelahDiskonInputname.value);
                // Menampilkan hasil dalam elemen input tanpa angka desimal
                diskonInput.value = diskon.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                });
                setelahDiskonInput.value = biayaSetelahDiskon.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                });
            } else {
                // Jika input tidak valid, mengosongkan nilai diskon dan biaya setelah diskon
                diskonInput.value = '';
                setelahDiskonInput.value = '';
            }
        });
    </script>
@endpush
