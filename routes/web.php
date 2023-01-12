<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\DiagnosaController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/riwayat', function () {
    return view('riwayat');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);

    Route::resource('gejala', 'App\Http\Controllers\GejalaController');

    Route::resource('kerusakan', 'App\Http\Controllers\KerusakanController');

    Route::get('riwayat', [App\Http\Controllers\DashboardController::class, 'riwayat']);
});

Route::group(['prefix' => 'diagnosa'], function () {
    Route::get('/', [App\Http\Controllers\DiagnosaController::class, 'pasienForm']);
    Route::post('/', [App\Http\Controllers\DiagnosaController::class, 'storePasien']);
    Route::post('/cek', 'DiagnosaController@diagnosa')->name('diagnosa');
    Route::get('/{pasien_id}/hasil', 'DiagnosaController@hasilDiagnosa')->name('hasilDiagnosa');
});
