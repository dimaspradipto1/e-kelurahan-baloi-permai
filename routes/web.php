<?php


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LkController;
use App\Http\Controllers\ADKController;
use App\Http\Controllers\Lk3Controller;
use App\Http\Controllers\WpkController;
use App\Http\Controllers\KBSPController;
use App\Http\Controllers\ODHAController;
use App\Http\Controllers\PMBSController;
use App\Http\Controllers\PRSEController;
use App\Http\Controllers\TkskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\BWBLPController;
use App\Http\Controllers\FasumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NapzaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\WksbmController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\DhuafaController;
use App\Http\Controllers\GerejaController;
use App\Http\Controllers\MasjidController;
use App\Http\Controllers\PindahController;
use App\Http\Controllers\PionerController;
use App\Http\Controllers\SusilaController;
use App\Http\Controllers\TaganaController;
use App\Http\Controllers\TahfizController;
use App\Http\Controllers\JalananController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SembakoController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\PemulungController;
use App\Http\Controllers\PengemisController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\AnakHukumController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KekerasanController;
use App\Http\Controllers\KetuaRtRwController;
use App\Http\Controllers\MinoritasController;
use App\Http\Controllers\PendatangController;
use App\Http\Controllers\TerlantarController;
use App\Http\Controllers\AhliWariseController;
use App\Http\Controllers\AnakKhususController;
use App\Http\Controllers\DuniaUsahaController;
use App\Http\Controllers\PernikahanController;
use App\Http\Controllers\TrafickingController;
use App\Http\Controllers\BencanaAlamController;
use App\Http\Controllers\DisabilitasController;
use App\Http\Controllers\FakirMiskinController;
use App\Http\Controllers\GelandanganController;
use App\Http\Controllers\PantiAsuhanController;
use App\Http\Controllers\KarangTarunaController;
use App\Http\Controllers\AnakKekerasanController;
use App\Http\Controllers\AnakTerlantarController;
use App\Http\Controllers\BencanaSosialController;
use App\Http\Controllers\PindahWilayahController;
use App\Http\Controllers\PenyuluhSosialController;
use App\Http\Controllers\BalitaTerlantarController;
use App\Http\Controllers\SuratKeteranganController;
use App\Http\Controllers\FasilitasOlahragaController;
use App\Http\Controllers\PekerjaSosialMasyarakatController;
use App\Http\Controllers\PekerjaSosialProfesionalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(LoginController::class)->group(function(){
  Route::get('/', 'login')->name('login');
  Route::get('register', 'register')->name('register');
  Route::post('registerproses', 'registerproses')->name('registerproses');
  Route::post('loginproses', 'loginproses')->name('loginproses');
  Route::get('forgot-password', 'forgotpassword')->name('password.request');
  Route::post('forgot-password-proses', 'passwordemail')->name('password.email');
  Route::post('reset-password', 'passwordupdate')->name('password.update');
  Route::get('reset-password/{token}', 'resetpassword')->name('password.reset');
  Route::get('google', 'google')->name('google');
  Route::get('auth/google/callback', 'handleProviderCallback')->name('user.google.callback');
  Route::get('logout', 'logout')->name('logout');
});


