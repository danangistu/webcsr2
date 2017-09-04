<?php

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
//     return view('dashboard.index');
// });

Auth::routes();
Route::get('/', 'DashboardController@index');
Route::get('logout', 'Auth\LoginController@logout');
//Sarana dan Prasarana
Route::resource('sarana', 'SaranaController');
Route::get('sarana/delete/{id}', 'SaranaController@destroy');
Route::post('sarana/anggaran', 'SaranaController@anggaran');
Route::get('sarana/get-anggaran/{id}', 'SaranaController@getAnggaran');
Route::post('sarana/create/laporan/{id}', 'SaranaController@getLaporan');
Route::post('sarana/submit/laporan', 'SaranaController@postLaporan');
//Pelayanan Kesehatan
Route::resource('kesehatan', 'KesehatanController');
Route::get('kesehatan/delete/{id}', 'KesehatanController@destroy');
Route::get('kesehatan/pengobatan/{id}', 'PengobatanController@index');
Route::get('kesehatan/pengobatan/create/{id}', 'PengobatanController@create');
Route::post('kesehatan/pengobatan', 'PengobatanController@store');
Route::get('kesehatan/pengobatan/edit/{id}', 'PengobatanController@edit');
Route::post('kesehatan/pengobatan/edit/{id}', 'PengobatanController@update');
Route::get('kesehatan/pengobatan/delete/{id}', 'PengobatanController@destroy');
Route::post('kesehatan/anggaran', 'KesehatanController@anggaran');
Route::get('kesehatan/get-anggaran/{id}', 'KesehatanController@getAnggaran');
Route::post('kesehatan/create/laporan/{id}', 'KesehatanController@getLaporan');
Route::post('kesehatan/submit/laporan/{id}', 'KesehatanController@postLaporan');
//Pelayanan Pendidikan
Route::resource('pendidikan', 'PendidikanController');
Route::get('pendidikan/delete/{id}', 'PendidikanController@destroy');
Route::get('pendidikan/penerima/{id}', 'PenerimaController@index');
Route::get('pendidikan/penerima/create/{id}', 'PenerimaController@create');
Route::post('pendidikan/penerima', 'PenerimaController@store');
Route::get('pendidikan/penerima/edit/{id}', 'PenerimaController@edit');
Route::post('pendidikan/penerima/edit/{id}', 'PenerimaController@update');
Route::get('pendidikan/penerima/delete/{id}', 'PenerimaController@destroy');
Route::get('pendidikan/penerima/view/{id}', 'PenerimaController@show');
Route::post('pendidikan/anggaran', 'PendidikanController@anggaran');
Route::get('pendidikan/get-anggaran/{id}', 'PendidikanController@getAnggaran');
Route::post('pendidikan/create/laporan/{id}', 'PendidikanController@getLaporan');
Route::post('pendidikan/submit/laporan/{id}', 'PendidikanController@postLaporan');
//Pelayanan Bencana Alam
Route::resource('bencana', 'BencanaController');
Route::get('bencana/delete/{id}', 'BencanaController@destroy');
Route::get('bencana/pemberian/{id}', 'PemberianController@index');
Route::get('bencana/pemberian/create/{id}', 'PemberianController@create');
Route::post('bencana/pemberian', 'PemberianController@store');
Route::get('bencana/pemberian/edit/{id}', 'PemberianController@edit');
Route::post('bencana/pemberian/edit/{id}', 'PemberianController@update');
Route::get('bencana/pemberian/delete/{id}', 'PemberianController@destroy');
Route::post('bencana/anggaran', 'BencanaController@anggaran');
Route::get('bencana/get-anggaran/{id}', 'BencanaController@getAnggaran');
Route::post('bencana/create/laporan/{id}', 'BencanaController@getLaporan');
Route::post('bencana/submit/laporan/{id}', 'BencanaController@postLaporan');
//Komunikasi Sosial
Route::resource('komunikasi', 'KomunikasiController');
Route::get('komunikasi/delete/{id}', 'KomunikasiController@destroy');
Route::post('komunikasi/anggaran', 'KomunikasiController@anggaran');
Route::get('komunikasi/get-anggaran/{id}', 'KomunikasiController@getAnggaran');
Route::post('komunikasi/create/laporan/{id}', 'KomunikasiController@getLaporan');
Route::post('komunikasi/submit/laporan/{id}', 'KomunikasiController@postLaporan');
//Partisipasi Hari Besar
Route::resource('hari-besar', 'HariBesarController');
Route::get('hari-besar/delete/{id}', 'HariBesarController@destroy');
Route::post('hari-besar/anggaran', 'HariBesarController@anggaran');
Route::get('hari-besar/get-anggaran/{id}', 'HariBesarController@getAnggaran');
Route::post('hari-besar/create/laporan/{id}', 'HariBesarController@getLaporan');
Route::post('hari-besar/submit/laporan/{id}', 'HariBesarController@postLaporan');
//Partisipasi Kegiatan Masyarakat
Route::resource('kegiatan-masyarakat', 'KegiatanController');
Route::get('kegiatan-masyarakat/delete/{id}', 'KegiatanController@destroy');
Route::post('kegiatan-masyarakat/anggaran', 'KegiatanController@anggaran');
Route::get('kegiatan-masyarakat/get-anggaran/{id}', 'KegiatanController@getAnggaran');
Route::post('kegiatan-masyarakat/create/laporan/{id}', 'KegiatanController@getLaporan');
Route::post('kegiatan-masyarakat/submit/laporan/{id}', 'KegiatanController@postLaporan');
//Pelayanan Bantuan Modal
Route::resource('modal', 'ModalController');
Route::get('modal/delete/{id}', 'ModalController@destroy');
Route::get('modal/roadmap/{id}', 'RoadmapController@index');
Route::get('modal/roadmap/create/{id}', 'RoadmapController@create');
Route::post('modal/roadmap', 'RoadmapController@store');
Route::get('modal/roadmap/edit/{id}', 'RoadmapController@edit');
Route::post('modal/roadmap/edit/{id}', 'RoadmapController@update');
Route::get('modal/roadmap/delete/{id}', 'RoadmapController@destroy');
Route::post('modal/anggaran', 'ModalController@anggaran');
Route::get('modal/get-anggaran/{id}', 'ModalController@getAnggaran');
Route::post('modal/create/laporan/{id}', 'ModalController@getLaporan');
Route::post('modal/submit/laporan/{id}', 'ModalController@postLaporan');
//Pelayanan Ketrampilan
Route::resource('ketrampilan', 'KetrampilanController');
Route::get('ketrampilan/delete/{id}', 'KetrampilanController@destroy');
Route::post('ketrampilan/anggaran', 'KetrampilanController@anggaran');
Route::get('ketrampilan/get-anggaran/{id}', 'KetrampilanController@getAnggaran');
Route::get('ketrampilan/create/laporan/{id}', 'KetrampilanController@getLaporan');
Route::post('ketrampilan/submit/laporan/{id}', 'KetrampilanController@postLaporan');
//Pelayanan Pemasaran
Route::resource('pemasaran', 'PemasaranController');
Route::get('pemasaran/delete/{id}', 'PemasaranController@destroy');
Route::post('pemasaran/anggaran', 'PemasaranController@anggaran');
Route::get('pemasaran/get-anggaran/{id}', 'PemasaranController@getAnggaran');
Route::get('pemasaran/create/laporan/{id}', 'PemasaranController@getLaporan');
Route::post('pemasaran/submit/laporan/{id}', 'PemasaranController@postLaporan');
//Pelayanan Bantuan Modal
Route::resource('riset', 'RisetController');
Route::get('riset/delete/{id}', 'RisetController@destroy');
Route::get('riset/roadmap/{id}', 'RisetRoadmapController@index');
Route::get('riset/roadmap/create/{id}', 'RisetRoadmapController@create');
Route::post('riset/roadmap', 'RisetRoadmapController@store');
Route::get('riset/roadmap/edit/{id}', 'RisetRoadmapController@edit');
Route::post('riset/roadmap/edit/{id}', 'RisetRoadmapController@update');
Route::get('riset/roadmap/delete/{id}', 'RisetRoadmapController@destroy');
Route::post('riset/anggaran', 'RisetController@anggaran');
Route::get('riset/get-anggaran/{id}', 'RisetController@getAnggaran');
Route::get('riset/create/laporan/{id}', 'RisetController@getLaporan');
Route::post('riset/submit/laporan/{id}', 'RisetController@postLaporan');
//Regulasi
Route::resource('regulasi', 'RegulasiController');
Route::get('regulasi/delete/{id}', 'RegulasiController@destroy');
//Quick win
Route::resource('quick-win', 'QuickController');
Route::get('quick-win/delete/{id}', 'QuickController@destroy');
//Kode
Route::resource('kode-pendanaan', 'KodeController');
Route::get('kode-pendanaan/delete/{id}', 'KodeController@destroy');
Route::get('cek-kode/{kode}', 'KodeController@cekCode');
//Laporan
Route::get('laporan-pendanaan', 'LaporanController@index');

