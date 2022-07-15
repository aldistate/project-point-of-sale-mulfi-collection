<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invoice', 'nama_kasir', 'grand_total', 'uang_customer', 'tanggal', 
    ];

    
    public function details()
    {
        return $this->hasMany(DetailCheckout::class, 'id_checkout', 'id');
    }
}
