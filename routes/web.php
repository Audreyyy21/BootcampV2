<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\UserKelasController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::post('/register', [AuthController::class, 'register']);


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/admin/register', fn() => view('admin.register'))->name('admin.register');

    Route::get('/admin/kelas', [KelasController::class, 'index'])->name('admin.kelas.index');
    Route::get('/admin/kelas/create', [KelasController::class, 'create'])->name('admin.kelas.create');
    Route::post('/admin/kelas', [KelasController::class, 'store'])->name('admin.kelas.store');
    Route::get('/admin/kelas/{kela}/edit', [KelasController::class, 'edit'])->name('admin.kelas.edit');
    Route::put('/admin/kelas/{kela}', [KelasController::class, 'update'])->name('admin.kelas.update');
    Route::delete('/admin/kelas/{kela}', [KelasController::class, 'destroy'])->name('admin.kelas.destroy');

    Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
        Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
        Route::get('jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
        Route::post('jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
        Route::get('jadwal/{jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
        Route::put('jadwal/{jadwal}', [JadwalController::class, 'update'])->name('jadwal.update');
        Route::delete('jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
    });

    Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
        // Sertifikat CRUD
        Route::get('sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.index');
        Route::get('sertifikat/create', [SertifikatController::class, 'create'])->name('sertifikat.create');
        Route::post('sertifikat', [SertifikatController::class, 'store'])->name('sertifikat.store');
        Route::delete('sertifikat/{sertifikat}', [SertifikatController::class, 'destroy'])->name('sertifikat.destroy');
    });
});


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/user/kelas', function () {
        return view('user.kelas');
    })->name('user.kelas');

    Route::get('/user/kelas/aktif', [UserKelasController::class, 'aktif'])->name('user.kelas.aktif');
    Route::get('/user/kelas/histori', [UserKelasController::class, 'histori'])->name('user.kelas.histori');
    Route::get('/user/sertifikat', [\App\Http\Controllers\UserSertifikatController::class, 'index'])->name('user.sertifikat.index');
    Route::get('/user/sertifikat/{id}/download', [\App\Http\Controllers\UserSertifikatController::class, 'download'])->name('user.sertifikat.download');
});

Route::get('/', function () {
    return redirect('/login');
});
