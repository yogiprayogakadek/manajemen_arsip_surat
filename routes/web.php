<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function() {
    Route::get('/home', 'DashboardController@index');
    Route::namespace('Main')->group(function() {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        // klasifikasi Route
        Route::controller(KlasifikasiSuratController::class)
            ->prefix('klasifikasi')
            ->as('klasifikasi.')
            ->group(function(){
                Route::get('', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
        });

        // tipe Route
        Route::controller(TipeSuratController::class)
            ->prefix('tipe')
            ->as('tipe.')
            ->group(function(){
                Route::get('', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
        });

        // dinas Route
        Route::controller(DinasController::class)
            ->prefix('dinas')
            ->as('dinas.')
            ->group(function(){
                Route::get('', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
        });

        // unit kerja Route
        Route::controller(UnitKerjaController::class)
            ->prefix('unit-kerja')
            ->as('unit.')
            ->group(function(){
                Route::get('', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
        });

        // surat masuk Route
        Route::controller(SuratMasukController::class)
            ->prefix('surat-masuk')
            ->as('masuk.')
            ->group(function(){
                Route::get('', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::get('/lampiran/{id}', 'lampiran')->name('lampiran');
                Route::get('/hapus-lampiran/{surat_id}/{lampiran_id}', 'hapusLampiran')->name('hapus.lampiran');
        });

        // surat masuk Route
        Route::controller(SuratKeluarController::class)
            ->prefix('surat-keluar')
            ->as('keluar.')
            ->group(function(){
                Route::get('', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::get('/pengajuan/{id}', 'pengajuan')->name('pengajuan');
        });

        // pengajuan Route
        Route::controller(PengajuanController::class)
            ->prefix('pengajuan')
            ->as('pengajuan.')
            ->group(function(){
                Route::get('', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::get('/validasi/{id}', 'validasi')->name('validasi');
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
