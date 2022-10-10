<?php


use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KinerjaController;
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

// Route::get("login", [LoginController::class, "index"])->name("login");

// sebelum mengakses layout maka dibatasi dahulu(middleware)
Route::get("/", [LayoutController::class, "index"])->middleware("auth");
Route::get("/home", [LayoutController::class, "index"])->middleware("auth");

Route::controller(LoginController::class)->group(function () {
    Route::get("login", "index")->name("login");
    Route::post("login/proses", "proses");
    Route::get("logout", "logout");
});

Route::group(["middleware" => ["auth"]], function () {
    Route::group(["middleware" => ["ceklevel:administrator"]], function () {
        Route::get("pegawai", [PegawaiController::class, 'index']);
        Route::get("pegawai", [PegawaiController::class, 'index','store']);
        Route::get('tambah-pegawai', [PegawaiController::class,'create']);
        Route::post('pegawai-add', [PegawaiController::class,'store']);
        Route::get("laporan-pegawai-admin", [PegawaiController::class, 'laporan']);

        Route::get('edit-pegawai/{id}', [PegawaiController::class,'edit']);
        Route::post('/pegawai/update/{id}', [PegawaiController::class,'update']);
        Route::get('hapus-pegawai/{id}', [PegawaiController::class,'destroy']);

        Route::get("bidang",  [BidangController::class,'index']);
        Route::get('bidang', [BidangController::class,'index','store','update']);
        Route::get('tambah-bidang', [BidangController::class,'create']);
        Route::post('bidang-add', [BidangController::class,'store']);

        Route::get('edit-bidang/{id}', [BidangController::class,'edit']);
        Route::put('/bidang/update/{id}', [BidangController::class,'update']);
        
        Route::get('hapus-bidang/{id}', [BidangController::class,'destroy']);

    });

    Route::group(["middleware" => ["ceklevel:pegawai"]], function () {
        Route::get("kinerja-pegawai", [KinerjaController::class, 'index','store']);
        Route::get("edit-draft/{id}", [KinerjaController::class, 'edit']);
        Route::post('/update/draft/{id}', [KinerjaController::class, 'update']);        
        Route::get("restore/{id}", [KinerjaController::class, 'restore']);
        Route::get("pengaturan-pegawai", [KinerjaController::class, 'pengaturan']);
        Route::get("/edit-profil-pegawai/{id}", [PegawaiController::class, 'editprofil']);
        Route::post('/update/profil/pegawai/{id}', [PegawaiController::class, 'updateprofil']);
        Route::get("edit-foto-profil-pegawai/{id}", [PegawaiController::class, 'editfoto']);
        Route::post("/update/foto/profil/pegawai/{id}", [PegawaiController::class, 'updatefoto']);
        Route::get("edit-password-pegawai/{id}", [PegawaiController::class, 'editpassword']);
        Route::post("/update/password/pegawai/{id}", [PegawaiController::class, 'updatepassword']);
        Route::get("laporan-pegawai", [LaporanController::class, 'laporan','tampilkan']);
        Route::get("tambah-kinerja", [KinerjaController::class, 'create']);
        Route::post("/kinerja-add", [KinerjaController::class, 'store']);
        Route::get("/pegawai/hapus/{id}", [KinerjaController::class, 'destroy'])->name('destroy');
        Route::resource("laporan-terverifikasi", LaporanController::class);

       
    });
    
    Route::group(["middleware" => ["ceklevel:kepala-bidang"]], function () {
        Route::get("kinerja-kepala", [KepBidangController::class, "index"]);
        Route::post("/kepala-bidang/ubah/{id}", [
            KepBidangController::class,
            "completedUpdate",
        ])->name("completedUpdate");
        Route::get("pengaturan-kepala", [PengaturanController::class, "index"]);
        Route::get("pengaturan", [KepBidangController::class, 'pengaturan']);
            Route::get("edit-profil-KepBidang/{id}", [KepBidangController::class, 'editprofil']);
            Route::post('/update/profil/KepBidang/{id}', [KepBidangController::class, 'updateprofil']);
            Route::get("edit-foto-profil-KepBidang/{id}", [KepBidangController::class, 'editfoto']);
            Route::post("/update/foto/profil/KepBidang/{id}", [KepBidangController::class, 'updatefoto']);
            Route::get("edit-password-KepBidang/{id}", [KepBidangController::class, 'editpassword']);
            Route::post("/update/password/KepBidang/{id}", [KepBidangController::class, 'updatepassword']);
    });
});

// Route::get('/admin/data_pegawai', [PegawaiController::class,'index','store']);
// Route::get('/admin/tambah/pegawai', [PegawaiController::class,'create']);
// Route::post('/pegawai', [PegawaiController::class,'store']);
