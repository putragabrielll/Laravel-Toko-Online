<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $table = "tb_pesanans";
    protected $fillable = [
        'user_id', 
        'tanggal', 
        'status', 
        'jumlah_harga'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function pesanan_detail(){
        return $this->hasMany('App\pesanan_detail', 'pesanan_id', 'id');
    }
}
