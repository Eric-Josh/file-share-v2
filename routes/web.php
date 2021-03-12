<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DataSourceController;
use App\Http\Controllers\EmailSubscribersController;
use App\Http\Controllers\FileUploadsController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/data-sources', [DataSourceController::class, 'index'])->name('data-sources');
    Route::post('/data-sources/post',[DataSourceController::class, 'store'])->name('data-sources.store');
    Route::get('/data-sources/edit',[DataSourceController::class, 'edit'])->name('data-sources.edit');
    Route::put('/data-sources/{id}',[DataSourceController::class, 'update'])->name('data-sources.update');
    Route::delete('/data-sources/{id}',[DataSourceController::class, 'destroy'])->name('data-sources.destroy');

    Route::get('/mail-subscribers', [EmailSubscribersController::class, 'index'])->name('mail-subscribers');
    Route::post('/mail-subscribers/post',[EmailSubscribersController::class, 'store'])->name('mail-subscribers.store');
    Route::get('/mail-subscribers/edit',[EmailSubscribersController::class, 'edit'])->name('mail-subscribers.edit');
    Route::put('/dmail-subscribers/{id}',[EmailSubscribersController::class, 'update'])->name('mail-subscribers.update');
    Route::delete('/mail-subscribers/{id}',[EmailSubscribersController::class, 'destroy'])->name('mail-subscribers.destroy');
    Route::put('/mail-subscribers/{id}',[EmailSubscribersController::class, 'status'])->name('mail-subscribers.status');

    Route::get('/file-uploads', [FileUploadsController::class, 'index'])->name('file-uploads');
    Route::post('/file-uploads/post',[FileUploadsController::class, 'store'])->name('file-uploads.store');
    Route::delete('/file-uploads/{id}',[FileUploadsController::class, 'destroy'])->name('file-uploads.destroy');
});