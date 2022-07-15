@extends('layouts.app')

@section('content')
<div class="row mb-5">
  <div class="col-md-12 d-flex justify-content-end">
    <a class="btn btn-primary" href="{{ route('barang.index') }}"><i class="fas fa-arrow-left mr-2"></i> Kembali</a>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class=" card shadow mb-4">
      <div class="card-header py-3 d-flex align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Form {{ $title }}</h6>
      </div>

      <!-- Card-Body -->
      <div class="card-body box-profile">
        {{ Form::open(['route' => 'barang.store', 'method' => 'post', 'id' => 'form', 'files' => true]) }}
        <div class="form-group">
          {{ Form::label('kode_barang', 'Kode Barang', ['class' => 'form-label']) }}
          {{ Form::text('kode_barang', null, ['placeholder' => 'masukan kode barang', 'class' => $errors->has('kode_barang') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'kode_barang']) }}
          @error('kode_barang')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="form-group">
          {{ Form::label('nama_barang', 'Nama Barang', ['class' => 'form-label']) }}
          {{ Form::text('nama_barang', null, ['placeholder' => 'masukan nama barang', 'class' => $errors->has('nama_barang') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'nama_barang']) }}
          @error('nama_barang')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="form-group">
          <label for="gambar">Gambar Barang</label>
          <input type="file" name="gambar" id="gambar" class="form-control h-100 @error('gambar') is-invalid @enderror">
          @error('gambar')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="form-group">
          {{ Form::label('stock', 'Stock', ['class' => 'form-label']) }}
          {{ Form::text('stock', null, ['placeholder' => 'masukan stock barang', 'class' => $errors->has('stock') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'stock']) }}
          @error('stock')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              {{ Form::label('kategori', 'Kategori', ['class' => 'col-form-label']) }}
              {{ Form::select('id_kategori', $kategori, null, ['placeholder' => 'Pilih Kategori', 'class' => $errors->has('id_kategori') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'kategori']) }}
              @error('id_kategori')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="col-md-6">
              {{ Form::label('brand', 'Brand', ['class' => 'col-form-label']) }}
              {{ Form::select('id_brand', $brand, null, ['placeholder' => 'Pilih Brand', 'class' => $errors->has('id_brand') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'brand']) }}
              @error('id_brand')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('harga_beli', 'Harga Beli', ['class' => 'form-label']) }}
          {{ Form::text('harga_beli', null, ['placeholder' => 'masukan harga beli', 'class' => $errors->has('harga_beli') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'harga_beli']) }}
          @error('harga_beli')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="form-group">
          {{ Form::label('harga_jual', 'Harga Jual', ['class' => 'form-label']) }}
          {{ Form::text('harga_jual', null, ['placeholder' => 'masukan harga jual', 'class' => $errors->has('harga_jual') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'harga_jual']) }}
          @error('harga_jual')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="form-group">
          {{ Form::label('diskon', 'Diskon', ['class' => 'form-label']) }}
          {{ Form::text('diskon', 0, ['placeholder' => 'masukan diskon', 'class' => $errors->has('diskon') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'diskon']) }}
        </div>
        <div class="form-group row justify-content-end">
          <div class="col-md-12">
            {{ Form::button('Simpan', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'save']) }}
          </div>
        </div>
      </div>
      {{ Form::close() }}
    </div>
    <!-- End-Card-Body -->
  </div>
  <!-- End-About-Me-->
</div>
@endsection