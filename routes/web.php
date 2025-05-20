<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\ProposalController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/daily-reports/create', [DailyReportController::class, 'create'])->name('daily-reports.create')->middleware('auth');
Route::post('/daily-reports', [DailyReportController::class, 'store'])->name('daily-reports.store')->middleware('auth');
Route::get('/daily-reports/{id}/download', [DailyReportController::class, 'download'])->name('daily-reports.download')->middleware('auth');

Route::get('/proposals/create', [ProposalController::class, 'create'])->name('proposals.create')->middleware('auth');
Route::post('/proposals', [ProposalController::class, 'store'])->name('proposals.store')->middleware('auth');
Route::get('/proposals/{id}/download', [ProposalController::class, 'download'])->name('proposals.download')->middleware('auth');

Route::get('/', function () {
    return redirect()->route('home');
});
