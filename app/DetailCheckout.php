<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailCheckout extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'harga_beli', 'id_checkout', 'kode_barang', 'nama_barang', 'kategori', 'brand', 'harga', 'jumlah', 'diskon' 
    ];

    public function kategori()
    {
        return $this->belongsTo(Checkout::class, 'id_checkout', 'id');
    }
}
