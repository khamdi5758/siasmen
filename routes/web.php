<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LapharianController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ADMMahasiswaController;
use App\Http\Controllers\ADMTuamController;
use App\Http\Controllers\ADMDosenController;
use App\Http\Controllers\ADMPnltdosController;
use App\Http\Controllers\MHSTamhsController;
use App\Http\Controllers\MHSDospemController;
use App\Http\Controllers\DOSMhsbmbController;
use App\Http\Controllers\DOSPnltdosController;



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
    return view('homepage.index');
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
    Route::get('/tamhs', [ADMTuamController::class,'index'])->name('tamhs');
    Route::get('/dftrdos', [ADMDosenController::class,'index'])->name('dftrdos');
    Route::get('/pnltdos', [ADMPnltdosController::class,'index'])->name('pnltdos');
    Route::get('/pnltdos/nipdosen', [ADMPnltdosController::class,'nipdosen'])->name('nipdosen');
  });


Route::group(['prefix' => 'mahasiswa',  'as' => 'mahasiswa.'], function () {
    Route::get('/', function () {
        return view('mahasiswa.index');
    });
    Route::get('/index', function () {
        return view('mahasiswa.index');
    });
    Route::get('/tamhs', [MHSTamhsController::class,'index'])->name('mhstamhs');
    Route::get('/atamhs', function () {
        return view('mahasiswa.atamhs');
    });
    Route::get('/dospem', [MHSDospemController::class,'index'])->name('mhsdospemmhs');
});



Route::group(['prefix' => 'dosen',  'as' => 'dosen.'], function () {
    Route::get('/', function () {
        return view('dosen.index');
    });
    Route::get('/index', function () {
        return view('dosen.index');
    });
    Route::get('/mhsbim', [ DOSMhsbmbController::class,'index'])->name('dossmhsbim');
    Route::get('/pnltdos', [ DOSPnltdosController::class,'index'])->name('dosspnltdos');

});


Route::get('lapharian/cetak',[LapharianController::class,'cetak']);
Route::resource('lapharian', LapharianController::class);
Route::resource('students', StudentController::class);
Route::resource('admmahasiswa', ADMMahasiswaController::class);
Route::resource('admtuam', ADMTuamController::class);
Route::resource('admdosen', ADMDosenController::class);
Route::resource('admpnltdosen', ADMPnltdosController::class);
Route::resource('dosmhsbim', DOSMhsbmbController::class);
Route::resource('dospnltdos', DOSPnltdosController::class);




// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
