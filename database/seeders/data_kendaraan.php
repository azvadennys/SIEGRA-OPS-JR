<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class data_kendaraan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `data_kendaraan` (`nopol`, `jenis_kendaraan`, `nama`, `alamat`, `no_hp`, `tgl_pkb`, `created_at`, `updated_at`) VALUES
        ('BD1002GQ', 'C1', 'RACHMAN HIDAYAT', 'JLN BANTENG NO 82/126 RT 02/01 KEL KAMPUNG PENSIUNAN KEC KEPAHIANG KAB', '6285320197002', '2023-10-29', NULL, NULL),
        ('BD1036ET', 'C1', 'ADI GUNA LUKITO', 'JL SUMAS RAYA NO 05 RT/RW 006/002 KEL KANDANG MAS KEC KAMPUNG MELAYU KOT', '6285377667000', '2023-09-22', NULL, NULL),
        ('BD1124EW', 'C1', 'SALEH', 'JL SUNGAI RUPAT 2 RT/RW 047/007 KEL PAGAR DEWA KEC SELEBAR KOTA BENGKULU', '6285307370297', '2023-09-14', NULL, NULL),
        ('BD1135CD', 'C1', 'RENGGA FAJRI', 'JL SAMSUL BAHRUN PURI MAS BLOK L4 RT 17/01 KEL BENTIRING KEC MB HULU KOTA', '6285268489900', '2023-09-16', NULL, NULL),
        ('BD1143DG', 'C1', 'BAMBANG WASKITO', 'DESA BUKIT BERLIAN RT 001 KEC ULOK KUPAI KAB BENGKULU UTARA', '6285268478930', '2023-11-21', NULL, NULL),
        ('BD1145CR', 'C1', 'NOVIE SETIAWAN', 'JL SUNGAI RUPAT 1 RT 37/07 KEL PAGAR DEWA KEC SELEBAR KOTA BENGKULU', '6281367648585', '2023-11-16', NULL, NULL),
        ('BD1165BA', 'C1', 'OPET ZULHAFIS', 'JL RAYA PADANG JAWI BUNGA MAS KAB BENGKULU SELATAN', '6285283091871', '2023-10-16', NULL, NULL),
        ('BD1169PC', 'C1', 'AM SUGIANTO', 'TALANG PADANG KEL TALANG PADANG KEC TALO KECIL KAB SELUMA', '6285268777787', '2023-10-01', NULL, NULL),
        ('BD1193IZ', 'C1', 'YULITA', 'JL ARU JAJAR BLOK G NO 11 RT 22/08 KEL PEKAN SABTU KEC SELEBAR KOTA BENGKULU', '6282175522226', '2023-10-30', NULL, NULL),
        ('BD1196CA', 'C1', 'ROMBO ROBERTO', 'JL BUMI AYU 5 RT/RW 005/001 KEL BUMU AYU KEC SELEBAR KOTA BENGKULU', '6285381683202', '2023-10-07', NULL, NULL),
        ('BD1201CF', 'C1', 'FIRMANSYAH PUTRA', 'JL BERINGIN NO 38 RT/RW 006/003 KEL PADANG JATI KEC RATU SAMBAN KOTA BENGKU', '6285273276042', '2023-11-20', NULL, NULL),
        ('BD1216IZ', 'C1', 'DEBBY AFRIANSYAH', 'JL BANDARAYA RT 020 RW 001 KEL PEMATANG GUBERNUR KEC MUARA BANGKAHULU KOTA BENGK', '6285282774147', '2023-11-04', NULL, NULL),
        ('BD1342BD', 'C1', 'YALENSA SUNETASARI', 'JL JEND A YANI NO 15 RT/RW 006/000 KEL IBUL KEC KOTA MANNA KAB BENGKULU SELATAN', '62811738877', '2023-11-11', NULL, NULL),
        ('BD1470CA', 'C1', 'SARWANTO', 'PERUM KEHUTANAN BLOK D/22 RT 017 RW 006 KEL SUKARAMI KEC SELEBAR KOTA BENG', '6285268200799', '2023-11-26', NULL, NULL),
        ('BD1521CP', 'C1', 'TEGUH SUHARIJONO', 'PRUM BINA HARAPAN BLOK G NO 2 KEL LINGKARAN BARAT KOTA BENGKULU', '6282121240132', '2023-09-13', NULL, NULL),
        ('BD1530CQ', 'C1', 'ERIK RAHMAN HIDAYAT', 'JL GELATIK RAYA NO 124 RT 003/001 DS CEMPAKA PERMAI KEL GADING CEMPAKA KOTA B', '6285273670646', '2023-11-08', NULL, NULL),
        ('BD1550P ', 'C1', 'TUSAHALIN', 'KARANG DAPO KEC SEMIDANG ALAS MARAS KAB SELUMA', '6283896951489', '2023-12-05', NULL, NULL),
        ('BD1650EA', 'C1', 'HENDRI', 'JL SADANG 4 BLOK B 6 RT/RW 011/003 KEL LINGKAR BARAT KEC GADING CEMPAKA KOT', '6282280851341', '2023-12-16', NULL, NULL),
        ('BD1672DQ', 'C1', 'AJI TRIKAYA PARISUDA', 'DUSUN II RT/RW 006/ KEL TANJUNG HARAPAN KEC ULOK KUPAI BENGKULU UTARA', '6282306816661', '2023-09-21', NULL, NULL),
        ('BD1684ND', 'C1', 'TEGUH WALUYO', 'PONDOK KANDANG KEL PONDOK KANDANG KEC PONDOK SUGUH KAB MUKOMUKO', '6282250333216', '2023-12-19', NULL, NULL),
        ('BD1738PL', 'C1', 'JULANI', 'MUARA TIMPUT RT/RW 000/ KEL MUARA TIMPUT KEC SEMIDANG ALAS MARAS SELUMA', '6285267289199', '2023-09-03', NULL, NULL),
        ('BD1742BB', 'C1', 'LING LING', 'JL JENDERAL SUDIRMAN RT 06 KEL TANJUNG MULIA KEC PASAR MANNA KAB B/S', '6285267777779', '2023-12-15', NULL, NULL),
        ('BD1943EV', 'C1', 'HARDIANSYAH', 'JL KAPUAS III NO 26 RT/RW 017/005 KEL PADANG HARAPAN KEC GADING CEMPAKA KOTA', '6282177736589', '2023-09-15', NULL, NULL),
        ('BD1943KB', 'C1', 'DIAN ROSMITA', 'JL DI PANJAITAN NO 91 RT 3/5 TL BENIH CURUP R/L', '6285269182028', '2023-11-07', NULL, NULL),
        ('BD1960PZ', 'C1', 'SUGIANTO', 'KETAPANG BARU KEC SEMIDANG ALAS MARAS KAB SELUMA', '6282387869550', '2023-09-26', NULL, NULL),
        ('BD1967BL', 'C1', 'ELI SURIANI', 'JL VETERAN GANG RAMBUTAN RT/RW 005/000 KEL PADANG KAPUK KEC KOTA MANNA BENGKU', '6285357721313', '2023-11-06', NULL, NULL),
        ('BD2015SU', 'C1', 'NANDA ADE FRADITA', 'TALANG LEMBAK KEL TALANG LEMBAK KEC AIR BESI KABUPATEN BENGKULU UTARA', '6282312234400', '2023-11-24', NULL, NULL),
        ('BD2016CM', 'C1', 'NURHAYATI', 'JL RE MARTADINATA NO 03 RT/RW 4/1 KEL KANDANG KEC KP MELAYU KOTA BKL', '6285664290245', '2023-11-23', NULL, NULL),
        ('BD2075PV', 'C1', 'RINJO', 'PERING BARU KEL PERING BARU KEC TALO KECIL KAB SELUMA', '6282298594230', '2023-11-05', NULL, NULL),
        ('BD2180CA', 'C1', 'MALIANA', 'JL RAYA BUMI AYU NO 17 RT 004/001 KEL BUMI AYU KEC SELEBAR KOTA BENGKULU', '6282175907466', '2023-11-30', NULL, NULL),
        ('BD2257TC', 'C1', 'VIO SARI FITRIANI', 'DESA BANDAR JAYA KEL BANDAR JAYA KEC TERAMANG JAYA KAB MUKOMUKO', '6282217150453', '2023-09-10', NULL, NULL),
        ('BD2259GK', 'C1', 'ICHSANUL FIKRI', 'DESA PERMU BAWAH KEC KEPAHIANG KAB KEPAHIANG', '6282231446188', '2023-12-17', NULL, NULL),
        ('BD2304PV', 'C1', 'MIMI HARTATI', 'PERING BARU KEL PERING BARU KEC TALO KECIL KAB SELUMA', '6285664766597', '2023-11-17', NULL, NULL),
        ('BD2304SS', 'C1', 'RIFKI GUNAWAN', 'JL SITI KHADIJAH RT/RW 008/001 KEL GUNUNG ALAM KEC KOTA ARGA MAKMUR BENG', '6285268841700', '2023-09-09', NULL, NULL),
        ('BD2462CS', 'C1', 'SARWEDI NASUTION', 'PEMATANG GUBERNUR RT/RW 009/005 KEL PEMATANG GUBERNUR KOTA BENGKULU', '6285366963403', '2023-09-08', NULL, NULL),
        ('BD2465SN', 'C1', 'DIERA DAMAYANTI', 'JL RD POROS RT 019 RW 003 KEL SUKA MAKMUR KEC MARGA SAKTI SEBELAT KAB BEN', '6285267670693', '2023-09-25', NULL, NULL),
        ('BD2490SN', 'C1', 'DETIA NINGSIH', 'JL TEMANGGUNG KEL AIR PUTIH KEC MARGA SAKTI SEBELAT KAB BENGKULU UTARA', '6282282786402', '2023-09-28', NULL, NULL),
        ('BD2496CM', 'C1', 'FRENDI SATRIA', 'PERUM BETUNGAN RT/RW 016/002 KEL BETUNGAN KEC SELEBAR KOTA BENGKULU', '6283841587832', '2023-12-01', NULL, NULL),
        ('BD2715PV', 'C1', 'TASMIN DARMADI', 'TALANG BERINGIN KEL TALANG BERINGIN KEC SEMIDANG ALAS MARAS KAB SELUMA', '6283841587853', '2023-12-06', NULL, NULL),
        ('BD2778CI', 'C1', 'MISSRA', 'PERUMAHAN PONDOK INDAH MERAWAN 20 E KOFLING E15 RT 26/07 KEL SAWAH LEBAR KOT', '6281271802561', '2023-09-05', NULL, NULL),
        ('BD2819KK', 'C1', 'HABIB MUSTAIN', 'GANG MERPATI RT 12/1 KEL AP LAMA KEC CURUP KAB R/L', '6285709961970', '2023-10-11', NULL, NULL),
        ('BD3008SN', 'C1', 'ZULKIFLI', 'DUSUN SIDOREJO RT/RW 003/006 KEL SIDO MUKTI KEC PADANG JAYA BENGKULU UTARA', '6281367337767', '2023-10-26', NULL, NULL),
        ('BD3087GL', 'C1', 'ELKAR NAZRUDDIN', 'KEL PADANG LEKAT RT/RW 5/1 KEL PADANG LEKAT KEC KEPAHIANG KAB KEPAHIANG', '6281367379555', '2023-12-24', NULL, NULL),
        ('BD3182EI', 'C1', 'MUJIANTO BANURUSMAN', 'JL TERATAI GG TERATAI II RT 03/01 KEL SUMBER JAYA KEC KAMPUNG MELAYU KOTA BEN', '6282262242271', '2023-09-23', NULL, NULL),
        ('BD3198WH', 'C1', 'RIKI REDO TRY WINDRA', 'PASAR LAMA RT/RW / KEL PASAR LAMA KEC KAUR SELATAN KAUR', '6282186974439', '2023-11-22', NULL, NULL),
        ('BD3348AQ', 'C1', 'MIMI TASINI', 'JL HIBRIDA RAYA NO 1 RT 25/7 KEL SIDO MULYO KEC GADING CEMPAKA BKL', '6281632367885', '2023-10-12', NULL, NULL),
        ('BD3412CF', 'C1', 'SELVI KAROLINA', 'JL SUMAS RT 6/2 KEL KANDANG MAS KEC KAMPUNG MELAYU KOTA BENGKULU', '6282375559641', '2023-09-18', NULL, NULL),
        ('BD3570IL', 'C1', 'KIKI VOTRISA', 'JL RADEN FATAH ANGGREK I RT 6/1 PAGAR DEWA SELEBAR BENGKULU', '6281271748962', '2023-10-04', NULL, NULL),
        ('BD3720IL', 'C1', 'MITRA KUSUMA', 'JL DP NEGARA PERUM VILLA INDAH PESONA BLOK F NO 90 RT 40/09 KEL SUKARAMI KEC', '6285367081678', '2023-10-06', NULL, NULL),
        ('BD3833SU', 'C1', 'ARDIANTO', 'JL M S BATU BARA RT 5 KEL PURWODADI KEC ARGA MAKMUR KAB BENGKULU UTARA', '6282282617565', '2023-11-18', NULL, NULL),
        ('BD3860PM', 'C1', 'RISKAN', 'KAYU ARANG KEL KAYU ARANG KEC SUKARAJA KAB SELUMA', '6281373339801', '2023-11-13', NULL, NULL),
        ('BD3947MC', 'C1', 'ROMEI DESTA', 'JL PEMANGKU BASRI II RT/RW 008/003 KEL TANJUNG MULIA PASAR MANNA KAB BKL SEL', '6282372318100', '2023-09-20', NULL, NULL),
        ('BD3948KT', 'C1', 'RIA SANDI', 'JL SYAHRIAL NO 95 RT/RW 002/001 KEL KARANG ANYAR KEC CURUP TIMUR REJANG LEB', '6285310598618', '2023-10-09', NULL, NULL),
        ('BD4196IL', 'C1', 'FAHRUL ROZI', 'JL KZ ABIDIN NO 36 RT 4/1 KEL BELAKANG PONDOK KEC RATU SAMBAN KOTA BENGKULU', '6281271034212', '2023-10-14', NULL, NULL),
        ('BD4359EK', 'C1', 'MEIDY ERWANTO', 'JL HIBRIDA III GG MAYANG 4 NO 34 RT 27/6 KEL SIDOMULYO KOTA BKL', '6285267262242', '2023-11-19', NULL, NULL),
        ('BD4376SS', 'C1', 'WITANTO', 'DESA AIR SEKAMANAK RT 014 RW 004 KEC PINANG RAYA KAB BENGKULU UTARA', '6285768201116', '2023-12-22', NULL, NULL),
        ('BD4389GK', 'C1', 'DEDI ARDIYANSYAH', 'JL KAMPUNG BOGOR NO 09 RT 004 RW 002 KEL PENSIUNAN KEC KEPAHIANG KABUPATEN', '628984679293', '2023-11-03', NULL, NULL),
        ('BD4405CV', 'C1', 'ARIE HANDOKO', 'PERUM BENTIRING INDAH BLOK E RT/RW 003/001 KEL BENTIRING KEC MUARA BANGKA', '6285269606661', '2023-10-02', NULL, NULL),
        ('BD4415KW', 'C1', 'MIFTA OCSAMANIKA', 'AIR MELES ATAS KEL AIR MELES ATAS KEC SELUPU REJANG KAB REJANG LEBONG', '6281278354639', '2023-12-10', NULL, NULL),
        ('BD4436HG', 'C1', 'REKO PRANATA', 'DUSUN II KEL PUNGGUK PEDARO KEC BINGIN KUNING KAB LEBONG', '6285789456325', '2023-11-15', NULL, NULL),
        ('BD4476MF', 'C1', 'INDAH MAWARDIKA', 'JL PANGERAN JEPUT RT 10 KEL IBUL KEC KOTA MANNA KAB BENGKULU SELATAN', '6281273688193', '2023-12-26', NULL, NULL),
        ('BD4483KR', 'C1', 'LILI HERAWATI', 'KEL TALANG RIMBO LAMA RT 02/02 KEC CURUP TENGAH KAB REJANG LEBONG', '6282285050605', '2023-09-04', NULL, NULL),
        ('BD4484EO', 'C1', 'NOVA SURYA ANGGRAINI', 'JL KALIMANTAN NO 01 RT 12/01 KEL RAWA MAKMUR KEC MB HULU KOTA BENGKULU', '6285273988566', '2023-11-12', NULL, NULL),
        ('BD4533SS', 'C1', 'DIAN FEBRIANTO', 'DESA BALAM RT/RW 002/ KEL DUSUN BALAM KEC AIR PADANG KAB BENGKULU UTARA', '6282371879381', '2023-12-29', NULL, NULL),
        ('BD4603SJ', 'C1', 'SUDAR', 'DUSUN SUKA INDAH RT/RW 001/010 KEL SUKA MAKMUR KEC GIRI MULYA BENGKULU UTA', '6285609416354', '2023-10-22', NULL, NULL),
        ('BD4613SP', 'C1', 'DESIMON ITA ARISTIEN', 'JL FLAMBOYAN RT 005 RW 003 KEL GIRI KENCANA KEC KETAHUN KAB BKL UTARA', '6281377700092', '2023-12-13', NULL, NULL),
        ('BD4778CI', 'C1', 'JANGKUNG RIYANTO', 'JL LESTARI 4 NO 07 RT 15/3 KANDANG KEC KAMPUNG MELAYU KOTA BENGKULU', '6281368407555', '2023-10-08', NULL, NULL),
        ('BD4814IH', 'C1', 'AISYAH HAYATULLAH', 'JL WR SUPRATMAN RT/RW 007/001 KEL KANDANG LIMUN KEC MUARA BANGKA HULU KOT', '6285219449193', '2023-12-02', NULL, NULL),
        ('BD4839CV', 'C1', 'BAMBANG', 'PERUMAHAN KEMILING ASRI BLOK D/19 RT/RW 011/008 KEL PEKAN SABTU KEC SELEBAR KO', '6285896100083', '2023-10-10', NULL, NULL),
        ('BD4843EI', 'C1', 'ANDRY HARIJANTO', 'JL JERUK NO 120 RT/RW 033/011 KEL PANORAMA KEC GD CEMPAKA KOTA BENGKULU', '6281367787285', '2023-09-30', NULL, NULL),
        ('BD4875NW', 'C1', 'OKTAVIAMI MANULLANG', 'DESA PULAU PAYUNG KEC IPUH KAB MUKOMUKO ', '6281373317797', '2023-09-19', NULL, NULL),
        ('BD4940TC', 'C1', 'MARYANI', 'SIBAK RT 003 RW 001 KEL SIBAK KEC IPUH KAB MUKOMUKO', '6282289200233', '2023-12-07', NULL, NULL),
        ('BD4982EJ', 'C1', 'ARI SUSANTI', 'JL MERAPI 15 NO 86 RT 18/04 KEL KEBUN TEBENG KEC RATU AGUNG KOTA BENGKULU', '6285268090001', '2023-12-21', NULL, NULL),
        ('BD5079CP', 'C1', 'GDA SUBARDINI', 'JL D P NEGARA V NO 96 RT/RW 024/005 KEL PAGAR DEWA KEC SELEBAR BENGKULU', '6285267602201', '2023-12-09', NULL, NULL),
        ('BD5092GG', 'C1', 'DECO APRILLIANSYAH', 'JL TUNGGAL NO 03 RT/RW 006/003 KEL PASAR SEJANTUNG KEC KEPAHIANG KEPAHIANG', '6282281273661', '2023-12-18', NULL, NULL),
        ('BD5141EU', 'C1', 'PRANOTO', 'JL KAMPAR KUALA LEMPUING RT 15/03 KEL LEMPUING KOTA BENGKULU', '6285788126829', '2023-12-08', NULL, NULL),
        ('BD5229PT', 'C1', 'BUHARLAN', 'TALANG KEMANG RT 000/RW 000 KEL JAMBAT AKAR KEC SEMIDANG ALAS MARAS KAB SELUM', '6285307360311', '2023-09-24', NULL, NULL),
        ('BD5291CI', 'C1', 'HERI PANJAITAN', 'JL HIBRIDA 3 RT/RW 18/01 KEL SIDOMULYO KEC GADING CEMPAKA KOTA BENGK', '6282184057526', '2023-10-21', NULL, NULL),
        ('BD5303WD', 'C1', 'JULIANTO', 'LINAU KEL LINAU KEC MAJE KAB KAUR ', '628117384700', '2023-10-23', NULL, NULL),
        ('BD5339ME', 'C1', 'SUMARMI', 'JL MAKAM PAHLAWAN RT 7 KEL KAMPUNG BARU KEC KOTA MANNA KAB BKL SELATAN', '6281366162452', '2023-12-03', NULL, NULL),
        ('BD5361GG', 'C1', 'MAYA SISKA', 'PERUM CGI BLOK I NO 03 RT/RW 0/0 KEL TEBAT MONOK KEC KEPAHIANG KAB KEPAHIAN', '6283176804588', '2023-12-30', NULL, NULL),
        ('BD5481ME', 'C1', 'REDO FARENDRA', 'JL RAJA KHAHLIFAH RT 03 RW 00 KOTA MEDAN KECAMATAN KOTA MANNA KAB BKL SELATAN', '6281276569351', '2023-12-12', NULL, NULL),
        ('BD5502GI', 'C1', 'RYANTO HUTABARAT', 'JLN P DAN K NO 29 RT/RW 2/1 KEL PASAR SEJANTUNG KEC KEPAHIANG KAB KEPAHIANG', '6285383852924', '2023-12-27', NULL, NULL),
        ('BD5510B ', 'C1', 'MUHAMMADSYAH PUTRA', 'JL AFFAN BACHSIN NO 69 RT 01 KEC KOTA MANNA KAB BENGKULU SELATAN', '6285231313157', '2023-11-29', NULL, NULL),
        ('BD5609WH', 'C1', 'SUNANTO', 'PELAK GILIK RT/RW 000/000 KEL PASAR SAOH KEC KAUR SELATAN KAUR', '6282280511110', '2023-11-25', NULL, NULL),
        ('BD5619CZ', 'C1', 'FAUZAN HALIM', 'JL TRIBATA PRUM POLDA BLOK F/16 RT 24/08 KEL CEMPAKA PERMAI KEC GD CEMPA', '6281273871529', '2023-09-06', NULL, NULL),
        ('BD5634PT', 'C1', 'MELTI', 'MUARA TIMPUT KEL KETAPANG BARU KEC SEMIDANG ALAS MARAS KAB SELUMA', '6282185005820', '2023-11-10', NULL, NULL),
        ('BD5637SQ', 'C1', 'EKA SETIAWAN', 'JL KENANGAN RT 004 RW 001 KEL GIRI KE NCANA KEC KETAHUN KAB BENGKULU UTARA', '6287784333846', '2023-09-02', NULL, NULL),
        ('BD5658GE', 'C1', 'AZARDI', 'DESA PERADUAN BINJAI KEL PERADUAN BINJAI KEC TEBAT KARAI KAB KEPAHIANG', '6283137886966', '2023-10-03', NULL, NULL),
        ('BD5750SQ', 'C1', 'ANITA INDRIANI', 'SIDO MUKTI RT 1/3 KEC PADANG JAYA KAB BENGKULU UTARA', '6282280044998', '2023-09-12', NULL, NULL),
        ('BD5797IB', 'C1', 'ALEK', 'GG SEMANGKA RT 010 RW 003 KEL PADANG SERAI KEC KAMPUNG MELAYU KOTA BENGKULU', '6285838540591', '2023-10-18', NULL, NULL),
        ('BD6032CP', 'C1', 'NORMAN EFENDY', 'JL TIMUR INDAH 3 NO 43 RT 26/03 KEL SIDOMULYO KEC GD CEMPAKA KOTA BENGKU', '6282179131379', '2023-11-28', NULL, NULL),
        ('BD6085CR', 'C1', 'ANA SARI', 'JL SETIA NEGARA NO 19 RT/RW 12/4 KEL KANDANG MAS KEC KAMPUNG MELAYU BENGKULU', '6282373107764', '2023-10-13', NULL, NULL),
        ('BD6103BR', 'C1', 'APRIDA WATI', 'JL A YANI NO 22 RT 06 KEL IBUL KEC KOTA MANNA KAB BENGKULU SELATAN', '6283896951463', '2023-10-05', NULL, NULL),
        ('BD6119EV', 'C1', 'FARAMITA', 'JL PUTRI GD CEMPAKA RT 1/1 PENURUNAN KEC RATU SAMBAN KOTA BKL', '6282126740006', '2023-12-20', NULL, NULL),
        ('BD6143ER', 'C1', 'SYAMSURIZAL', 'JL MERAPI UJUNG 18 RT 26/09 KEL PANORAMA KEC SINGARAN PATI KOTA BENGKUL', '6281363114425', '2023-10-25', NULL, NULL),
        ('BD6207CV', 'C1', 'NANDA SYAHPUTRA', 'JL KEPONDANG NO 42 BLOK 8 RT 21/07 KEL CEMPAKA PERMAI KOTA BENGKULU', '6282289830319', '2023-11-09', NULL, NULL),
        ('BD6314CO', 'C1', 'WIDYANTO', 'JL SUNGAI RUPAT RT/RW 037/007 KEL PAGAR DEWA KEC SELEBAR BENGKULU', '6281273446696', '2023-10-24', NULL, NULL),
        ('BD6319IB', 'C1', 'ARIA PENDRA SEPTIYAN', 'JL BUMI AYU 3 RT 003 RW 001 KEL BUMI AYU KEC SELEBAR KOTA BENGKULU', '6285609760276', '2023-10-31', NULL, NULL),
        ('BD6467KL', 'C1', 'NAOMI ERSANLY SITUMORANG', 'JL DR AK GANI GG FAMILY RT 03/2 JL BARU CURUP KAB R/L', '6282164480484', '2023-12-23', NULL, NULL),
        ('BD6502MG', 'C1', 'ZUROIDAH', 'JL KARTINI NO 3 KEL KAMPUNG BARU KEC KOTA MANNA KAB BENGKULU SELATAN', '6281377854035', '2023-10-28', NULL, NULL),
        ('BD6504SM', 'C1', 'JOKO WALUYO', 'DS MARGA JAYA RT 2 KEL MARGA JAYA KEC PADANG JAYA KAB BENGKULU UTARA', '6282279185622', '2023-10-17', NULL, NULL),
        ('BD6506YA', 'C1', 'DEDI KURNIAWAN', 'ABU SAKIM KEC PONDOK KELAPA KAB BENGKULU TENGAH', '6289515531266', '2023-11-02', NULL, NULL),
        ('BD6523SK', 'C1', 'ABDUL ROFIK', 'JL SYAMSUL BAHRUN RT 009 KEL PURWODADI KEC ARGA MAKMUR BENGKULU UTARA', '6282373908880', '2023-10-20', NULL, NULL),
        ('BD6541CA', 'C1', 'BUDHI HARTANTO', 'JL RE MARTADINATA 6 RT 43/08 KEL PAGAR DEWA KEC SELEBAR KOTA BENGKULU', '6285283332158', '2023-11-14', NULL, NULL),
        ('BD6550SK', 'C1', 'ZARKONI', 'JL CUT NYAK DIEN GG RAJAWALI RT 003 KEL PURWODADI KEC ARGA MAKMUR KAB BEN', '6282185146453', '2023-10-19', NULL, NULL),
        ('BD6573PS', 'C1', 'ARSAN', 'DESA RIMBO BESAR KEC SEMIDANG ALAS MARAS KAB SELUMA', '6285266978015', '2023-10-15', NULL, NULL),
        ('BD6585CZ', 'C1', 'AHMAD FAHMI', 'JL DP NEGARA NO 05 RT/RW 020/004 KEL PAGAR DEWA KEC SELEBAR KOTA BENGKULU', '6285377725477', '2023-09-29', NULL, NULL),
        ('BD6638BU', 'C1', 'DARMADI', 'JL RAYA MASAT RT/RW 002/000 KEL MASAT KEC PINO KAB BENGKULU SELATAN', '6285268073872', '2023-09-17', NULL, NULL),
        ('BD6643PO', 'C1', 'MAZI TAHIR', 'MUARA TIMPUT KEL KETAPANG BARU KEC SEMIDANG ALAS MARAS SELUMA', '6285367857869', '2023-10-27', NULL, NULL),
        ('BD6719HE', 'C1', 'TEDI EFRIYAN', 'LOKASARI RT/RW 003/015 KEL LOKASARI KEC LEBONG UTARA LEBONG', '6281386002175', '2023-09-27', NULL, NULL),
        ('BD6808ET', 'C1', 'ANDIA NOPITA RIZAL', 'JL S KAHAYAN NO 64 RT 18/5 TANAH PATAH KEC RATU AGUNG KOTA BENGKULU', '6282377992117', '2023-12-04', NULL, NULL),
        ('BD6836PN', 'C1', 'AHMAD TAVIP', 'SP III PAGAR GASING KEL DURIAN BUBUR KEC TALO KAB SELUMA', '6281279680350', '2023-12-14', NULL, NULL),
        ('BD6934HB', 'C1', 'SRI ROSTUTI', 'PERUMAHAN BTN NANGAI TAYAU NO 4A KEL NANGAI TAYAU KEC AMEN KAB LEBONG', '6281373744523', '2023-11-01', NULL, NULL),
        ('BD6958PI', 'C1', 'ZAINUL ABIDIN', 'MUARA TIMPUT KEL KETAPANG BARU KEC SEMIDANG ALAS MARAS KAB SELUMA', '6282176801230', '2023-12-11', NULL, NULL),
        ('BD8423P ', 'C1', 'PEPRODEN', 'KEL MUARA TIMPUT KEC SEMIDANG ALAS MARAS KAB SELUMA', '6281393122971', '2023-12-28', NULL, NULL),
        ('BD9151AO', 'C1', 'MUZAIMAH', 'JL BUMI AYU RT/RW 002/002 KEL BUMU AYU KEC SELEBAR KOTA BENGKULU', '6285368490009', '2023-09-07', NULL, NULL),
        ('BD9822CZ', 'C1', 'AGRI PRIMA JUWASTA', 'JL PARKIT NO 83 RT 04/01 KEL CEMPAKA PERMAI KEC GADING CEMPAKA BKL', '6282269421963', '2023-11-27', NULL, NULL)");
    }
}
