<?php


use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\PegawaiController;
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

        Route::get("bidang",  [BidangController::class,'index']);
        Route::get('bidang', [BidangController::class,'index','store']);
        Route::get('tambah-bidang', [BidangController::class,'create']);
        Route::post('bidang-add', [BidangController::class,'store']);
        Route::get('edit-bidang/{id}', [BidangController::class,'edit']);
        Route::put('bidang-edit/{id}', [BidangController::class,'update']);
        Route::get('hapus-bidang/{id}', [BidangController::class,'destroy']);

        Route::resource("laporan-admin", LaporanController::class);
    });

    Route::group(["middleware" => ["ceklevel:pegawai"]], function () {
        Route::resource("kinerja", KinerjaController::class);
        Route::resource("laporan-pegawai", LaporanController::class);
    });

    Route::group(
        ["middleware" => ["ceklevel:sub-koordinator,kepala-bidang"]],
        function () {
            Route::resource("kinerja", KinerjaController::class);
            Route::resource("pengaturan", PengaturanController::class);
        }
    );
});

// Route::get('/admin/data_pegawai', [PegawaiController::class,'index','store']);
// Route::get('/admin/tambah/pegawai', [PegawaiController::class,'create']);
// Route::post('/pegawai', [PegawaiController::class,'store']);