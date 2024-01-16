<?php

use App\Http\Controllers\Admin\CalonController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KandidatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\VotingController as ApiVotingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\SessionCheckController;

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

Route::get('/check-session', [SessionCheckController::class, 'checkSession'])->name('check.session');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', HomeController::class . '@index')->name('home');
    Route::get('/vote/{id}', VotingController::class . '@vote')->name('vote');
});


Route::prefix('admin')
    ->middleware(['auth', 'admin'])->group(function () {
        Route::get('/', DashboardController::class . '@index')->name('admin.home');
        Route::resource('calon', CalonController::class);
        // Route::get('calon/{id}/edit', [CalonController::class, '@edit'])->name('calon.edit');
        // Route::get('/calon/{id}/edit', [AdminController::class, 'editCalon'])->name('calon.edit');
        // Route::get('calon', [CalonController::class, 'index'])->name('calon.index');
        // Route::post('calon', [AdminController::class, 'deleteCalon'])->name('calon.destroy');
        // Route::post('calon', [CalonController::class, 'create'])->name('calon.create');
        // Route::post('calon/{id}/delete', [AdminController::class, '@deleteCalon'])->name('admin.deleteCalon');
        // Route::get('calon/{id}/edit', [CalonController::class, 'edit'])->name('calon.edit');

        Route::put('/updateCalon/{id}', [AdminController::class, 'updateCalon'])->name('admin.updateCalon');


        Route::post('/tambahCalon', AdminController::class . '@addCalon')->name('admin.addCalon');
        Route::put('/tambahCalon/{id}', [AdminController::class, 'updateCalon'])->name('admin.updateCalon');

        Route::get('/totalSuara', ApiVotingController::class . '@getSuara')->name('api.totalSuara');
        Route::get('/pemilihTerkini', ApiVotingController::class . '@getPemilihTerkini')->name('api.pemilihTerkini');
        Route::get('/sudahMemilih', ApiVotingController::class . '@getSudahMemilih')->name('api.sudahMemilih');
        Route::get('/pemilih', AdminController::class . '@dataPemilih')->name('admin.pemilih');
        Route::post('/importPemilih', AdminController::class . '@importPemilih')->name('admin.importPemilih');
        Route::get('/downloadTemplate', AdminController::class . '@downloadTemplate')->name('admin.downloadTemplate');
        Route::get('/resetPemilih/{id}/{id_calon}', AdminController::class . '@resetPemilih')->name('admin.resetPemilih');
        Route::get('/deletePemilih/{id}', AdminController::class . '@deletePemilih')->name('admin.deletePemilih');
        Route::get('/kelas', AdminController::class . '@dataKelas')->name('admin.kelas');
    });
