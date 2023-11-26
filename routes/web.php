<?php

use App\Http\Controllers\balasanControler;
use App\Http\Controllers\diskusiControler;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [diskusiControler::class, 'index'])->name('/');
// Route::post('/', [diskusiControler::class, 'store'])->name('diskusi.tambah');
// Route::get('/detail/{id}', [diskusiControler::class, 'show'])->name('diskusi.detail');
// Route::post('/detail/balasan', [balasanControler::class, 'store'])->name('balasan.tambah');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\DataKecelakaanControler;
use App\Http\Controllers\DataKendaraanController;
use App\Http\Controllers\korbanControler;
use App\Http\Controllers\LaporanControler;
use App\Http\Controllers\PenolakanControler;
use Telegram\Bot\Laravel\Facades\Telegram;


// Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
// Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');

Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

Route::get('/laporan-penolakan/{id}/{name}', [LaporanControler::class, 'laporanWord'])->name('laporan.penolakan');
Route::middleware(['auth'])->group(function () {
	Route::get('/', function () {
		return redirect('/dashboard');
	});
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

	Route::controller(DataKecelakaanControler::class)->group(function () {
		Route::get('/kecelakaan', 'index')->name('kecelakaan');
		Route::get('/kecelakaan/create', 'create')->name('kecelakaan.create');
		Route::post('/kecelakaan/store', 'store')->name('kecelakaan.store');
		Route::get('/kecelakaan/{id}/detail', 'show')->name('kecelakaan.detail');
		Route::get('/kecelakaan/{id}/edit', 'edit')->name('kecelakaan.edit');
		Route::post('/kecelakaan/{id}', 'update')->name('kecelakaan.update');
		Route::delete('/kecelakaan/delete/{id}', 'destroy')->name('kecelakaan.destroy');
	});
	Route::controller(PenolakanControler::class)->group(function () {


		Route::get('/penolakan-santunan', 'indexPenolakan')->name('penolakanSantunan');
	});
	Route::controller(DataKendaraanController::class)->group(function () {
		Route::get('/kendaraan', 'index')->name('kendaraan');
		Route::get('/kendaraan/create', 'create')->name('kendaraan.create');
		Route::post('/kendaraan/store', 'store')->name('kendaraan.store');
		Route::get('/kendaraan/{id}/detail', 'show')->name('kendaraan.detail');
		Route::get('/kendaraan/{id}/edit', 'edit')->name('kendaraan.edit');
		Route::post('/kendaraan/{id}', 'update')->name('kendaraan.update');
		Route::delete('/kendaraan/delete/{id}', 'destroy')->name('kendaraan.destroy');
	});


	Route::get('/laporan-rekapitulasi', [LaporanControler::class, 'index'])->name('laporan');
	Route::post('/laporan-rekapitulasi/cetak', [LaporanControler::class, 'cetak'])->name('laporan.cetak');

	Route::get('/laporan-kecelakaan', [LaporanControler::class, 'indexKecelakaan'])->name('laporan.kecelakaan');
	Route::post('/laporan-kecelakaan/cetak', [LaporanControler::class, 'cetakKecelakaan'])->name('laporan.kecelakaan.cetak');
});

// Route untuk mengaktifkan mode maintenance
Route::get('/maintenance/on', function () {
	// Mendapatkan IP Address pengguna
	$ipAddress = request()->ip();

	// Mendapatkan informasi perangkat pengguna
	$userAgent = request()->userAgent();
	$secretCode = 'azvadenTech'; // Ganti dengan secret code yang sesuai
	$message = '*Project: SI Jasaraharja*' . PHP_EOL .
		'_Website dalam mode Maintenance_❌' . PHP_EOL .
		'Domain: ' . request()->getHttpHost() . PHP_EOL .
		'Secret Code: ' . $secretCode . PHP_EOL .
		'IP Address: ' . $ipAddress . PHP_EOL . PHP_EOL .
		'User Agent: ' . PHP_EOL . $userAgent;

	$chat_id = '5163645049'; // Ganti dengan ID chat yang sesuai

	// Telegram::sendMessage([
	// 	'chat_id' => $chat_id,
	// 	'text' => $message,
	// 	'parse_mode' => 'Markdown',
	// ]);

	Artisan::call("down --secret={$secretCode}");


	return redirect('/dashboard');
});

// Route untuk menonaktifkan mode maintenance
Route::get('/maintenance/off', function () {
	Artisan::call('up');
	// Mendapatkan IP Address pengguna
	$ipAddress = request()->ip();

	// Mendapatkan informasi perangkat pengguna
	$userAgent = request()->userAgent();
	$message = '*Project: SI Jasaraharja*' . PHP_EOL .
		'_Website dalam mode Non-Maintenance_ ✅' . PHP_EOL .
		'Domain: ' . request()->getHttpHost() . PHP_EOL .
		'IP Address: ' . $ipAddress . PHP_EOL . PHP_EOL .
		'User Agent: ' . PHP_EOL . $userAgent;
	$chat_id = '5163645049'; // Ganti dengan ID chat yang sesuai

	// Telegram::sendMessage([
	// 	'chat_id' => $chat_id,
	// 	'text' => $message,
	// 	'parse_mode' => 'Markdown',
	// ]);
	return  redirect('/dashboard');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
