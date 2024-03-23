<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\VirtualReality;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');

    Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/virtual-reality', VirtualReality::class)->name('virtual-reality');
    Route::get('/user-profile', UserProfile::class)->name('user-profile');
    // Route::get('/user-management', UserManagement::class)->name('user-management');

    Route::get('/jenis-satuan', App\Http\Livewire\JenisSatuan\Index::class)->name('jenis-satuan.index');
    Route::get('/jenis-satuan/create', App\Http\Livewire\JenisSatuan\Create::class)->name('jenis-satuan.create');
    Route::get('/jenis-satuan/detail/{idsatuan}', App\Http\Livewire\JenisSatuan\Detail::class)->name('jenis-satuan.detail');
    Route::get('/jenis-satuan/edit/{idsatuan}', App\Http\Livewire\JenisSatuan\Edit::class)->name('jenis-satuan.edit');
    Route::get('/jenis-satuan/delete/{idsatuan}', App\Http\Livewire\JenisSatuan\Delete::class)->name('jenis-satuan.delete');

    Route::get('/jenis-barang', App\Http\Livewire\JenisBarang\Index::class)->name('jenis-barang.index');
    Route::get('/jenis-barang/create', App\Http\Livewire\JenisBarang\Create::class)->name('jenis-barang.create');
    Route::get('/jenis-barang/detail/{idjenisbarang}', App\Http\Livewire\JenisBarang\Detail::class)->name('jenis-barang.detail');
    Route::get('/jenis-barang/edit/{idjenisbarang}', App\Http\Livewire\JenisBarang\Edit::class)->name('jenis-barang.edit');
    Route::get('/jenis-barang/delete/{idjenisbarang}', App\Http\Livewire\JenisBarang\Delete::class)->name('jenis-barang.delete');

    Route::get('/departemen', App\Http\Livewire\Departemen\Index::class)->name('departemen.index');
    Route::get('/departemen/create', App\Http\Livewire\Departemen\Create::class)->name('departemen.create');
    Route::get('/departemen/detail/{iddepartemen}', App\Http\Livewire\Departemen\Detail::class)->name('departemen.detail');
    Route::get('/departemen/edit/{iddepartemen}', App\Http\Livewire\Departemen\Edit::class)->name('departemen.edit');
    Route::get('/departemen/delete/{iddepartemen}', App\Http\Livewire\Departemen\Delete::class)->name('departemen.delete');

    Route::get('/barang', App\Http\Livewire\Barang\Index::class)->name('barang.index');
    Route::get('/barang/create', App\Http\Livewire\Barang\Create::class)->name('barang.create');
    Route::get('/barang/detail/{idbarang}', App\Http\Livewire\Barang\Detail::class)->name('barang.detail');
    Route::get('/barang/edit/{idbarang}', App\Http\Livewire\Barang\Edit::class)->name('barang.edit');
    Route::get('/barang/delete/{idbarang}', App\Http\Livewire\Barang\Delete::class)->name('barang.delete');

    Route::get('/customer', App\Http\Livewire\Customer\Index::class)->name('customer.index');
    Route::get('/customer/create', App\Http\Livewire\Customer\Create::class)->name('customer.create');
    Route::get('/customer/detail/{idcustomer}', App\Http\Livewire\Customer\Detail::class)->name('customer.detail');
    Route::get('/customer/edit/{idcustomer}', App\Http\Livewire\Customer\Edit::class)->name('customer.edit');
    Route::get('/customer/delete/{idcustomer}', App\Http\Livewire\Customer\Delete::class)->name('customer.delete');

    Route::get('/karyawan', App\Http\Livewire\Karyawan\Index::class)->name('karyawan.index');
    Route::get('/karyawan/create', App\Http\Livewire\Karyawan\Create::class)->name('karyawan.create');
    Route::get('/karyawan/detail/{idkaryawan}', App\Http\Livewire\Karyawan\Detail::class)->name('karyawan.detail');
    Route::get('/karyawan/edit/{idkaryawan}', App\Http\Livewire\Karyawan\Edit::class)->name('karyawan.edit');
    Route::get('/karyawan/delete/{idkaryawan}', App\Http\Livewire\Karyawan\Delete::class)->name('karyawan.delete');

    Route::get('/konfirmasi-po', App\Http\Livewire\KonfirmasiPO\Index::class)->name('konfirmasi-po.index');
    Route::get('/konfirmasi-po/detail/{idorder}', App\Http\Livewire\KonfirmasiPO\Detail::class)->name('konfirmasi-po.detail');
    Route::get('/konfirmasi-po/edit/{idorder}', App\Http\Livewire\KonfirmasiPO\Edit::class)->name('konfirmasi-po.edit');
    Route::get('/konfirmasi-po/delete/{idorder}', App\Http\Livewire\KonfirmasiPO\Delete::class)->name('konfirmasi-po.delete');

    Route::get('/konfirmasi-gudang', App\Http\Livewire\KonfirmasiGudang\Index::class)->name('konfirmasi-gudang.index');
    Route::get('/konfirmasi-gudang/detail/{idorder}', App\Http\Livewire\KonfirmasiGudang\Detail::class)->name('konfirmasi-gudang.detail');
    Route::get('/konfirmasi-gudang/edit/{idorder}', App\Http\Livewire\KonfirmasiGudang\Edit::class)->name('konfirmasi-gudang.edit');
    Route::get('/konfirmasi-gudang/delete/{idorder}', App\Http\Livewire\KonfirmasiGudang\Delete::class)->name('konfirmasi-gudang.delete');

    Route::get('/konfirmasi-suratjalan', App\Http\Livewire\KonfirmasiSuratJalan\Index::class)->name('konfirmasi-suratjalan.index');
    Route::get('/konfirmasi-suratjalan/detail/{idorder}', App\Http\Livewire\KonfirmasiSuratJalan\Detail::class)->name('konfirmasi-suratjalan.detail');
    Route::get('/konfirmasi-suratjalan/edit/{idorder}', App\Http\Livewire\KonfirmasiSuratJalan\Edit::class)->name('konfirmasi-suratjalan.edit');
    Route::get('/konfirmasi-suratjalan/delete/{idorder}', App\Http\Livewire\KonfirmasiSuratJalan\Delete::class)->name('konfirmasi-suratjalan.delete');

    Route::get('/konfirmasi-pengiriman', App\Http\Livewire\KonfirmasiPengiriman\Index::class)->name('konfirmasi-pengiriman.index');
    Route::get('/konfirmasi-pengiriman/detail/{idorder}', App\Http\Livewire\KonfirmasiPengiriman\Detail::class)->name('konfirmasi-pengiriman.detail');
    Route::get('/konfirmasi-pengiriman/edit/{idorder}', App\Http\Livewire\KonfirmasiPengiriman\Edit::class)->name('konfirmasi-pengiriman.edit');
    Route::get('/konfirmasi-pengiriman/delete/{idorder}', App\Http\Livewire\KonfirmasiPengiriman\Delete::class)->name('konfirmasi-pengiriman.delete');

    Route::get('/inquiry-order', App\Http\Livewire\InquiryOrder\Index::class)->name('inquiry-order.index');
    Route::get('/inquiry-order/detail/{idorder}', App\Http\Livewire\InquiryOrder\Detail::class)->name('inquiry-order.detail');

    Route::get('/role', App\Http\Livewire\Role\Index::class)->name('role.index');
    Route::get('/role/create', App\Http\Livewire\Role\Create::class)->name('role.create');
    Route::get('/role/detail/{idrole}', App\Http\Livewire\Role\Detail::class)->name('role.detail');
    Route::get('/role/edit/{idrole}', App\Http\Livewire\Role\Edit::class)->name('role.edit');
    Route::get('/role/delete/{idrole}', App\Http\Livewire\Role\Delete::class)->name('role.delete');

    Route::get('/user-management', App\Http\Livewire\User\Index::class)->name('user-management.index');
    Route::get('/user-management/create', App\Http\Livewire\User\Create::class)->name('user-management.create');
    Route::get('/user-management/detail/{id}', App\Http\Livewire\User\Detail::class)->name('user-management.detail');
    Route::get('/user-management/edit/{id}', App\Http\Livewire\User\Edit::class)->name('user-management.edit');
    Route::get('/user-management/delete/{id}', App\Http\Livewire\User\Delete::class)->name('user-management.delete');

    Route::get('/laporan', App\Http\Livewire\Laporan\Index::class)->name('laporan.index');
    Route::get('/laporan/display/{tglawal}/{tglakhir}', App\Http\Livewire\Laporan\Display::class)->name('laporan.display');
    Route::get('/laporan/cetak', App\Http\Livewire\Laporan\Cetak::class)->name('laporan.cetak');
    
    Route::get('/display_pdf/{filename}','App\Http\Controllers\PdfController@index');
    // use JasperPHP\JasperPHP;
    Route::get('/cetaklaporan', function () {
        $report = new JasperPHP;

        $report->process(
        public_path() . '/report/hello_world.jrxml', //input 
        public_path() . '/report/'.time().'_hello_world', //output
        ['pdf', 'rtf', 'xml'], //formats
        [], //parameters
        [],  //data_source
        '', //locale
        )->execute();

    });
});

// use JasperPHP\JasperPHP as JasperPHP;

// Route::get('/cetaklaporan', function () {

//     $jasper = new JasperPHP;

// 	// Compile a JRXML to Jasper
//     $jasper->compile(__DIR__ . '/../../vendor/cossou/jasperphp/examples/hello_world.jrxml')->execute();

// 	// Process a Jasper file to PDF and RTF (you can use directly the .jrxml)
//     $jasper->process(
//         __DIR__ . '/../../vendor/cossou/jasperphp/examples/hello_world.jasper',
//         false,
//         array("pdf", "rtf"),
//         array("php_version" => "xxx")
//     )->execute();

// 	// List the parameters from a Jasper file.
//     $array = $jasper->list_parameters(
//         __DIR__ . '/../../vendor/cossou/jasperphp/examples/hello_world.jasper'
//     )->execute();

//     return view('welcome');
// });