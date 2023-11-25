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
                <h3 class="mt-4 text-center">Tingkat Kecelakaan per {{ $type }}
                </h3>
                <h5 class="mt-2 text-center">PERIODE TANGGAL : {{ $waktu }}</h5>
            </header>
            <table class="table table-striped table-bordered mt-4">
                <thead class="thead-light">
                    <th scope="col"style="vertical-align: middle;">NO</th>
                    @if ($type == 'KELURAHAN')
                        <th scope="col"style="vertical-align: middle;">KELURAHAN</th>
                        <th scope="col"style="vertical-align: middle;">KECAMATAN</th>
                        <th scope="col"style="vertical-align: middle;">KAB / KOTA</th>
                    @elseif($type == 'KECAMATAN')
                        <th scope="col"style="vertical-align: middle;">KECAMATAN</th>
                        <th scope="col"style="vertical-align: middle;">KAB / KOTA</th>
                    @else
                        <th scope="col"style="vertical-align: middle;">KAB / KOTA</th>
                    @endif
                    <th scope="col"style="vertical-align: middle;">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $totalKorban = 0;
                    ?>

                    @foreach ($korban as $key => $index)
                        <tr class="text-left" colspan='2'>
                            <td><b>{{ $i }}</b></td>
                            @if ($type == 'KELURAHAN')
                                <td><b>{{ $index->region_name }}</b></td>

                                <td><b> {{ $index->alamat_tkp->village->district->name }}</b></td>

                                <td><b>{{ $index->alamat_tkp->village->district->regency->name }}</b></td>
                            @elseif($type == 'KECAMATAN')
                                <td><b>{{ $index->region_name }}</b></td>

                                <td><b>{{ $index->alamat_tkp->village->district->regency->name }}</b></td>
                            @else
                                <td><b>{{ $index->region_name }}</b></td>
                            @endif
                            <td><b>{{ $index->total }}</b></td>
                            </td>

                            @php
                                $totalKorban += $index->total;
                                $i++;
                            @endphp

                        </tr>
                    @endforeach
                    <tr class="text-left" colspan='2'>
                        <td colspan="2"><b>TOTAL KECELAKAAN</b></td>
                        <td><b>{{ $totalKorban }}</b></td>

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

    {{-- <script>
        window.onload = function() {
            // Select the HTML content to be converted to PDF

            const element = document.getElementById("content-to-export");

            html2pdf()
                .from(element)
                .set({
                    margin: 10,
                    filename: "Tingkat Kecelakaan.pdf",
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
                        orientation: "portrait"
                    }
                })
                .save();

            // setTimeout(function() {
            //     window.close();
            // }, 2000);
        };
    </script> --}}
    <script>
        // This function will be called when the page is loaded
        window.onload = function() {
            // Trigger the print dialog
            window.print();
        };
    </script>
</body>

</html>
