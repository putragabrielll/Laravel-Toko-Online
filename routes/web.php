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
// Untuk Final
    // User
        Route::get('/', function () {
            return view('welcome');
        });
        
        Auth::routes();
        Route::get('/home', 'dashboardController@create')->name('home');
        Route::get('detail/{id}', 'dashboardController@index');
        Route::get('pesan/{id}', 'dashboardController@tampil');
        Route::post('pesan/{id}', 'dashboardController@pesan');
        Route::get('check-out', 'dashboardController@check_out');
        Route::delete('check-out/{id}', 'dashboardController@destroy');
        Route::get('konfirmasi-check-out', 'dashboardController@konfirmasi');
        // Controller Profile Pada User
        Route::get('profile', 'profileController@index');
        Route::post('profile', 'profileController@update');
        // Untuk Tampilan History di User
        Route::get('history', 'historyController@index');
        Route::get('history/{id}', 'historyController@detail');

    // Admin
        Route::get('admin', 'dashboard_adminController@create');
        Route::get('admin/data_barang', 'dashboard_adminController@index');
        Route::post('data_barang', 'dashboard_adminController@store');
        Route::delete('admin/data_barang/{id}', 'dashboard_adminController@destroy');
        Route::get('admin/data_barang/{id}/edit', 'dashboard_adminController@edit');
        Route::put('admin/data_barang/{id}', 'dashboard_adminController@update');

        Route::get('admin/invoices', 'dashboard_adminController@index');




// Untuk Bebas & Tugas-tugas
Route::get('/king', 'dataController@hotel'); 
Route::get('/king/rumah', 'dataController@rumah'); 
Route::get('/king/gedung', 'dataController@gedung'); 

Route::get('data', 'LaravelController@index');
Route::get('data1', 'Laravel1Controller@index');
Route::get('data2', 'Laravel2Controller@index');
Route::get('data3', 'Laravel3Controller@index');


Route::get('Barang1', 'Barang1Controller@index');
Route::get('Barang2', 'Barang2Controller@index');

Route::get('Barang3', 'Barang3Controller@index');
Route::get('Barang4', 'Barang4Controller@index');




Route::get('/user', function () {
    return view('user');
});
Route::get('/user1', function () {
    return view('user1');
});
Route::get('/user2', function () {
    return view('user2');
});


Route::get('/gebss/', function () {
    return 'Hello Warga Sanhock';
});
Route::get('/gebss/pubg/', function () {
    return 'Hello Manusia';
});
Route::get('/hello/{nama}', function ($nama) {
    return "Hello $nama";
});
Route::get('/gebss/pubg/panda/{nama}', function ($nama) {
    return "Hello $nama";
});
Route::get('/kelas/nama/{nama}/nim/{nim}', function ($nama,$nim) {
    return "Saya Adalah $nama, Dengan NIM: $nim";
});
