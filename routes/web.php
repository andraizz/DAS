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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/dashboard2', function () {
    return view('dashboard2');
})->middleware('guest');

Route::get('/', [LoginController::class, 'showLoginForm'])->middleware('redirect_if_authenticated')->name('login');
Route::post('/dashboard', [LoginController::class, 'login'])->name('login.post');
// Route::get('forgetPassword', [LoginController::class, 'forgetPassword'])->name('forgetPassword');
// Route::post('changeForgetPassword', [LoginController::class, 'changeForgetPassword'])->name('changeForgetPassword');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    // Route::get('profile', [LoginController::class, 'profile'])->name('profile');
    // Route::get('changePassword', [LoginController::class, 'changePassword'])->name('changePassword');

    Route::get('/incoming-mail/index', [IncomingMailController::class, 'index'])->name('incoming-mail.index');
    Route::get('/incoming-mail/history', [IncomingMailController::class, 'history'])->name('incoming-mail.history');
    Route::get('/incoming-mail/form', [IncomingMailController::class, 'form'])->name('incoming-mail.form');
    Route::post('/incoming-mail/index', [IncomingMailController::class, 'store'])->name('incoming-mail.store');
    Route::get('/incoming-mail/detail/{ticket_number}', [IncomingMailController::class, 'show'])->name('incoming-mail.detail');
    Route::post('/incoming-mail/{ticket_number}/upload', [IncomingMailController::class, 'upload'])->name('incoming-mail.upload');

    Route::get('/outgoing-mail/index', [OutgoingMailController::class, 'index'])->name('outgoing-mail.index');
    Route::get('/outgoing-mail/history', [OutgoingMailController::class, 'history'])->name('outgoing-mail.history');
    Route::get('/outgoing-mail/form', [OutgoingMailController::class, 'form'])->name('outgoing-mail.form');
    Route::post('/outgoing-mail/index', [OutgoingMailController::class, 'store'])->name('outgoing-mail.store');
    Route::get('/outgoing-mail/detail/{ticket_number}', [OutgoingMailController::class, 'show'])->name('outgoing-mail.detail');
    Route::post('/outgoing-mail/{ticket_number}/upload', [OutgoingMailController::class, 'upload'])->name('outgoing-mail.upload');

    Route::get('/internal-memo/index', [InternalMemoController::class, 'index'])->name('internal-memo.index');
    Route::get('/internal-memo/history', [InternalMemoController::class, 'history'])->name('internal-memo.history');
    Route::get('/internal-memo/form', [InternalMemoController::class, 'form'])->name('internal-memo.form');
    Route::post('/internal-memo/index', [InternalMemoController::class, 'store'])->name('internal-memo.store');
    Route::get('/internal-memo/detail/{ticket_number}', [InternalMemoController::class, 'show'])->name('internal-memo.detail');
    Route::post('/internal-memo/{ticket_number}/upload', [InternalMemoController::class, 'upload'])->name('internal-memo.upload');

    Route::get('/surat-perjanjian/index', [SuratPerjanjianController::class, 'index'])->name('surat-perjanjian.index');
    Route::get('/surat-perjanjian/history', [SuratPerjanjianController::class, 'history'])->name('surat-perjanjian.history');
    Route::get('/surat-perjanjian/form', [SuratPerjanjianController::class, 'form'])->name('surat-perjanjian.form');
    Route::post('/surat-perjanjian/index', [SuratPerjanjianController::class, 'store'])->name('surat-perjanjian.store');
    Route::get('/surat-perjanjian/detail/{ticket_number}', [SuratPerjanjianController::class, 'show'])->name('surat-perjanjian.detail');
    Route::post('/surat-perjanjian/{ticket_number}/upload', [SuratPerjanjianController::class, 'upload'])->name('surat-perjanjian.upload');

    // Route::post('submitChangePassword', [LoginController::class, 'submitChangePassword'])->name('submitChangePassword');
});
