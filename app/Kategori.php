<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_kategori'
    ];

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'id', 'id');
    }
}