Route::middleware(['checkrole: ADMIN'])->group(function(){
  Route::get('admin', [DashboardController::class, 'index'])->name('admin');
  Route::resource('users', UserController::class);
  Route::resource('warga', WargaController::class);
  Route::resource('pindah', PindahController::class);
  Route::resource('pendatang', PendatangController::class);
  Route::resource('kematian', KematianController::class);
  Route::resource('pernikahan', PernikahanController::class);
  Route::resource('ahli-waris', AhliWariseController::class);
  Route::resource('surat-keterangan', SuratKeteranganController::class);
  Route::resource('sembako', SembakoController::class);
  Route::resource('ketua-rt-rw', KetuaRtRwController::class);
  Route::resource('fasum', FasumController::class);
  Route::resource('masjid', MasjidController::class);
  Route::resource('gereja', GerejaController::class);
  Route::resource('sekolah', SekolahController::class);
  Route::resource('fasilitas-olahraga', FasilitasOlahragaController::class);
  Route::resource('penyuluh-sosial', PenyuluhSosialController::class);
  Route::resource('dunia-usaha', DuniaUsahaController::class);
  Route::resource('lk3', Lk3Controller::class);
  Route::resource('lks', LkController::class);
  Route::resource('karang-taruna', KarangTarunaController::class);
  Route::resource('tksk', TkskController::class);
  Route::resource('wksbm', WksbmController::class);
  Route::resource('wpks', WpkController::class);
  Route::resource('pekerja-sosial-profesional', PekerjaSosialProfesionalController::class);
  Route::resource('pekerja-sosial-masyarakat', PekerjaSosialMasyarakatController::class);
  Route::resource('tagana', TaganaController::class);
  Route::resource('posyandu', PosyanduController::class);
  Route::resource('tahfiz', TahfizController::class);
  Route::resource('panti-asuhan', PantiAsuhanController::class);
  Route::resource('dhuafa', DhuafaController::class);
  Route::resource('kbsp', KBSPController::class);
  Route::resource('fakir-miskin', FakirMiskinController::class);
  Route::resource('prse', PRSEController::class);
  Route::resource('bencana-sosial', BencanaSosialController::class);
  Route::resource('bencana-alam', BencanaAlamController::class);
  Route::resource('kekerasan', KekerasanController::class);
  Route::resource('pmbs', PMBSController::class);
  Route::resource('traficking', TrafickingController::class);
  Route::resource('napza', NapzaController::class);
  Route::resource('odha', ODHAController::class);
  Route::resource('bwblp', BWBLPController::class);
  Route::resource('minoritas', MinoritasController::class);
  Route::resource('pemulung', PemulungController::class);
  Route::resource('pengemis', PengemisController::class);
  Route::resource('gelandangan', GelandanganController::class);
  Route::resource('susila', SusilaController::class);
  Route::resource('disabilitas', DisabilitasController::class);
  Route::resource('terlantar', TerlantarController::class);
  Route::resource('anak-khusus', AnakKhususController::class);
  Route::resource('anak-kekerasan', AnakKekerasanController::class);
  Route::resource('adk', ADKController::class);
  Route::resource('jalanan', JalananController::class);
  Route::resource('anak-hukum', AnakHukumController::class);
  Route::resource('anak-terlantar', AnakTerlantarController::class);
  Route::resource('balita-terlantar', BalitaTerlantarController::class);
  Route::resource('pioner', PionerController::class);
  Route::resource('pindah_wilayah', PindahWilayahController::class);
});


Route::middleware(['checkrole: WARGA'])->group(function(){
  Route::get('admin', [DashboardController::class, 'index'])->name('admin');
  
});

Route::get('export-warga', [WargaController::class, 'export_warga'])->name('export-warga');
Route::post('import-warga', [WargaController::class, 'import_warga'])->name('import-warga');

Route::get('export-pindah', [PindahController::class, 'export_pindah'])->name('export-pindah');
Route::post('import-pindah', [PindahController::class, 'import_pindah'])->name('import-pindah');

Route::get('export_pindah_wilayah', [PindahWilayahController::class, 'export_pindah_wilayah'])->name('export-pindah-wilayah');
Route::post('import-pindah-wilayah', [PindahWilayahController::class, 'import_pindah_wilayah'])->name('import-pindah-wilayah');

Route::get('export-pendatang', [PendatangController::class, 'export_pendatang'])->name('export-pendatang');
Route::post('import-pendatang', [PendatangController::class, 'import_pendatang'])->name('import-pendatang');

Route::get('export-kematian', [KematianController::class, 'export_kematian'])->name('export-kematian');
Route::post('import-kematian', [KematianController::class, 'import_kematian'])->name('import-kematian');

