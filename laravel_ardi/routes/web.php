<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route ke halaman profile
Route::get('/profile', function () {
    return view('profile');
});

//Route dengan parameter (Wajib)
// Route::get('/mahasiswa/{nama}', function ($nama = "Ardi") {
//     echo "<h1>Halo Nama Saya $nama</h2>";
// });

//Route dengan parameter (Tidak Wajib)
Route::get('/mahasiswa2/{nama?}', function ($nama = "Ghifari") {
    echo "<h1>Halo Nama Saya $nama</h2>";
});

//Route dengan parameter lebih dari 1
Route::get(
    '/profile/{nama?}/{pekerjaan?}',
    function ($nama = "Ardi", $pekerjaan = "Mahasiswa") {
        echo "<h1>Halo Nama Saya $nama, Saya adalah $pekerjaan</h2>";
    }
);

//Route redirect
Route::get('/hubungi', function () {
    echo "<h2>Hubungi Kami</h2>";
})->name("call");

Route::redirect('/contact', '/hubungi');

//Route dengan nama
Route::get('/halo', function () {
    echo "<a href='" . route('call') . "'>" . route('call') . "</a>";
});

//Route Group
Route::prefix("/dosen")->group(function () {
    Route::get("/jadwal", function () {
        echo "<h1>Jadwal Dosen </h1>";
    });
    Route::get("/materi", function () {
        echo "<h1>Materi Perkuliahan</h1>";
    });
    //dan lain - lain
});

//Route Dosen
Route::get('/dosen', function () {
    return view('dosen');
});

//Route Dosen index
Route::get('/dosen/index', function () {
    return view('dosen.index');
});

//Route Fakultas
Route::get('/fakultas', function () {
    // return view('fakultas.index', ["ilkom" => ["Fakultas Ilmu Komputer
    // dan Rekayasa"]);

    // return view('fakultas.index', ["fakultas" => ["Fakultas Ilmu Komputer
    // dan Rekayasa", "Fakultas Ilmu Ekonomi"]
    // ]);

    // return view('fakultas.index')->with("fakultas",["Fakultas Ilmu Komputer
    // dan Rekayasa","Fakultas Ilmu Ekonomi"]);

    // $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    // return view ('fakultas.index',compact('fakultas'));

    $kampus = "Universitas Multi Data Palembang";
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    return view('fakultas.index', compact('fakultas', 'kampus'));
});

Route::get('/mahasiswa/insert', [MahasiswaController::class, 'insert']);
Route::get('/mahasiswa/update', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/delete', [MahasiswaController::class, 'delete']);
Route::get('/mahasiswa/select', [MahasiswaController::class, 'select']);

Route::get('/mahasiswa/insert-qb', [MahasiswaController::class, 'insertQb']);
Route::get('/mahasiswa/update-qb', [MahasiswaController::class, 'updateQb']);
Route::get('/mahasiswa/delete-qb', [MahasiswaController::class, 'deleteQb']);
Route::get('/mahasiswa/select-qb', [MahasiswaController::class, 'selectQb']);

Route::get('/mahasiswa/insert-elq', [MahasiswaController::class, 'insertElq']);
Route::get('/mahasiswa/update-elq', [MahasiswaController::class, 'updateElq']);
Route::get('/mahasiswa/delete-elq', [MahasiswaController::class, 'deleteElq']);
Route::get('/mahasiswa/select-elq', [MahasiswaController::class, 'selectElq']);

Route::post('/prodi/store', [ProdiController::class,'store']);
Route::get('/prodi/create', [ProdiController::class,'create']);