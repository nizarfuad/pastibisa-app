<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\DigiNoteController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatabasesController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\KirimEmailController;
use App\Http\Controllers\MyDigiNoteController;
use App\Http\Controllers\AdministrasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tiket/{uni_id}', [TicketController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //! Role Master //

    Route::middleware([
        'role:master',
    ])->group(function() {

        // Email //
        Route::get('/kirim-email/{uni_id}', [KirimEmailController::class, 'index'])->name('send_email');

        // Role Dashboard //

        // Route Administrasi //
!
        // Route Digital Notes //

        // Route Personal Digital Notes //

        // Route Reservasi //

        // Route Forum //

        // Route Check in //

        // Route Users ( Master ) //
        Route::get('/master/users', [UserController::class, 'index'])->name('master_users');
        Route::post('/register-user', [UserController::class, 'register'])->name('master_register_user');

        // Route DB ( Master ) //
        Route::get('/master/dbs', [DatabasesController::class, 'index'])->name('databases');

    });

    //! Role PH //

    Route::middleware([
        'role:ph|master',
    ])->group(function() {

        // Role Dashboard //

        // Route Administrasi //
        Route::get('/administrasi', [AdministrasiController::class, 'index'])->name('administrasi');
        Route::get('/administrasi/export/excel', [KeuanganController::class, 'export'])->name('export_keuangan');
        Route::get('/administrasi/edit/{id}', [AdministrasiController::class, 'edit'])->name('edit_administrasi');
        Route::get('/administrasi/{username}/{id}', [KeuanganController::class, 'show'])->name('show_keuangan');
        Route::get('/administrasi/{username}', [KeuanganController::class, 'lookupAdministrasi'])->name('lookup_keuangan');
        Route::get('/administrasi-delete/{id}', [KeuanganController::class, 'destroyAdministrasi'])->name('delete_keuangan_administrasi');
        Route::get('/administrasi-unmark/{id}', [KeuanganController::class, 'unmark'])->name('unmark_keuangan_administrasi');
        Route::post('/administrasi/store', [AdministrasiController::class, 'store'])->name('create_administrasi');
        Route::put('/administrasi/edit/keuangan/{id}', [AdministrasiController::class, 'update'])->name('update_administrasi');

        // Route Digital Notes //
        Route::get('/diginotes', [DigiNoteController::class, 'index'])->name('digitalnotes');
        Route::get('/diginotes-delete/{id}', [KeuanganController::class, 'destroyDiginotes'])->name('delete_keuangan_diginotes');
        Route::get('/diginotes-mark/{id}', [KeuanganController::class, 'mark'])->name('mark_keuangan_diginotes');
        Route::get('/diginotes-markall', [KeuanganController::class, 'mark_all'])->name('diginotes_markall');
        Route::get('/diginotes/{username}/{id}', [DigiNoteController::class, 'show'])->name('show_diginotes');
        Route::get('/diginotes/{username}', [KeuanganController::class, 'lookupDiginotes'])->name('lookup_diginotes');
        Route::post('/diginotes/store', [DigiNoteController::class, 'store'])->name('create_diginotes');

        // Route Personal Digital Notes //

        // Route Reservasi //
        Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi');
        Route::post('/reservasi/create', [ReservasiController::class, 'store'])->name('create_reservasi');
        Route::get('/reservasi/delete/{uni_id}', [ReservasiController::class, 'destroy']);
        Route::get('/reservasi/download/qr/{uni_id}', [ReservasiController::class, 'downloadQr']);
        Route::get('/show-reservasi/{uni_id}', [ReservasiController::class, 'getData']);

        // Route Forum //

        // Route Check in //

        // Route Tiket //
        Route::get('/tiket/{id}', [ReservasiController::class, 'show'])->name('tiket');

    });

    //! Role Crew //

    Route::middleware([
        'role:crew|ph|master',
    ])->group(function() {

        // Role Dashboard //
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Route Administrasi //

        // Route Digital Notes //

        // Route Personal Digital Notes //
        Route::get('/mydiginotes', [MyDigiNoteController::class, 'index'])->name('mydigitalnotes');
        Route::get('/mydiginotes/{id}', [MyDigiNoteController::class, 'show'])->name('show_mydiginotes');
        Route::post('/mydiginotes/store', [MyDigiNoteController::class, 'store'])->name('create_mydiginotes');
        Route::get('/mydiginotes-delete/{id}', [KeuanganController::class, 'destroyMyDiginotes'])->name('delete_keuangan_mydiginotes');

        // Route Reservasi //

        // Route Forum //
        Route::get('/forum', [ForumController::class, 'index'])->name('forum');
        Route::post('/forum-post', [ForumController::class, 'store'])->name('forum_store');

        // Route Check in //
        Route::post('/cek-in/store', [CheckInController::class, 'store'])->name('cek_in_store');
        Route::get('/cek-in', [CheckInController::class, 'index'])->name('cekin');

        // Email //

        // Error //

    });
});
