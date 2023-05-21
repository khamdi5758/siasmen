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
use App\Http\Controllers\MHSPnltdosController;
use App\Http\Controllers\DOSMhsbmbController;
use App\Http\Controllers\DOSPnltdosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ADMPtuakmhsController;
use App\Http\Controllers\ADMUbahProfController;
use App\Http\Controllers\MHSUbahProfController;
use App\Http\Controllers\MHSUbahPasswController;
use App\Http\Controllers\DOSUbahProfController;
use App\Http\Controllers\DOSUbahPasswController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Ptuakmhs;

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
// Route::get('/coba', [DashboardController::class,'dosendash']);


//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk superadmin
// Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
//     Route::get('/superadmin', [SuperadminController::class, 'index']);
// });

// untuk pegawai
// Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
//     Route::get('/pegawai', [PegawaiController::class, 'index']);
// });


// Route::controller(LoginController::class)->group(function ()
// {
//     Route::get('login','index')->name('login');
//     Route::post('login/proses','proses');

// });
// Route::get('login',[LoginController::class,'index'])->name('login');

// Route::middleware(['auth', 'user-access:admin'])->group(function () {
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    
Route::group(['prefix' => 'admin',  'as' => 'admin.'], function () {

    // Route::get('/test', [AdminIndexController::class, 'index'])->name('test'); 
    // Route::get('/test/create', [AdminIndexController::class, 'create'])->name('test.create'); 
    // Route::get('/', function () {
    //     return view('admin.index');
    // });
    // Route::get('/index', function () {
    //     return view('admin.index');
    // });
    Route::get('/', [DashboardController::class,'admindash']);
    Route::get('/index', [DashboardController::class,'admindash']);
    Route::get('/dftrmhs', [ADMMahasiswaController::class,'index'])->name('dftrmhs');
    Route::get('/admmahasiswa/edit', [ADMMahasiswaController::class, 'edit'])->name('editdftrmhs');
    Route::get('/tamhs', [ADMTuamController::class,'index'])->name('tamhs');
    Route::get('/ptuakmhs', [ADMPtuakmhsController::class,'index'])->name('ptuakmhs');
    Route::get('/dftrdos', [ADMDosenController::class,'index'])->name('dftrdos');
    Route::get('/pnltdos', [ADMPnltdosController::class,'index'])->name('pnltdos');
    Route::get('/pnltdos/nipdosen', [ADMPnltdosController::class,'nipdosen'])->name('nipdosen');
    Route::get('/ubahprofile', [ADMUbahProfController::class,'index'])->name('admubahprofile');
    Route::get('/ubahpass', [ADMPnltdosController::class,'index'])->name('ubahpass');
    // Route::get('/pnltdos/nipdosen', [ADMPnltdosController::class,'nipdosen'])->name('nipdosen');
  });
  Route::resource('admmahasiswa', ADMMahasiswaController::class);
  Route::resource('admtuam', ADMTuamController::class);
  Route::resource('admptuakmhs', ADMPtuakmhsController::class);
  Route::resource('admdosen', ADMDosenController::class);
  Route::resource('admpnltdosen', ADMPnltdosController::class);
  Route::resource('admubahprofile', ADMUbahProfController::class);
});

