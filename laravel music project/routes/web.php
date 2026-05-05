<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MusicTrackController;
use App\Http\Controllers\MusicNewsController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\MailController;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Құпия сөзді қалпына келтіру
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware('auth')->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  
    Route::middleware('permission:view music-tracks')->group(function () {
        Route::get('/music-tracks', [MusicTrackController::class, 'index'])->name('music-tracks.index');
    });

    Route::middleware('permission:create music-tracks')->group(function () {
        Route::get('/music-tracks/create', [MusicTrackController::class, 'create'])->name('music-tracks.create');
        Route::post('/music-tracks', [MusicTrackController::class, 'store'])->name('music-tracks.store');
    });

    Route::middleware('permission:edit music-tracks')->group(function () {
        Route::get('/music-tracks/{id}/edit', [MusicTrackController::class, 'edit'])->name('music-tracks.edit');
        Route::patch('/music-tracks/{id}', [MusicTrackController::class, 'update'])->name('music-tracks.update');
    });

    Route::middleware('permission:delete music-tracks')->group(function () {
        Route::delete('/music-tracks/{id}', [MusicTrackController::class, 'destroy'])->name('music-tracks.destroy');
    });

    
    Route::middleware('permission:view music-news')->group(function () {
        Route::get('/music-news', [MusicNewsController::class, 'index'])->name('music-news.index');
    });

    Route::middleware('permission:create music-news')->group(function () {
        Route::get('/music-news/create', [MusicNewsController::class, 'create'])->name('music-news.create');
        Route::post('/music-news', [MusicNewsController::class, 'store'])->name('music-news.store');
    });

    Route::middleware('permission:edit music-news')->group(function () {
        Route::get('/music-news/{id}/edit', [MusicNewsController::class, 'edit'])->name('music-news.edit');
        Route::patch('/music-news/{id}', [MusicNewsController::class, 'update'])->name('music-news.update');
    });

    Route::middleware('permission:delete music-news')->group(function () {
        Route::delete('/music-news/{id}', [MusicNewsController::class, 'destroy'])->name('music-news.destroy');
    });

    // ===== Admin Panel — тек admin және super-admin =====
    Route::middleware('role:admin|super-admin')->group(function () {
        Route::get('/admin/panel', [DashboardController::class, 'adminPanel'])->name('admin.panel');
    });

    // ===== Пайдаланушыларды басқару — тек super-admin =====
    Route::middleware('permission:manage users')->group(function () {
        Route::delete('/admin/users/{id}', [DashboardController::class, 'destroyUser'])->name('admin.users.destroy');
        Route::patch('/admin/users/{id}/role', [DashboardController::class, 'updateUserRole'])->name('admin.users.role');
    });

    // ===== Аналитика — рұқсат бойынша =====
    Route::middleware('permission:view analytics')->group(function () {
        Route::get('/admin/analytics', [DashboardController::class, 'analytics'])->name('admin.analytics');
    });

    // ===== Файлды жүктеу (File Upload) — тек белгілі рөлдерге =====
    Route::middleware('role:super-admin|admin|moderator')->group(function () {
        Route::get('/upload', [UploadFileController::class, 'index'])->name('upload.index');
        Route::post('/upload', [UploadFileController::class, 'store'])->name('upload.store');
    });

    // ===== Пошта жіберу (Email Sending) =====
    Route::get('/send-email', [MailController::class, 'sendEmail'])->name('email.send');
});

