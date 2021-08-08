<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Barang2Controller extends Controller
{
    public function index(){
        $slide = "Wahai Corona...";

        // Untuk Update
        $affected = DB::table('penggunas')
              ->where('id', 1)
              ->update(['email' => 'cekol@gmail.com']);


        // Untuk Insert
        DB::table('penggunas')->insert([
            'username' => 'Gebss',
            'email' => 'takaya@gmail.com',
            'password' => 'anticorona', 
        ]);

        // Untuk Delete
        DB::table('penggunas')->delete(['id' => 1]);

        // Untuk Select
        $guna = DB::table('penggunas')->get();
        return view('Barang2',['pengguna' => $guna, 'tampil' => $slide]);
    }
}
