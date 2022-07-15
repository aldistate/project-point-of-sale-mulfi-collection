<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'id', 'id_kategori', 'id_brand', 'kode_barang', 'nama_barang', 'harga_beli', 'harga_jual', 'diskon', 'gambar', 'stock'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand', 'id');
    }
}