// });

Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
// Route::middleware(['auth', 'user-access:mahasiswa'])->group(function () {
Route::group(['prefix' => 'mahasiswa',  'as' => 'mahasiswa.'], function () {
    Route::get('/', function () {
        return view('mahasiswa.index');
    });
    // Route::get('/index', function () {
    //     return view('mahasiswa.index');
    // })->name('indexmhs');
    Route::get('/', [DashboardController::class,'mhsdash']);
    Route::get('/index', [DashboardController::class,'mhsdash'])->name('indexmhs');
    Route::get('/tamhs', [MHSTamhsController::class,'index'])->name('mhstamhs');
    Route::post('/rekomdos', [MHSTamhsController::class,'rekomdos']);
    Route::get('/statustuak', [MHSTamhsController::class,'halstatusta'])->name('mhssatusta');
    Route::post('/coba', [MHSTamhsController::class,'coba']);
    Route::get('/cobaaa', [MHSTamhsController::class,'cobaaa']);
    Route::get('/ubahprofile', [MHSUbahProfController::class,'index'])->name('mhsubahprofile');
    Route::get('/ubahpassword', [MHSUbahPasswController::class,'index'])->name('mhsubahpassword');
    Route::get('/atamhs', function () {
        $user = auth()->user();
        $iduser = User::tampildatuser($user->username, $user->type)->id;
        $data = Ptuakmhs::where('mahasiswas_id', $iduser)->get();
        if ($data->isNotEmpty()) {
            $konfdos = $data[0]['konfdospil'];
            $konfadmin = $data[0]['konfadmin'];
            if ($konfdos == null and $konfadmin == null){
                return view('mahasiswa.statusta',['data' => $data]);
            } else if ($konfdos != null and $konfadmin == null) {
                return view('mahasiswa.statusta',['data' => $data]);
            } else if ($konfdos == null and $konfadmin != null) {
                return view('mahasiswa.statusta',['data' => $data]);
            }else{
                return view('mahasiswa.statusta',['data' => $data]);
            }
        }else{
            return view('mahasiswa.atamhs');
        }
        
    });
    Route::get('/mhspnltdos', [MHSPnltdosController::class,'index'])->name('mhspnltdos');
    // Route::get('/mhspnltdos', function () {
    //     return view('mahasiswa.pnltdos');
    // });
    Route::get('/dospem', [MHSDospemController::class,'index'])->name('mhsdospemmhs');
});
    Route::resource('mhstamhs', MHSTamhsController::class);
    Route::resource('mhspnltdos', MHSPnltdosController::class);
    Route::resource('mhsubahprofile', MHSUbahProfController::class);
    Route::resource('mhsubahpassword', MHSUbahPasswController::class);

});

Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
// Route::middleware(['auth', 'user-access:dosen'])->group(function () {
Route::group(['prefix' => 'dosen',  'as' => 'dosen.'], function () {
    Route::get('/', function () {
        return view('dosen.index');
    });
    // Route::get('/index', function () {
    //     return view('dosen.index');
    // })->name('indexdos');
    Route::get('/', [DashboardController::class,'dosendash']);
    Route::get('/index', [DashboardController::class,'dosendash'])->name('indexdos');
    Route::get('/mhsbim/', [ DOSMhsbmbController::class,'index'])->name('dosmhsbim');
    // Route::get('/mhsbimm/{id}', [ DOSMhsbmbController::class,'show'])->name('dossmhsbim');
    Route::get('/pnltdos', [ DOSPnltdosController::class,'index'])->name('dosspnltdos');
    Route::get('/pnltsaya', [ DOSPnltdosController::class,'pnltsaya']);
    Route::get('/ubahprofile', [DOSUbahProfController::class,'index'])->name('dosubahprofile');
    Route::get('/ubahpassword', [DOSUbahPasswController::class,'index'])->name('dosubahpassword');

});
    Route::resource('dosmhsbim', DOSMhsbmbController::class);
    Route::resource('dospnltdos', DOSPnltdosController::class);
    Route::resource('dosubahprofile',DOSUbahProfController::class);
    Route::resource('dosubahpassword', DOSUbahPasswController::class);

});


Route::get('lapharian/cetak',[LapharianController::class,'cetak']);
Route::resource('lapharian', LapharianController::class);
Route::resource('students', StudentController::class);

// Route::resource('admmahasiswa', ADMMahasiswaController::class);
// Route::resource('admtuam', ADMTuamController::class);
// Route::resource('admptuakmhs', ADMPtuakmhsController::class);
// Route::resource('admdosen', ADMDosenController::class);
// Route::resource('admpnltdosen', ADMPnltdosController::class);
// Route::resource('admubahprofile', ADMUbahProfController::class);

// Route::resource('mhstamhs', MHSTamhsController::class);
// Route::resource('mhspnltdos', MHSPnltdosController::class);
// Route::resource('mhsubahprofile', MHSUbahProfController::class);
// Route::resource('mhsubahpassword', MHSUbahPasswController::class);

// Route::resource('dosmhsbim', DOSMhsbmbController::class);
// Route::resource('dospnltdos', DOSPnltdosController::class);
// Route::resource('dosubahprofile',DOSUbahProfController::class);
// Route::resource('dosubahpassword', DOSUbahPasswController::class);





// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
