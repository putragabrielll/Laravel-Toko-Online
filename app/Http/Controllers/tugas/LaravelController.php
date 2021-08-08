<?php
    namespace App\Http\Controllers;
 
    use Illuminate\Http\Request;
     
    class LaravelController extends Controller
    {
        public function index(){
            $nama = "Gabriel Putra";
            $ket = "OutSide";
            return view('data',['nama' => $nama, 'ket' => $ket]);
        }
    }
?>