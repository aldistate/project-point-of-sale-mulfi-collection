<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'kode_barang', 'nama_barang', 'kategori', 'brand', 'harga', 'jumlah'
    ];
}
