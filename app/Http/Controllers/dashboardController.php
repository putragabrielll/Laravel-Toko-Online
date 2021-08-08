<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Model_barang;
use App\pesanan;
use App\User;
use App\pesanan_detail;
use Auth;
use Alert;
use Carbon\Carbon;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    // yg di bawah jadi klo mau pesan harus login terlebih dahulu walaupun tau alamat url nya
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $detail = Model_barang::where('id', $id)->first();
        return view('user.detail.detail', compact('detail'));
    }

    public function tampil($id)
    {
        $pesan = Model_barang::where('id', $id)->first();
        return view('user.pesan.pesan', compact('pesan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Model_barang::paginate(20);
        return view('user.dashboard', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pesan(Request $request, $id)
    {
        $barang = Model_barang::where('id', $id)->first();
        $tanggal = Carbon::now();
        
        // validasi apakah melebih stok
        if($request->jumlah_pesan > $barang->stok){

            alert()->error('Pesanan Anda Melampaui Batas', 'Ya Ampun!!!');
            return redirect('pesan/'.$id);
        }

        // cek validasi
        $cek_pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        // Simpan ke database pesanan
        if(empty($cek_pesanan)){

            $pesanan = new pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->save();
        }
        

        // Simpan ke database pesanan detail
        $pesanan_baru = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        // cek pesanan detail
        $cek_pesanan_detail = pesanan_detail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail)){

            $pesanan_detail = new pesanan_detail;
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->save();

        }else{
            $pesanan_detail = pesanan_detail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

            // harga sekarnag
            $harga_pesanan_detail_baru = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        // jumlah harga dari keseluruhan dan yg telah ter-update
        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesan;
        $pesanan->update();
        
        alert()->success('Pesanan sudah masuk keranjang', 'Success');
        return redirect('check-out');
        // dd($request);
    }

    public function check_out()
    {
        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        if(!empty($pesanan))
        {
            $pesanan_details = pesanan_detail::where('pesanan_id', $pesanan->id)->get();
            return view('user.pesan.check_out', compact('pesanan', 'pesanan_details'));
        }else{
            return view('user.pesan.check_out');
        }
        
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if(empty($user->alamat)){
            alert()->error('Identitas Harap Dilengkapi', 'Error!!');
            return redirect('profile');
        }
        if(empty($user->no_hp)){
            alert()->error('Identitas Harap Dilengkapi', 'Error!!');
            return redirect('profile');
        }

        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = pesanan_detail::where('pesanan_id', $pesanan_id)->get();
        foreach($pesanan_details as $pesanan_detail){
            $barang = Model_barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok-$pesanan_detail->jumlah;
            $barang->update();
        }

        alert()->success('Pesanan Sukses Check Out & Silahkan Melakukan Proses Pembayaran...', 'Success');
        return redirect('history/'.$pesanan_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan_detail = pesanan_detail::where('id', $id)->first();

        $pesanan = pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();
        alert()->error('Pesanan Sudah Dihapus', 'Hapus!');
        return redirect('check-out');
    }
}
