<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan</title>
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        th,
        h3 {
            text-transform: uppercase;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
            /* Posisi horizontal */
            vertical-align: middle;
            /* Posisi vertikal */
            horizontal-align: middle;
            /* Posisi vertikal */
        }

        tbody {
            font-size: 14px;
            /* Ganti dengan ukuran font yang diinginkan */
        }

        thead {
            font-size: 14px;
            /* Ganti dengan ukuran font yang diinginkan */
        }
    </style>

</head>

<body>
    <div id="content-to-export">
        <div class="row justify-content-between my-4 py-4">
            <div class="col-4">
                <h5 class="text-center">PT. JASA RAHARJA (Persero)<br>CABANG BENGKULU
                </h5>
            </div>
            <div class="col-4">
                <h6 class="text-left">TANGGAL PROSES : {{ now()->format('d F Y') }}
                </h6>
            </div>
        </div>
        <div class="container">
            <header>
                <h3 class="mt-4 text-center">Rekapitulasi Pembayaran (SEMUA JENIS) EX-GRATIA<br>MENURUT SIFAT CIDERA
                </h3>
                <h5 class="mt-2 text-center">PERIODE TANGGAL : {{ $waktu }}</h5>
            </header>
            <table class="table table-striped table-bordered mt-4">
                <thead class="thead-light">
                    <tr class="text-center">
                        {{-- <th scope="col" rowspan='2' class="text-center" style="vertical-align: middle;">No
                        </th> --}}
                        @foreach ($korban as $key => $index)
                            <th scope="col" colspan='2'>{{ $index->status }}</th>
                        @endforeach
                        <th scope="col" colspan='2'>JUMLAH</th>
                    </tr>
                    <tr class="text-center">
                        @foreach ($korban as $key => $index)
                            <th scope="col"style="vertical-align: middle;">KORBAN</th>
                            <th scope="col"style="vertical-align: middle;">JUMLAH SANTUNAN</th>
                        @endforeach
                        <th scope="col"style="vertical-align: middle;">KORBAN</th>
                        <th scope="col"style="vertical-align: middle;">JUMLAH SANTUNAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $totalKorban = 0;
                    $totalSantunan = 0;
                    ?>
                    <tr class="text-left" colspan='2'>
                        @foreach ($korban as $key => $index)
                            <td><b>{{ $index->total }}</b></td>
                            <td class="text-right"><b>Rp {{ number_format($index->total_santunan, 0, ',', '.') }}</b>
                            </td>

                            @php
                                $totalKorban += $index->total;
                                $totalSantunan += $index->total_santunan;
                            @endphp
                        @endforeach
                        <td><b>{{ $totalKorban }}</b></td>
                        <td class="text-right"><b>Rp {{ number_format($totalSantunan, 0, ',', '.') }}</b>

                    </tr>
                </tbody>
            </table>

        </div>
        {{-- <div class="container mt-4 pt-4">
            <div class="row justify-content-between ">
                <div class="col-3">
                </div>
                <div class="col-3">
                    Bengkulu, {{ date('d F Y', strtotime(now())) }}
                </div>

            </div>
            <div class="row justify-content-between " style="margin-top: 100px">
                <div class="col-3" style="margin-left: 60px">
                    Kepala Cabang
                </div>
                <div class="col-3">
                    Ka. Unit Operasional
                </div>
            </div>
        </div> --}}
    </div>
    <!-- Tambahkan link ke Bootstrap JS dan jQuery jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include html2pdf.js from CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
        window.onload = function() {
            // Select the HTML content to be converted to PDF

            const element = document.getElementById("content-to-export");

            html2pdf()
                .from(element)
                .set({
                    margin: 10,
                    filename: "Rekapitulasi Pembayaran.pdf",
                    image: {
                        type: "jpeg",
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 3
                    },
                    jsPDF: {
                        unit: "mm",
                        format: "a4",
                        orientation: "landscape"
                    }
                })
                .save();

            // setTimeout(function() {
            //     window.close();
            // }, 2000);
        };
    </script>

</body>

</html>