Route::get('export-pernikahan', [PernikahanController::class, 'export_pernikahan'])->name('export-pernikahan');
Route::post('import-pernikahan', [PernikahanController::class, 'import_pernikahan'])->name('import-pernikahan');

Route::post('import-sembako', [SembakoController::class, 'import_sembako'])->name('import-sembako');
Route::get('export-sembako', [SembakoController::class, 'export_sembako'])->name('export-sembako');

Route::get('export-ketua-rt-rw', [KetuaRtRwController::class, 'export_ketua_rt_rw'])->name('export-ketua-rt-rw');
Route::post('import-ketua-rt-rw', [KetuaRtRwController::class, 'import_ketua_rt_rw'])->name('import-ketua-rt-rw');

Route::get('export-ahli-waris', [AhliWariseController::class, 'export_ahli_waris'])->name('export-ahli-waris');
Route::post('import-ahli-waris', [AhliWariseController::class, 'import_ahli_waris'])->name('import-ahli-waris');

Route::get('export-surat-keterangan', [SuratKeteranganController::class, 'export_surat_keterangan'])->name('export-surat-keterangan');
Route::post('import-surat-keterangan', [SuratKeteranganController::class, 'import_surat_keterangan'])->name('import-surat-keterangan');

Route::get('export_penyuluh_sosial', [PenyuluhSosialController::class, 'export_penyuluh_sosial'])->name('export-penyuluh-sosial');
Route::post('import_penyuluh_sosial', [PenyuluhSosialController::class, 'import_penyuluh_sosial'])->name('import-penyuluh-sosial');

Route::get('export_dunia_usaha', [DuniaUsahaController::class, 'export_dunia_usaha'])->name('export-dunia-usaha');
Route::post('import_dunia_usaha', [DuniaUsahaController::class, 'import_dunia_usaha'])->name('import-dunia-usaha');

Route::get('export_lk3', [Lk3Controller::class, 'export_lk3'])->name('export-lk3');
Route::post('import_lk3', [Lk3Controller::class, 'import_lk3'])->name('import-lk3');

Route::get('export_lk', [LkController::class, 'export_lk'])->name('export-lk');
Route::post('import_lk', [LkController::class, 'import_lk'])->name('import-lk');

Route::get('export_karang_taruna', [KarangTarunaController::class, 'export_karang_taruna'])->name('export-karang-taruna');
Route::post('import_karang_taruna', [KarangTarunaController::class, 'import_karang_taruna'])->name('import-karang-taruna');

Route::get('export_tksk', [TkskController::class, 'export_tksk'])->name('export-tksk');
Route::post('import_tksk', [TkskController::class, 'import_tksk'])->name('import-tksk');

Route::get('export_wksbm', [WksbmController::class, 'export_wksbm'])->name('export-wksbm');
Route::post('import_wksbm', [WksbmController::class, 'import_wksbm'])->name('import-wksbm');

Route::get('export_wpks', [WpkController::class, 'export_wpks'])->name('export-wpks');
Route::post('import_wpks', [WpkController::class, 'import_wpks'])->name('import-wpks');

Route::get('export_pekerja_sosial_profesional', [PekerjaSosialProfesionalController::class, 'export_pekerja_sosial_profesional'])->name('export-pekerja-sosial-profesional');
Route::post('import_pekerja_sosial_profesional', [PekerjaSosialProfesionalController::class, 'import_pekerja_sosial_profesional'])->name('import-pekerja-sosial-profesional');

Route::get('export_pekerja_sosial_masyarakat', [PekerjaSosialMasyarakatController::class, 'export_pekerja_sosial_masyarakat'])->name('export-pekerja-sosial-masyarakat');
Route::post('import_pekerja_sosial_masyarakat', [PekerjaSosialMasyarakatController::class, 'import_pekerja_sosial_masyarakat'])->name('import-pekerja-sosial-masyarakat');

Route::get('export_tagana', [TaganaController::class, 'export_tagana'])->name('export-tagana');
Route::post('import_tagana', [TaganaController::class, 'import_tagana'])->name('import-tagana');

