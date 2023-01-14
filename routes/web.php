<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LapharianController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ADMMahasiswaController;
use App\Http\Controllers\ADMTuamController;
use App\Http\Controllers\ADMDosenController;

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
});




Route::group(['prefix' => 'admin',  'as' => 'admin.'], function () {

    // Route::get('/test', [AdminIndexController::class, 'index'])->name('test'); 
    // Route::get('/test/create', [AdminIndexController::class, 'create'])->name('test.create'); 
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/index', function () {
        return view('admin.index');
    });
    Route::get('/dftrmhs', [ADMMahasiswaController::class,'index'])->name('dftrmhs');
    Route::get('/admmahasiswa/edit', [ADMMahasiswaController::class, 'edit'])->name('editdftrmhs');
    // Route::post('/admmahasiswa/update', [ADMMahasiswaController::class, 'update'])->name('updatedftrmhs');

    Route::get('/tamhs', [ADMTuamController::class,'index'])->name('tamhs');
    // Route::get('/tamhs', function () {
    //     return view('admin.tamhs');
    // });
    Route::get('/dftrdos', [ADMDosenController::class,'index'])->name('dftrdos');
    Route::get('/pnltdos', function () {
        return view('admin.pnltdos');
    });
  });



Route::get('/mahasiswa', function () {
    return view('mahasiswa.index');
});
Route::get('/mahasiswa/tamhs', function () {
    return view('mahasiswa.tamhs');
});
Route::get('/mahasiswa/atamhs', function () {
    return view('mahasiswa.atamhs');
});
Route::get('/mahasiswa/dospem', function () {
    return view('mahasiswa.daftardos');
});
Route::get('/dosen', function () {
    return view('dosen.index');
});
Route::get('/dosen/mhsbim', function () {
    return view('dosen.mhsbim');
});
Route::get('/dosen/pnltdos', function () {
    return view('dosen.pnltdos');
});

Route::get('lapharian/cetak',[LapharianController::class,'cetak']);
Route::resource('lapharian', LapharianController::class);
Route::resource('students', StudentController::class);
Route::resource('admmahasiswa', ADMMahasiswaController::class);
Route::resource('admtuam', ADMTuamController::class);
Route::resource('admdosen', ADMDosenController::class);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