//SettingLaporan
Route::get('laporan-setting', 'LaporanSettingController@index');
Route::post('laporan-setting', 'LaporanSettingController@store');
Route::get('pengajuan-laporan', 'PengajuanLaporanController@index');
Route::get('pengajuan-laporan/revisi/{id}', 'PengajuanLaporanController@getRevisi');
Route::get('pengajuan-laporan/revisi/fix/{id}', 'PengajuanLaporanController@getRevisiFix');

//laporanSPS
Route::get('laporan-masuk-sps', 'LaporanSPSController@index');
Route::get('laporan-masuk-sps/revisi/{id}', 'LaporanSPSController@getRevisi');
Route::post('laporan-masuk-sps/revisi/{id}', 'LaporanSPSController@postRevisi');
Route::get('laporan-masuk-sps/approve/{id}', 'LaporanSPSController@approve');
//laporanGM
Route::get('laporan-masuk-gm', 'LaporanGMController@index');
Route::get('laporan-masuk-gm/revisi/{id}', 'LaporanGMController@getRevisi');
Route::post('laporan-masuk-gm/revisi/{id}', 'LaporanGMController@postRevisi');
Route::get('laporan-masuk-gm/approve/{id}', 'LaporanGMController@approve');

//Setting
Route::get('setting', 'SettingController@index');
Route::post('setting', 'SettingController@store');
//Profile
Route::get('profile', 'ProfileController@index');
Route::post('profile', 'ProfileController@store');
//Privilege
Route::resource('privilege', 'PrivilegeController');
Route::get('privilege/delete/{id}', 'PrivilegeController@destroy');
Route::get('privilege/role/{id}', 'PrivilegeController@role');
Route::post('privilege/role', 'PrivilegeController@roleSubmit');
//User
Route::resource('users', 'UserController');
Route::get('users/delete/{id}', 'UserController@destroy');
