<?php

use App\Helpers\ConfigHelper;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CetakController;
// use App\Http\Controllers\DaftarUlangController;
use App\Http\Controllers\DUSeragamController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\SiswaController;
// use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\LaporanController;
// use App\Http\Controllers\PembayaranController;
// use App\Http\Controllers\TagihanController;
// use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfilController;

use App\Http\Controllers\Laporan\DuseragamController as LaporanDuseragamController;
use App\Http\Controllers\Laporan\PendaftaranController as LaporanPendaftaranController;
use App\Http\Controllers\Laporan\SponsorshipController as LaporanSponsorshipController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\Verifikasi\DuseragamController as VerifikasiDuseragamController;
use App\Http\Controllers\Verifikasi\PendaftaranController as VerifikasiPendaftaranController;
use App\Http\Controllers\Verifikasi\SponsorshipController as VerifikasiSponsorshipController;
use App\Http\Controllers\Verifikasi\PendataanController as VerifikasiPendataanController;
use App\Models\Config;
use App\Models\DataJurusan;
use App\Models\Identitas;
use App\Models\Jurusan;
use App\Models\Pendaftaran;
use App\Models\Tagihan;
use App\Models\UserLevel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', })

Route::get('/test', function () {
    dd(back()->getRequest()->path());
});


Route::middleware('guest')->group(function () {
    Route::controller(LandingPageController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/kontak', 'kontak');
    });
    
    Route::controller(FormulirController::class)->group(function () {
        Route::get('/formulir', 'index');
        Route::post('/formulir', 'store');
    });
    
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'login');
        Route::get('/login/admin', 'admindex');
        Route::post('/login/admin', 'admlogin');
    });
});

Route::middleware('auth')->group(function () {

    
    Route::prefix('/siswa')->middleware('siswa')->group(function () {
        
        Route::controller(SiswaController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/daftar-ulang', 'daftar_ulang');
        });
    
        // Route::controller(DUSeragamController::class)->group(function () {
        //     // Route::get('/duseragam', 'index');
        //     // Route::post('/duseragam', 'store');
        // });

        Route::controller(FormulirController::class)->group(function () {
            Route::post('/duseragam/{identitas:id}', 'update');
        });
        
    });

    Route::prefix('/admin')->middleware('admin')->group(function () {

        Route::controller(AdminController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/peserta', 'peserta');
            Route::get('/tagihan/{identitas:id}', 'tagihan');
            Route::get('/pembayaran/{identitas:id}', 'pembayaran');
            Route::get('/pembayaran/edit/{identitas:id}', 'edit_pembayaran');
            Route::post('/pembayaran/edit/{identitas:id}', 'update_pembayaran');
            Route::get('/hapus/{identitas:id}', 'hapus')->middleware('superadmin');
        });
        
        Route::controller(UserProfilController::class)->group(function () {
            Route::get('/profil', 'profil');
            Route::put('/profil', 'update');
        });
    
        Route::controller(UserController::class)->middleware('superadmin')->group(function () {
            Route::get('/users/admin', 'admin');
            Route::get('/users/siswa', 'siswa');
            Route::get('/users/{user:id}/hapus', 'destroy');
        });
    
        Route::resource('/users', UserController::class);
    
        Route::prefix('/verifikasi')->group(function () {
            Route::prefix('/pendaftaran')->controller(VerifikasiPendaftaranController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::post('/biaya/{identitas:id}', 'biaya');
                Route::post('/pembayaran/{identitas:id}', 'pembayaran');
                Route::post('/{identitas:id}', 'verifikasi');
            });
        
            Route::prefix('/duseragam')->controller(VerifikasiDuseragamController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::post('/biaya-duseragam/{identitas:id}', 'biaya');
                Route::post('/pembayaran/{type}/{identitas:id}', 'pembayaran');
                Route::post('/{type}/{identitas:id}', 'verifikasi');
            });

            Route::prefix('/pendataan')->controller(VerifikasiPendataanController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::post('/{identitas:id}', 'verifikasi');
            });
            Route::get('/pendataan/edit/{identitas:id}', [FormulirController::class, 'edit']);

            Route::prefix('/sponsorship')->controller(VerifikasiSponsorshipController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::post('/{identitas:id}', 'store');
                Route::post('/verifikasi/{identitas:id}', 'verifikasi');
                Route::post('/edit/{sponsorship:id}', 'update');
                Route::get('/hapus/{sponsorship:id}', 'hapus')->middleware('superadmin');
            });
        });
    
        Route::get('/print/{identitas:id}', [PrintController::class, 'pendaftaran']);
    
        Route::controller(FormulirController::class)->group(function () {
            Route::get('/tambah-peserta', 'tambah');
            Route::post('/tambah-peserta', 'store');
            Route::get('/edit/{identitas:id}', 'edit');
            Route::post('/edit/{identitas:id}', 'update');
        });
    
        Route::controller(DUSeragamController::class)->group(function () {
            Route::get('/formulir-duseragam/{identitas:id}', 'admcreate');
            Route::post('/formulir-duseragam/{identitas:id}', 'admstore');
        });

        Route::prefix('/laporan')->controller(LaporanController::class)->group(function () {
            Route::get('/{bigtype}', 'index');
            Route::get('/{bigtype}/cetak', 'cetak');
            Route::get('/{prebigtype}/precetak', 'precetak');
        });

        Route::controller(CetakController::class)->group(function () {
            Route::get('/cetak/pendaftaran/{identitas:id}', 'cetakPendaftaran');
            Route::get('/cetak/formulir/{identitas:id}', 'cetakFormulir');
        });

        Route::resource('/sponsorship', SponsorshipController::class)->only(['create', 'store']);
        
    });

    Route::get('/logout', [LoginController::class, 'logout']);

});
