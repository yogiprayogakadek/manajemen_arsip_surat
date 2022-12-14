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
        Route::get('/', 'DashboardController@index');

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
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
