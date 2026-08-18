<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\IndustriesController;
use App\Http\Controllers\SubsidiariesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ContactController;

// Admin Controllers
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\JobController as AdminJobController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/industries', [IndustriesController::class, 'index'])->name('industries');
Route::get('/industries/{slug}', [IndustriesController::class, 'show'])->name('industries.show');
Route::get('/subsidiaries', [SubsidiariesController::class, 'index'])->name('subsidiaries');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/careers', [CareersController::class, 'index'])->name('careers');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Protected Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Posts / News CRUD
    Route::resource('posts', AdminPostController::class);

    // Messages Inbox
    Route::get('/messages', [AdminMessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [AdminMessageController::class, 'show'])->name('messages.show');
    Route::post('/messages/{message}/toggle-read', [AdminMessageController::class, 'toggleRead'])->name('messages.toggle-read');
    Route::delete('/messages/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');

    // Job Openings
    Route::resource('jobs', AdminJobController::class);
    Route::post('/jobs/{job}/toggle', [AdminJobController::class, 'toggle'])->name('jobs.toggle');

    // System Settings & Cache
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings/clear-cache', [AdminSettingController::class, 'clearCache'])->name('settings.clear-cache');
    Route::post('/settings/test-mail', [AdminSettingController::class, 'sendTestMail'])->name('settings.test-mail');
});
