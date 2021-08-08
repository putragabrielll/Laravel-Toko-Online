<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_barang extends Model
{
    protected $table = "tb_barang";
    protected $fillable = [
        'nama_brg', 
        'keterangan', 
        'kategori', 
        'harga', 
        'stok', 
        'gambar'
    ];

    public function pesanan_detail(){
        return $this->hasMany('App\pesanan_detail', 'barang_id', 'id');
    }
    
}
