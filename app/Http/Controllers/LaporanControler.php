<?php

namespace App\Http\Controllers;

use App\Models\data_kecelakaan;
use App\Models\korban;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

class LaporanControler extends Controller
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
        return view('admin.laporan.index', $data);
    }
    public function indexKecelakaan()
    {
        $data = [
            'korban' => data_kecelakaan::orderby('created_at', 'desc')->get(),
        ];
        // dd($data);
        return view('admin.laporan.indexKecelakaan', $data);
    }
    public function cetakKecelakaan(Request $request)
    {
        $laporanType = $request->input('laporan_type'); // 'harian', 'bulanan', atau 'tahunan'

        // Validasi input atau tangani kesalahan jika diperlukan

        // Inisialisasi variabel tanggal, bulan, dan tahun dengan nilai default null
        $tanggal = null;
        $bulan_tahun = null;

        // Berdasarkan jenis laporan, dapatkan parameter tanggal, bulan, atau tahun
        if ($laporanType === 'harian') {
            $tanggal = $request->input('tanggal');
            $waktu = date('d F Y', strtotime($tanggal));
        } elseif ($laporanType === 'bulanan') {
            $bulan_tahun = $request->input('bulan');
            $waktu = date('F Y', strtotime($bulan_tahun));
            $rentang = null;
        } elseif ($laporanType === 'rentang') {
            $rentang = $request->input('rentang');

            // dd($rentang);
            $rentangTanggalArray = explode(' - ', $rentang);
            // Menghapus spasi ekstra dari hasil pemisahan
            $startDate = Carbon::createFromFormat('m/d/Y', $rentangTanggalArray[0])->startOfDay();
            $endDate = Carbon::createFromFormat('m/d/Y', $rentangTanggalArray[1])->endOfDay();
            $tanggalAwal = trim($rentangTanggalArray[0]);
            $tanggalAkhir = trim($rentangTanggalArray[1]);

            $waktu = date('d F Y', strtotime($tanggalAwal)) . ' sd ' . date('d F Y', strtotime($tanggalAkhir));
        }
        $query = data_kecelakaan::with(['alamat_tkp.Village.district.regency']);

        if ($request->region == 'village') {
            $type = 'KELURAHAN';
            $query->selectRaw('MAX(data_kecelakaan.id) as id, villages.name as region_name, COUNT(*) as total')
                ->leftJoin('data_alamat', 'data_alamat.data_kecelakaan_id', '=', 'data_kecelakaan.id')
                ->leftJoin('villages', 'data_alamat.villages_id', '=', 'villages.id')
                ->groupBy('villages.name')
                ->orderBy('total', 'desc');
        } elseif ($request->region == 'district') {
            $type = 'KECAMATAN';
            $query->selectRaw('MAX(data_kecelakaan.id) as id,districts.name as region_name, COUNT(*) as total')
                ->leftJoin('data_alamat', 'data_alamat.data_kecelakaan_id', '=', 'data_kecelakaan.id')
                ->leftJoin('villages', 'data_alamat.villages_id', '=', 'villages.id')
                ->leftJoin('districts', 'villages.district_id', '=', 'districts.id')
                ->groupBy('districts.name')
                ->orderBy('total', 'desc');
        } else {
            $type = 'KABUPATEN / KOTA';
            $query->selectRaw('MAX(data_kecelakaan.id) as id,regencies.name as region_name, COUNT(*) as total')
                ->leftJoin('data_alamat', 'data_alamat.data_kecelakaan_id', '=', 'data_kecelakaan.id')
                ->leftJoin('villages', 'data_alamat.villages_id', '=', 'villages.id')
                ->leftJoin('districts', 'villages.district_id', '=', 'districts.id')
                ->leftJoin('regencies', 'districts.regency_id', '=', 'regencies.id')
                ->groupBy('regencies.name')
                ->orderBy('total', 'desc');
        }
        // Apply additional conditions
        if (!is_null($tanggal)) {
            $query->whereDate('data_kecelakaan.created_at', '=', $tanggal);
        }

        if (!is_null($bulan_tahun)) {
            $query->whereYear('data_kecelakaan.created_at', '=', substr($bulan_tahun, 0, 4))
                ->whereMonth('data_kecelakaan.created_at', '=', substr($bulan_tahun, 5, 2));
        }

        if (!is_null($rentang)) {
            $query->whereBetween('data_kecelakaan.created_at', [$startDate, $endDate]);
        }

        $korban = $query->get();

        // dd($korban);
        $data = [
            'korban' => $korban,
            'type' => $type,
            'waktu' => $waktu,
        ];
        // dd($data);
        // Lakukan sesuai dengan kebutuhan Anda, misalnya, kirim data ke view
        return view('admin.laporan.cetakKecelakaan', $data);
    }
    public function cetak(Request $request)
    {
        $laporanType = $request->input('laporan_type'); // 'harian', 'bulanan', atau 'tahunan'

        // Validasi input atau tangani kesalahan jika diperlukan

        // Inisialisasi variabel tanggal, bulan, dan tahun dengan nilai default null
        $tanggal = null;
        $bulan_tahun = null;

        // Berdasarkan jenis laporan, dapatkan parameter tanggal, bulan, atau tahun
        if ($laporanType === 'harian') {
            $tanggal = $request->input('tanggal');
            $waktu = date('d F Y', strtotime($tanggal));
        } elseif ($laporanType === 'bulanan') {
            $bulan_tahun = $request->input('bulan');
            $waktu = date('F Y', strtotime($bulan_tahun));
            $rentang = null;
        } elseif ($laporanType === 'rentang') {
            $rentang = $request->input('rentang');

            // dd($rentang);
            $rentangTanggalArray = explode(' - ', $rentang);
            // Menghapus spasi ekstra dari hasil pemisahan
            $startDate = Carbon::createFromFormat('m/d/Y', $rentangTanggalArray[0])->startOfDay();
            $endDate = Carbon::createFromFormat('m/d/Y', $rentangTanggalArray[1])->endOfDay();
            $tanggalAwal = trim($rentangTanggalArray[0]);
            $tanggalAkhir = trim($rentangTanggalArray[1]);

            $waktu = date('d F Y', strtotime($tanggalAwal)) . ' sd ' . date('d F Y', strtotime($tanggalAkhir));
        }
        // dd($request);


        // Query menggunakan Eloquent Query Builder dengan kondisi dinamis
        $query = data_kecelakaan::groupBy('status')->select('status', DB::raw('count(*) as total'), DB::raw('sum(nominal_santunan) as total_santunan'));

        if (!is_null($tanggal)) {
            $query->whereDate('created_at', '=', $tanggal);
        }

        if (!is_null($bulan_tahun)) {
            $query->whereYear('created_at', '=', substr($bulan_tahun, 0, 4))
                ->whereMonth('created_at', '=', substr($bulan_tahun, 5, 2));
        }
        if (!is_null($rentang)) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $korban = $query->get();

        // dd($korban);
        $data = [
            'korban' => $korban,
            'waktu' => $waktu,
        ];
        // dd($data);
        // Lakukan sesuai dengan kebutuhan Anda, misalnya, kirim data ke view
        return view('admin.laporan.cetak', $data);
    }

    public function laporanWord($id, $name)
    {
        // Load the Word template
        // $templatePath = asset('TemplateWord/templateLaporan.docx');
        $index = data_kecelakaan::with(['alamat_korban'])->where('id', $id)->where('nama_korban', $name)->first();

        // dd($index);
        if ($index != NULL) {

            $templateProcessor = new TemplateProcessor('TemplateWord/templateLaporan.docx');

            // Replace placeholders in the template
            $templateProcessor->setValue('tgl_transaksi',  \Carbon\Carbon::parse($index->created_at)->locale('id')->isoFormat('D MMMM Y'));
            $templateProcessor->setValue('id', $index->id);
            $templateProcessor->setValue('nama_korban', $index->nama_korban);
            $templateProcessor->setValue('alamat_korban', $index->alamat_korban->alamat . ', KEL. ' . $index->alamat_korban->village->name . ', KEC. ' . $index->alamat_korban->village->district->name . ', ' . $index->alamat_korban->village->district->regency->name . ', ' . $index->alamat_korban->village->district->regency->province->name);
            $templateProcessor->setValue('pembuat_laporan', $index->pembuat_laporan);
            $templateProcessor->setValue('no_laporan', $index->no_laporan);
            $templateProcessor->setValue('tgl_laporan',  \Carbon\Carbon::parse($index->tgl_laporan)->locale('id')->isoFormat('D MMMM Y'));

            $selectedValues = json_decode($index->pelanggaran);
            $pelanggaranOptions = [
                '0' => 'Tidak Ada',
                '1' => 'Melawan arus lalu lintas',
                '2' => 'Mengemudikan Kendaraan Bermotor tanpa Surat Izin Mengemudi yang sah',
                '3' => 'Mengemudikan Kendaraan Bermotor yang telah dimodifikasi dimensi, mesin, atau kemampuan daya angkutnya dengan tata cara yang tidak sesuai ketentuan Peraturan Perundang-undangan',
                '4' => 'Menerobos palang pintu perlintasan kereta api, yaitu mengemudikan Kendaraan Bermotor pada perlintasan antara kereta api dan Jalan yang tidak berhenti ketika sinyal sudah berbunyi, palang pintu kereta api sudah mulai ditutup, dan/atau ada isyarat lain',
                '5' => 'Mengemudikan Kendaraan Bermotor dengan tidak wajar dan/atau melakukan kegiatan lain karena membuat konten yang dapat membahayakan keamanan, keselamatan serta mengganggu ketertiban dan kelancaran lalu lintas dan angkutan jalan',
                '6' => 'Mengemudikan Kendaraan Bermotor yang tidak teregistrasi atau tidak dilengkapi dengan Surat Tanda Coba Kendaraan Bermotor',
            ];
            $selectedValues = array_filter($selectedValues, function ($value) {
                return $value !== '0';
            });
            $selectedLabels = array_map(function ($value) use ($pelanggaranOptions) {
                return $pelanggaranOptions[$value];
            }, $selectedValues);
            $result = implode(', ', $selectedLabels);

            $templateProcessor->setValue('pelanggaran', $result);
            // Save the Word document
            $wordOutputPath = 'TemplateWord/' . $index->nama_korban . '.docx';
            $templateProcessor->saveAs($wordOutputPath);

            //    // Convert Word to PDF
            //    $pdfOutputPath = 'TemplateWord/generated_document.pdf';
            //    $pdf = PDF::loadView('pdf.template', ['key' => 'value']); // Assuming 'pdf.template' is your PDF view
            //    $pdf->save($pdfOutputPath);

            // Return a download response
            return response()->download($wordOutputPath)->deleteFileAfterSend(true);
        } else {
            return "DATA YANG ANDA CARI TIDAK ADA !";
        }
    }
}
