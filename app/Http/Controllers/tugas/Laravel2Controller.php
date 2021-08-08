<?php
    namespace App\Http\Controllers;
 
    use Illuminate\Http\Request;
     
    class Laravel2Controller extends Controller
    {
        public function index(){
    	    return view('data2');
        }
    }
?>