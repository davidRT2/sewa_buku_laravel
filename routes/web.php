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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('data_peminjam', 'App\Http\Controllers\DataPeminjamController@index')->name('data_peminjam.index');

// Route::get('peminjaman', 'App\Http\Controllers\PeminjamanController@index')->name('peminjaman.index');

Route::get('data_peminjam', 'App\Http\Controllers\DataPeminjamController@index');

Route::get('data_peminjam/create', 'App\Http\Controllers\DataPeminjamController@create')->name('data_peminjam.create');

Route::post('data_peminjam/store', 'App\Http\Controllers\DataPeminjamController@store')->name('data_peminjam.store');

Route::get('data_peminjam/edit/{id}', "App\Http\Controllers\DataPeminjamController@edit")->name('data_peminjam.edit');

Route::post('data_peminjam/update/{id}', "App\Http\Controllers\DataPeminjamController@update")->name('data_peminjam.update');

Route::post('data_peminjam/delete/{id}', "App\Http\Controllers\DataPeminjamController@destroy")->name('data_peminjam.destroy');

Route::get('data_peminjam/search', "App\Http\Controllers\DataPeminjamController@search")->name('data_peminjam.search');

Route::get('coba_collection', "App\Http\Controllers\DataPeminjamController@CobaCollection");

Route::get('collection_first', "App\Http\Controllers\DataPeminjamController@collection_first");

Route::get('collection_last', "App\Http\Controllers\DataPeminjamController@collection_last");

Route::get('collection_count', "App\Http\Controllers\DataPeminjamController@collection_count");

Route::get('collection_take', "App\Http\Controllers\DataPeminjamController@collection_take");

Route::get('collection_pluck', "App\Http\Controllers\DataPeminjamController@collection_pluck");

Route::get('collection_where', "App\Http\Controllers\DataPeminjamController@collection_where");

Route::get('collection_whereIN', "App\Http\Controllers\DataPeminjamController@collection_whereIN");

Route::get('collection_toArray', "App\Http\Controllers\DataPeminjamController@collection_toarray");

Route::get('collection_toJson', "App\Http\Controllers\DataPeminjamController@collection_toJson");

Route::get('data_peminjam', 'App\Http\Controllers\DataPeminjamController@index')->name('data_peminjam.index');

Route::get('peminjaman', 'App\Http\Controllers\PeminjamanController@index')->name('peminjaman.index');

Route::get('peminjaman/create', 'App\Http\Controllers\PeminjamanController@create')->name('peminjaman.create');

Route::post('peminjaman/store', 'App\Http\Controllers\PeminjamanController@store')->name('peminjaman.store');

Route::get('peminjaman/detail_peminjam/{id}', 'App\Http\Controllers\PeminjamanController@detail_peminjam')->name('peminjaman.detail_peminjam');

Route::get('peminjaman/detail_buku/{id}', 'App\Http\Controllers\PeminjamanController@detail_buku')->name('peminjaman.detail_buku');

Route::get('user', 'App\Http\Controllers\UserController@index')->name('user.index');

Route::get('user/create', 'App\Http\Controllers\UserController@create')->name('user.create');

Route::post('user/store', 'App\Http\Controllers\UserController@store')->name('user.store');

Route::get('user/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('user.edit');

Route::post('user/update/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');

Route::post('user/destroy/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');

// Route::get('home', function(){
//     return view('home');
// });

Route::get('lihat_data_peminjam', 'App\Http\Controllers\PeminjamController@lihat_data_peminjam');
// Route::get('lihat_data_peminjam', function(){
//     $peminjam = ['Jessica', 'sdsd'];
//     return view('peminjams/lihat_data_peminjam', compact('peminjam'));
// });



Route::get('biodata', function(){
    return 'Nama : David <br> NIM : 34234324 <br> Alamat : Jl. Sirajudin Kota Semarang <br> Hobi : Mancing Ikan';
});

// Route::get('mahasiswa/{prodi}', function($prodi){
//     return "Mahasiswa Program Studi : ".$prodi;
// });

// Route::get("mahasiswa2/{prodi?}", function($prodi=NULL){
//     if($prodi == Null){
//         return "Data Mahasiswa Kosong";
//     }
//     return "Mahasiswa Program Studi ".$prodi;
// });

// Route::get("mahasiswa3/{prodi?}", function($prodi='Teknologi Rekayasa Komputer'){
//     return "Mahasiswa Prodi : ".$prodi;
// });

// Route::get("biodata2", function(){
//     return view('biodata2');
// });

// Route::group([], function(){
//     Route::get('/pertama', function(){
//         echo 'route pertama';
//     });
//     Route::get('/kedua', function(){
//         echo 'route kedua';
//     });
//     Route::get('/ketiga', function(){
//         echo 'route ketiga';
//     });

// });

// Route::group(['prefix' => 'latihan'], function(){
//     Route::get('/satu', function(){
//         echo 'Latihan1';
//     });
//     Route::get('/dua', function(){
//         echo 'Latihan2';
//     });
//     Route::get('/tiga', function(){
//         echo 'Latihan3';
//     });
// });

// Route::group(array('prefix' => 'admin'), function(){
//     Route::get('/', function(){
//         return 'Halaman Home Admin';
//     });
//     Route::get('posts', function(){
//         return "Halaman input data buku";
//     });
//     Route::get('post/simpan', function(){
//         return "Data Berhasil Disimpan";
//     });
// });

// Route::name('kuliah')->group(function(){
//     Route::get('Teknologi Rekayasa Komputer', function(){
//         return "Kuliah di Program Stusdi Teknologi Rekayasa Komputer";
//     });
// });