Route::get('export_posyandu', [PosyanduController::class, 'export_posyandu'])->name('export-posyandu');
Route::post('import_posyandu', [PosyanduController::class, 'import_posyandu'])->name('import-posyandu');

Route::get('export_tahfiz', [TahfizController::class, 'export_tahfiz'])->name('export-tahfiz');
Route::post('import_tahfiz', [TahfizController::class, 'import_tahfiz'])->name('import-tahfiz');

Route::get('export_panti_asuhan', [PantiAsuhanController::class, 'export_panti_asuhan'])->name('export-panti-asuhan');
Route::post('import_panti_asuhan', [PantiAsuhanController::class, 'import_panti_asuhan'])->name('import-panti-asuhan');

Route::get('export_dhuafa', [DhuafaController::class, 'export_dhuafa'])->name('export-dhuafa');
Route::post('import_dhuafa', [DhuafaController::class, 'import_dhuafa'])->name('import-dhuafa');

Route::get('export_kbsp', [KBSPController::class, 'export_kbsp'])->name('export-kbsp');
Route::post('import_kbsp', [KBSPController::class, 'import_kbsp'])->name('import-kbsp');

Route::get('export_fakir_miskin', [FakirMiskinController::class, 'export_fakir_miskin'])->name('export-fakir-miskin');
Route::post('import_fakir_miskin', [FakirMiskinController::class, 'import_fakir_miskin'])->name('import-fakir-miskin');

Route::get('export_prse', [PRSEController::class, 'export_prse'])->name('export-prse');
Route::post('import_prse', [PRSEController::class, 'import_prse'])->name('import-prse');

Route::get('export_bencana_sosial', [BencanaSosialController::class, 'export_bencana_sosial'])->name('export-bencana-sosial');
Route::post('import_bencana_sosial', [BencanaSosialController::class, 'import_bencana_sosial'])->name('import-bencana-sosial');

Route::get('export_bencana_alam', [BencanaAlamController::class, 'export_bencana_alam'])->name('export-bencana-alam');
Route::post('import_bencana_alam', [BencanaAlamController::class, 'import_bencana_alam'])->name('import-bencana-alam');

Route::get('export_kekerasan', [KekerasanController::class, 'export_kekerasan'])->name('export-kekerasan');
Route::post('import_kekerasan', [KekerasanController::class, 'import_kekerasan'])->name('import-kekerasan');

Route::get('export_pmbs', [PMBSController::class, 'export_pmbs'])->name('export-pmbs');
Route::post('import_pmbs', [PMBSController::class, 'import_pmbs'])->name('import-pmbs');

Route::get('export_traficking', [TrafickingController::class, 'export_traficking'])->name('export-traficking');
Route::post('import_traficking', [TrafickingController::class, 'import_traficking'])->name('import-traficking');

Route::get('export_napza', [NapzaController::class, 'export_napza'])->name('export-napza');
Route::post('import_napza', [NapzaController::class, 'import_napza'])->name('import-napza');

Route::get('export_odha', [ODHAController::class, 'export_odha'])->name('export-odha');
Route::post('import_odha', [ODHAController::class, 'import_odha'])->name('import-odha');

Route::get('export_bwblp', [BWBLPController::class, 'export_bwblp'])->name('export-bwblp');
Route::post('import_bwblp', [BWBLPController::class, 'import_bwblp'])->name('import-bwblp');

Route::get('export_minoritas', [MinoritasController::class, 'export_minoritas'])->name('export-minoritas');
Route::post('import_minoritas', [MinoritasController::class, 'import_minoritas'])->name('import-minoritas');

Route::get('export_pemulung', [PemulungController::class, 'export_pemulung'])->name('export-pemulung');
Route::post('import_pemulung', [PemulungController::class, 'import_pemulung'])->name('import-pemulung');

Route::get('export_pengemis', [PengemisController::class, 'export_pengemis'])->name('export-pengemis');
Route::post('import_pengemis', [PengemisController::class, 'import_pengemis'])->name('import-pengemis');

