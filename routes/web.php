<?php

use App\Http\Middleware\GudangOrPetugas;
use App\Livewire\Pages\Profile;
use App\Http\Middleware\IsGudang;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Perakitan;
use App\Http\Middleware\IsPetugas;
use App\Livewire\Pages\Peminjaman;
use App\Livewire\Pages\Permintaan;
use App\Http\Middleware\IsKaryawan;
use App\Livewire\Pages\BarangRakit;
use App\Livewire\Pages\Keseluruhan;
use App\Livewire\Pages\BarangKeluar;
use App\Livewire\Pages\TambahBarang;
use App\Livewire\Pages\LaporanBarang;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\BarangDiterima;
use App\Http\Middleware\KaryawanOrPetugas;
use App\Livewire\Edit\Barang as EditBarang;
use App\Livewire\Notification;
use App\Livewire\Pages\Create\Barang;
use App\Livewire\Pages\Create\Permintaan as CreatePermintaan;
use App\Livewire\Pages\Dipinjam;
use App\Livewire\Pages\Edit\Reject;

Route::get('/', function () {
    return redirect('/login');
});


Route::middleware('auth')->group(function () {
    Route::get("/dashboard", Dashboard::class)->name('dashboard');
    Route::get('profile', Profile::class)
        ->name('profile');

    Route::middleware(IsGudang::class)->group(function () {
        Route::get('/barang-keluar', BarangKeluar::class)->name('barang-keluar');
        Route::get('/surat-pengeluaran', BarangKeluar::class)->name('surat-pengeluaran');
        Route::get('/permintaan/reject/{permintaan}', Reject::class)->name('permintaan.edit');
    });
    Route::get('/permintaan', Permintaan::class)->name('permintaan.index');
  

    Route::middleware(KaryawanOrPetugas::class)->group(function () {
        Route::middleware(IsKaryawan::class)->group(function () {
            Route::get('/barang-rakit', BarangRakit::class)->name('barang-rakit');
            Route::get('/laporan-barang', LaporanBarang::class)->name('laporan-barang');
            Route::get('/barang-diterima', BarangDiterima::class)->name('barang-diterima');
        });

        Route::middleware(IsPetugas::class)->group(function () {
            Route::get('/peminjaman/create', Perakitan::class)->name('perakitan');
            Route::get('/barang', TambahBarang::class)->name('barang.index');
            Route::get('/barang/dipinjam', Dipinjam::class)->name('dipinjam');
            Route::get('/barang/create', Barang::class)->name('barang.create');
            Route::get('/permintaan/create', CreatePermintaan::class)->name('permintaan.create');
            Route::get('/peminjaman', Peminjaman::class)->name('peminjaman');
            Route::get('/permintaan/report', Keseluruhan::class)->name('keseluruhan');
            Route::get('/peminjaman/print')->name('peminjaman.pdf');
            Route::get('/notification', Notification::class)->name('notification');
            Route::get('/barang/{barang}/edit', EditBarang::class)->name('barang.edit');
        });
    });
});


require __DIR__ . '/auth.php';
