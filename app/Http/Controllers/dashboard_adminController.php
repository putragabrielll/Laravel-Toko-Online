<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Model_barang;

use Illuminate\Http\Request;

class dashboard_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Model_barang::all();
        return view('admin.data_barang', ['barang' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama_brg'   => 'required',
            'keterangan' => 'required',
            'kategori'   => 'required',
            'harga'      => 'required',
            'stok'       => 'required',
            'gambar'     => 'required',
         ]);
         
         $barang = new Model_barang;
         $barang->nama_brg   = $request->nama_brg;
         $barang->keterangan = $request->keterangan;
         $barang->kategori   = $request->kategori;
         $barang->harga      = $request->harga;
         $barang->stok       = $request->stok;
             if($request->hasFile('gambar')){
                 $request->file('gambar')->move('uploads/',$request->file('gambar')->getClientOriginalName());
                 $barang->gambar = $request->file('gambar')->getClientOriginalName();
             }else{
                 echo "Gagal upload gambar";
             }
         $barang->save();
         return redirect('admin/data_barang')->with(['success' => 'Barang Berhasil di Tambahkan']); 
         // dd($request);
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
        $barang = Model_barang::where('id', $id)->first();
        return view('admin.edit', compact('barang'));
        // dd($barang);
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
        $barang = Model_barang::where('id', $id)->first();
        $barang->nama_brg   = $request->nama_brg;
        $barang->keterangan = $request->keterangan;
        $barang->kategori   = $request->kategori;
        $barang->harga      = $request->harga;
        $barang->stok       = $request->stok;
        $barang->update();
        return redirect('admin/data_barang')->with(['success' => 'Barang Berhasil di Update']);
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Model_barang::where('id', $id)->first();
        $barang->delete();
        return redirect('admin/data_barang')->with(['danger' => 'Barang Berhasil di Hapus']);
        // dd('sudah di sini cuyy');
    }
}
