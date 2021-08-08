<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesanan_detail extends Model
{
    protected $table = "tb_pesanan_details";
    protected $fillable = [
        'barang_id', 
        'pesanan_id', 
        'jumlah', 
        'jumlah_harga'
    ];

    public function model_barang(){
        return $this->belongsTo('App\Model_barang', 'barang_id', 'id');
    }

    public function pesanan(){
        return $this->belongsTo('App\pesanan', 'pesanan_id', 'id');
    }

}
