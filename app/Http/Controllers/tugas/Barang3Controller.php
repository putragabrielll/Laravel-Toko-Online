<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Barang3; 

use Illuminate\Http\Request;

class Barang3Controller extends Controller
{
    public function index(){

        // Untuk Delete
        $pengguna = Barang3::find(6);
        $pengguna->delete(); 

        // Untuk Update
        $pengguna = Barang3::find(2);
        $pengguna->username = "Bobo";
        $pengguna->save(); 

        // Untuk Insert
        $pengguna = new Barang3;
        $pengguna->username = 'andi';
        $pengguna->email = 'andi@unai.edu';
        $pengguna->password = 'andi123';
        $pengguna->save(); 

        // Untuk select
        $slide = "Semoga Sukses";
        $guna = Barang3::all();
        return view('Barang3', ['daf' => $guna, 'tampil' => $slide]);
    }
}
