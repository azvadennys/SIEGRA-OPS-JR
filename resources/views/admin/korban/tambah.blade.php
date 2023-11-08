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
                                        <input class="form-control" list="listBerkas" id="Berkas" name="Berkas"
                                            placeholder="Masukkan Asal Berkas" required>
                                        <datalist id="listBerkas">
                                            <option value="San Francisco">
                                        </datalist>

                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="Instansi" class="form-label">Instansi</label>
                                        <input class="form-control" list="listInstansi" id="Instansi" name="Instansi"
                                            placeholder="Masukkan Instansi" required>
                                        <datalist id="listInstansi">
                                            <option value="San Francisco">
                                        </datalist>

                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="Samsat" class="form-label">Samsat</label>
                                        <input class="form-control" list="listSamsat" id="Samsat" name="Samsat"
                                            placeholder="Masukkan Samsat" required>
                                        <datalist id="listSamsat">
                                            <option value="San Francisco">
                                        </datalist>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="Pembuat" class="">Pembuat Laporan</label>
                                        <select class="form-control" aria-label="Default select example" id="pembuat"
                                            name="pembuat" required>
                                            <option disabled selected>Pilih Pembuat Laporan</option>
                                            <option value="KEPOLISIAN">KEPOLISIAN</option>
                                            <option value="KEPOLISIAN (SELAIN SATLANTAS POLRES)">KEPOLISIAN (SELAIN
                                                SATLANTAS POLRES)</option>
                                            <option value="SYAHBANDAR">SYAHBANDAR</option>
                                            <option value="POMDAM ABRI/TNI">POMDAM ABRI/TNI</option>
                                            <option value="POLSUSKA (KERETA API)">POLSUSKA (KERETA API)</option>
                                            <option value="BANDARA UDARA">BANDARA UDARA</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="Nama">Tanggal Laporan</label>
                                        <input class="form-control" id="Nama" type="date" name="nama" required>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="Nama">No Laporan</label>
                                        <input class="form-control" id="Nama" type="text" name="nama" required>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="Nama">Petugas</label>
                                        <input class="form-control" id="Nama" type="text" name="nama" required>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="Nama">Nama Korban</label>
                                        <input class="form-control" id="Nama" type="text" name="nama" required>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="date" class="form-control-label">Waktu
                                            Kejadian</label>

                                        <input class="form-control" type="datetime-local" id="date" name="umur"
                                            required>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="alamat_tkp" class="form-control-label">Alamat TKP</label>
                                            <textarea class="form-control" name="alamat_tkp" id="alamat_tkp" cols="30" rows="2"></textarea>
                                            {{-- <input class="form-control" type="number" name="umur" required> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="kel_tkp" class="form-control-label">Kelurahan, Kecamatan &
                                                Kab/Kota</label>
                                            <select class="form-control kel_tkp" name="kel_tkp" id="kel_tkp">
                                                @foreach ($kelurahan as $index)
                                                    <option value="{{ $index->id }}">KEL. {{ $index->name }}, KEC.
                                                        {{ $index->district->name }}, {{ $index->district->regency->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="alamat_korban" class="form-control-label">Alamat Korban</label>
                                            <textarea class="form-control" name="alamat_korban" id="alamat_korban" cols="30" rows="2"></textarea>
                                            {{-- <input class="form-control" type="number" name="umur" required> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="kel_korban" class="form-control-label">Kelurahan, Kecamatan &
                                                Kab/Kota</label>
                                            <select class="form-control kel_korban" name="kel_korban" id="kel_korban">
                                                @foreach ($kelurahan as $index)
                                                    <option value="{{ $index->id }}">KEL. {{ $index->name }}, KEC.
                                                        {{ $index->district->name }}, {{ $index->district->regency->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Laka" class="form-control-label">Kasus Laka</label>
                                            <select class="form-control" name="Laka" id="Laka">
                                                <option value="001 - TABRAKAN DEPAN - DEPAN">001 - TABRAKAN DEPAN - DEPAN
                                                </option>
                                                <option value="002 - TABRAKAN DEPAN - SAMPING">002 - TABRAKAN DEPAN -
                                                    SAMPING</option>
                                                <option value="003 - TABRAKAN DEPAN - BELAKANG">003 - TABRAKAN DEPAN -
                                                    BELAKANG</option>
                                                <option value="004 - TABRAKAN BELAKANG - SAMPING">004 - TABRAKAN BELAKANG -
                                                    SAMPING</option>
                                                <option value="005 - TABRAKAN SAMPING - SAMPING">005 - TABRAKAN SAMPING -
                                                    SAMPING</option>
                                                <option value="006 - TIDAK DALAM PENGUASAAN">006 - TIDAK DALAM PENGUASAAN
                                                </option>
                                                <option value="007 - TABRAKAN BERUNTUN/GANDA">007 - TABRAKAN BERUNTUN/GANDA
                                                </option>
                                                <option value="008 - MENABRAK PEJALAN KAKI/SEJENISNYA">008 - MENABRAK
                                                    PEJALAN KAKI/SEJENISNYA</option>

                                            </select>

                                        </div>
                                    </div>
                                  
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Uraian
                                                Singkat</label>
                                            <input class="form-control" type="text" name="no_LP" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">No
                                                Handphone</label>
                                            <input class="form-control" type="text" name="no_LP" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Status</label>
                                            <input class="form-control" type="text" name="no_LP" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Cidera</label>
                                            <input class="form-control" type="text" name="no_LP" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nominal
                                                Santunan</label>
                                            <input class="form-control" type="text" name="no_LP" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Pelanggaran" class="form-control-label">Kesimpulan
                                                Pelanggaran</label>
                                            <select class="form-control" id="Pelanggaran" name="Pelanggaran[]"
                                                multiple="multiple">
                                                <option value="1">1. Melawan arus lalu lintas
                                                </option>
                                                <option value="2">2. Mengemudikan Kendaraan Bermotor tanpa Surat Izin
                                                    Mengemudi
                                                    yang sah</option>
                                                <option value="3">3. Mengemudikan Kendaraan Bermotor yang telah
                                                    dimodifikasi dimensi,
                                                    mesin, atau kemampuan daya angkutnya dengan tata cara yang tidak
                                                    sesuai ketentuan Peraturan Perundang-undangan</option>
                                                <option value="4">4. Menerobos palang pintu perlintasan kereta api, yaitu
                                                    mengemudikan
                                                    Kendaraan Bermotor pada perlintasan antara kereta api dan Jalan yang
                                                    tidak berhenti ketika sinyal sudah berbunyi, palang pintu kereta api
                                                    sudah mulai ditutup, dan/atau ada isyarat lain</option>
                                                <option value="5">5. Mengemudikan Kendaraan Bermotor dengan tidak wajar
                                                    dan/atau
                                                    melakukan kegiatan lain karena membuat konten yang dapat
                                                    membahayakan keamanan, keselamatan serta mengganggu ketertiban
                                                    dan kelancaran lalu lintas dan angkutan jalan</option>
                                                <option value="6">6. Mengemudikan Kendaraan Bermotor yang tidak
                                                    teregistrasi atau tidak
                                                    dilengkapi dengan Surat Tanda Coba Kendaraan Bermotor</option>

                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
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
