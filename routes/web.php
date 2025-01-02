<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IncomingMailController;
use App\Http\Controllers\InternalMemoController;
use App\Http\Controllers\OutgoingMailController;
use App\Http\Controllers\SuratPerjanjianController;

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

// Halaman Login (Guest & SSO Middleware)
Route::get('/', [LoginController::class, 'showLoginForm'])
    ->middleware(['redirect_if_authenticated'])
    ->name('login');

Route::post('/dashboard', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

    // Incoming Mail Routes
    Route::prefix('incoming-mail')->name('incoming-mail.')->group(function () {
        Route::get('/index', [IncomingMailController::class, 'index'])->name('index');
        Route::get('/history', [IncomingMailController::class, 'history'])->name('history');
        Route::get('/form', [IncomingMailController::class, 'form'])->name('form');
        Route::post('/index', [IncomingMailController::class, 'store'])->name('store');
        Route::get('/detail/{ticket_number}', [IncomingMailController::class, 'show'])->name('detail');
        Route::post('/{ticket_number}/upload', [IncomingMailController::class, 'upload'])->name('upload');
    });

    // Outgoing Mail Routes
    Route::prefix('outgoing-mail')->name('outgoing-mail.')->group(function () {
        Route::get('/index', [OutgoingMailController::class, 'index'])->name('index');
        Route::get('/history', [OutgoingMailController::class, 'history'])->name('history');
        Route::get('/form', [OutgoingMailController::class, 'form'])->name('form');
        Route::post('/index', [OutgoingMailController::class, 'store'])->name('store');
        Route::get('/detail/{ticket_number}', [OutgoingMailController::class, 'show'])->name('detail');
        Route::post('/{ticket_number}/upload', [OutgoingMailController::class, 'upload'])->name('upload');
    });

    // Internal Memo Routes
    Route::prefix('internal-memo')->name('internal-memo.')->group(function () {
        Route::get('/index', [InternalMemoController::class, 'index'])->name('index');
        Route::get('/history', [InternalMemoController::class, 'history'])->name('history');
        Route::get('/form', [InternalMemoController::class, 'form'])->name('form');
        Route::post('/index', [InternalMemoController::class, 'store'])->name('store');
        Route::get('/detail/{ticket_number}', [InternalMemoController::class, 'show'])->name('detail');
        Route::post('/{ticket_number}/upload', [InternalMemoController::class, 'upload'])->name('upload');
    });

    // Surat Perjanjian Routes
    Route::prefix('surat-perjanjian')->name('surat-perjanjian.')->group(function () {
        Route::get('/index', [SuratPerjanjianController::class, 'index'])->name('index');
        Route::get('/history', [SuratPerjanjianController::class, 'history'])->name('history');
        Route::get('/form', [SuratPerjanjianController::class, 'form'])->name('form');
        Route::post('/index', [SuratPerjanjianController::class, 'store'])->name('store');
        Route::get('/detail/{ticket_number}', [SuratPerjanjianController::class, 'show'])->name('detail');
        Route::post('/{ticket_number}/upload', [SuratPerjanjianController::class, 'upload'])->name('upload');
    });
});
