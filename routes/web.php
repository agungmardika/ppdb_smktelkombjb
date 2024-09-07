<?php

use App\Http\Controllers\bukuTamuController;
use App\Http\Controllers\bukuTamuFormController;
use App\Http\Controllers\DaftarUlangController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PeminatController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DateTimeController;
use App\Http\Controllers\PendaftarDetailController;
use Illuminate\Support\Facades\Route;

Route::get('brosur', function () {
    return view('brosur');
});

Route::get('alur', function () {
    return view('alur');
});

Route::get('index', function () {
    return view('index');
});
Route::post('index', function () {
    return view('index');
});


Route::get('/login', [SessionController::class, 'index']);
Route::get('/logout', [SessionController::class, 'logout']);
Route::get('/logout_index', [SessionController::class, 'logout_index']);
Route::post('/login', [SessionController::class, 'login']);
Route::post('table/dashboard', [SessionController::class, 'dashboard'])->middleware('IsLogin');
Route::get('/table/dashboard', [SessionController::class, 'dashboard'])->middleware('IsLogin');


Route::group(['middleware' => 'IsLogin'], function () {
    Route::resource('/table/bukutamu', bukuTamuController::class);
    Route::resource('/table/users', UsersController::class);
    Route::resource('/table/peminat', PeminatController::class);
    Route::resource('/table/pendaftar', PendaftarController::class);
    Route::resource('/table/daftarulang', DaftarUlangController::class);

    Route::get('/api/count', [SessionController::class, 'getCount']);
    // Route::get('/table/peminat/{no_reg}/move-to-pendaftar', [PeminatController::class, 'moveToPendaftar'])
    // ->name('peminat.moveToPendaftar');


});

Route::resource('/form/peminat', FormController::class);
Route::resource('/form/bukutamu', bukuTamuFormController::class);
Route::get('/form/peminat/{no_reg}', [FormController::class, 'show'])->name('form.peminat.show');