Route::get('export_gelandangan', [GelandanganController::class, 'export_gelandangan'])->name('export-gelandangan');
Route::post('import_gelandangan', [GelandanganController::class, 'import_gelandangan'])->name('import-gelandangan');

Route::get('export_susila', [SusilaController::class, 'export_susila'])->name('export-susila');
Route::post('import_susila', [SusilaController::class, 'import_susila'])->name('import-susila');

Route::get('export_disabilitas', [DisabilitasController::class, 'export_disabilitas'])->name('export-disabilitas');
Route::post('import_disabilitas', [DisabilitasController::class, 'import_disabilitas'])->name('import-disabilitas');

Route::get('export_terlantar', [TerlantarController::class, 'export_terlantar'])->name('export-terlantar');
Route::post('import_terlantar', [TerlantarController::class, 'import_terlantar'])->name
('import-terlantar');

Route::get('export_anak_khusus', [AnakKhususController::class, 'export_anak_khusus'])->name('export-anak-khusus');
Route::post('import_anak_khusus', [AnakKhususController::class, 'import_anak_khusus'])->name('import-anak-khusus');

Route::get('export_anak_kekerasan', [AnakKekerasanController::class, 'export_anak_kekerasan'])->name('export-anak-kekerasan');
Route::post('import_anak_kekerasan', [AnakKekerasanController::class, 'import_anak_kekerasan'])->name('import-anak-kekerasan');

Route::get('export_adk', [ADKController::class, 'export_adk'])->name('export-adk');
Route::post('import_adk', [ADKController::class, 'import_adk'])->name('import-adk');

Route::get('export_jalanan', [JalananController::class, 'export_jalanan'])->name('export-jalanan');
Route::post('import_jalanan', [JalananController::class, 'import_jalanan'])->name('import-jalanan');

Route::get('export_anak_hukum', [AnakHukumController::class, 'export_anak_hukum'])->name('export-anak-hukum');
Route::post('import_anak_hukum', [AnakHukumController::class, 'import_anak_hukum'])->name('import-anak-hukum');

Route::get('export_anak_terlantar', [AnakTerlantarController::class, 'export_anak_terlantar'])->name('export-anak-terlantar');
Route::post('import_anak_terlantar', [AnakTerlantarController::class, 'import_anak_terlantar'])->name('import-anak-terlantar');

Route::get('export_balita_terlantar', [BalitaTerlantarController::class, 'export_balita_terlantar'])->name('export-balita-terlantar');
Route::post('import_balita_terlantar', [BalitaTerlantarController::class, 'import_balita_terlantar'])->name('import-balita-terlantar');

Route::get('export_pioner', [PionerController::class, 'export_pioner'])->name('export-pioner');
Route::post('import_pioner', [PionerController::class, 'import_pioner'])->name('import-pioner');

Route::get('export_fasum', [FasumController::class, 'export_fasum'])->name('export-fasum');
Route::post('import_fasum', [FasumController::class, 'import_fasum'])->name('import-fasum');

Route::get('export_masjid', [MasjidController::class, 'export_masjid'])->name('export-masjid');
Route::post('import_masjid', [MasjidController::class, 'import_masjid'])->name('import-masjid');

Route::get('export_gereja', [GerejaController::class, 'export_gereja'])->name('export-gereja');
Route::post('import_gereja', [GerejaController::class, 'import_gereja'])->name('import-gereja');

Route::get('export_sekolah', [SekolahController::class, 'export_sekolah'])->name('export-sekolah');
Route::post('import_sekolah', [SekolahController::class, 'import_sekolah'])->name('import-sekolah');

Route::get('export_fasilitas_olahraga', [FasilitasOlahragaController::class, 'export_fasilitas_olahraga'])->name('export-fasilitas-olahraga');
Route::post('import_fasilitas_olahraga', [FasilitasOlahragaController::class, 'import_fasilitas_olahraga'])->name('import-fasilitas-olahraga');

