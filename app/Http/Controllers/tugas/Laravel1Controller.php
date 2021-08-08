<?php
    namespace App\Http\Controllers;
 
    use Illuminate\Http\Request;
     
    class Laravel1Controller extends Controller
    {
        public function index(){
            $nama = "Gabriel Putra.A.Y.S";
            $nim = "1881020";
            $pelajaran = ["Web2","Android"];
    	    return view('data1',['nama' => $nama, 'nim' => $nim, 'matkul' => $pelajaran]);
        }
    }
?>