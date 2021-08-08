<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Model_barang;
use App\pesanan;
use App\User;
use App\pesanan_detail;
use Auth;
use Alert;

use Illuminate\Http\Request;

class historyController extends Controller
{
    // yg di bawah jadi klo mau pesan harus login terlebih dahulu walaupun tau alamat url nya
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $pesanans = pesanan::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

        return view('user.history.index', compact('pesanans'));
    }

    public function detail($id)
    {
        $pesanan = pesanan::where('id',$id)->first();
        $pesanan_details = pesanan_detail::where('pesanan_id', $pesanan->id)->get();

        return view('user.history.detail', compact('pesanan', 'pesanan_details'));
    }
}
