<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\UserKelasController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AbsensiController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register']);


// ====================== ADMIN ======================
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/admin/register', fn() => view('admin.register'))->name('admin.register');

    // Peserta
    Route::get('/admin/peserta', [AuthController::class, 'peserta'])->name('admin.peserta.index');
    Route::get('/admin/peserta/{id}/edit', [AuthController::class, 'editPeserta'])->name('admin.peserta.edit');
    Route::put('/admin/peserta/{id}', [AuthController::class, 'updatePeserta'])->name('admin.peserta.update');
    Route::delete('/admin/peserta/{id}', [AuthController::class, 'deletePeserta'])->name('admin.peserta.delete');

    // Kelas
    Route::get('/admin/kelas', [KelasController::class, 'index'])->name('admin.kelas.index');
    Route::get('/admin/kelas/create', [KelasController::class, 'create'])->name('admin.kelas.create');
    Route::post('/admin/kelas', [KelasController::class, 'store'])->name('admin.kelas.store');
    Route::get('/admin/kelas/{kela}/edit', [KelasController::class, 'edit'])->name('admin.kelas.edit');
    Route::put('/admin/kelas/{kela}', [KelasController::class, 'update'])->name('admin.kelas.update');
    Route::delete('/admin/kelas/{kela}', [KelasController::class, 'destroy'])->name('admin.kelas.destroy');

    // Jadwal
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
        Route::get('jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
        Route::post('jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
        Route::get('jadwal/{jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
        Route::put('jadwal/{jadwal}', [JadwalController::class, 'update'])->name('jadwal.update');
        Route::delete('jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
    });

    // Sertifikat
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.index');
        Route::get('sertifikat/create', [SertifikatController::class, 'create'])->name('sertifikat.create');
        Route::post('sertifikat', [SertifikatController::class, 'store'])->name('sertifikat.store');
        Route::delete('sertifikat/{sertifikat}', [SertifikatController::class, 'destroy'])->name('sertifikat.destroy');
    });

    // Absensi
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
        Route::get('/absensi/kelas/{kelas}', [AbsensiController::class, 'show'])->name('absensi.show');
        Route::post('/absensi/kelas/{kelas}', [AbsensiController::class, 'update'])->name('absensi.update');
    });
}); // ✅ tutup group admin

// ====================== USER ======================
Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/user/dashboard', fn() => view('user.dashboard'))->name('user.dashboard');
    Route::get('/user/kelas', fn() => view('user.kelas'))->name('user.kelas');

    Route::get('/user/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/user/setting', [SettingController::class, 'update'])->name('setting.update');

    Route::get('/user/kelas/aktif', [UserKelasController::class, 'aktif'])->name('user.kelas.aktif');
    Route::get('/user/kelas/histori', [UserKelasController::class, 'histori'])->name('user.kelas.histori');

    Route::get('/user/sertifikat', [\App\Http\Controllers\UserSertifikatController::class, 'index'])->name('user.sertifikat.index');
    Route::get('/user/sertifikat/{id}/download', [\App\Http\Controllers\UserSertifikatController::class, 'download'])->name('user.sertifikat.download');

    // Route::get('/user/kelas', [UserKelasController::class, 'index'])->name('user.kelas.index');
    // Route::get('/user/kelas/{kelas}', [UserKelasController::class, 'show'])->name('user.kelas.show');
    Route::get('/user/kelas/detail/{jadwal}', [UserKelasController::class, 'detail'])
        ->name('user.kelas.detail');
});

// Default redirect
Route::get('/', fn() => redirect('/login'));
