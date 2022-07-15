@extends('layouts.app')

@section('content')
<div class="row mb-5">
  <div class="col-md-12 d-flex justify-content-end">
    <a class="btn btn-primary" href="{{ route('barang.index') }}"><i class="fas fa-arrow-left mr-2"></i> Kembali</a>
  </div>
</div>
<div class="row mb-3">
  <div class="col-md-12">
    <h2>{{ $barang->kode_barang }}</h2>
  </div>
</div>
<div class="row mb-3">
  <div class="col-md-6">
    <img class="img-fluid" src="{{ asset("storage/{$barang->gambar}") }}"
      alt="{{ $barang->nama_barang }}" style="width:100%; heigt:100%; object-fit:cover">
  </div>
  <div class="col-md-6 map">
    <h2>{{ $barang->nama_barang }}</h2>
    <h3>{{ $barang->kategori->nama_kategori }}</h3>
    <h3>{{ $barang->kategori->nama_brand }}</h3>
    <h4>Harga beli : @_currency($barang->harga_beli)</h4>
    <h4>Harga jual : @_currency($barang->harga_jual)</h4>
    <h5>Stock : {{ $barang->stock }}</h5>
    <h5>Diskon : {{ $barang->diskon }}%</h5>
    <h5>Harga Setelah Diskon : @_currency($barang->harga_jual - ($barang->diskon/100 * $barang->harga_jual))</h5>
  </div>
</div>
@endsection