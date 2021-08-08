<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Barang4; 

use Illuminate\Http\Request;

class Barang4Controller extends Controller
{
    public function index(){

        // Untuk Delete
        $brg = Barang4::find(27);
        $brg->delete(); 

        // Untuk Update
        $brg = Barang4::find(27);
        $brg->nama_barang = "Bobo";
        $brg->save(); 

        // Untuk Insert
        $brg = new Barang4;
        $brg->tanggal = '2020-04-05';
        $brg->nama_barang = 'kolor';
        $brg->harga_barang = 50000;
        $brg->jumlah_barang = '3';
        $brg->save(); 

        // Untuk select
        $slide = "Salam Sejahtera Untuk Kita semua..";
        $brg = Barang4::all();
        return view('Barang4', ['korsi' => $brg, 'tampil' => $slide]);
    }
}
