<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Barang1Controller extends Controller
{
    public function index(){
        $slide = "Selamat datang pada website saya";

        // Untuk Update
        $affected = DB::table('penjualans')
              ->where('id', 1)
              ->update(['jumlah_barang' => 10]);


        // Untuk Insert
        DB::table('penjualans')->insert([
            'tanggal' => '2012-06-01',
            'nama_barang' => 'Tamiya',
            'harga_barang' => 25000, 
            'jumlah_barang' => '60'
        ]);

        // Untuk Delete
        DB::table('penjualans')->delete(['id' => 24]);

        // Untuk Select
        $Barang1 = DB::table('penjualans')->get();
        return view('Barang1',['barang1' => $Barang1, 'tampil' => $slide]);
    }
}
