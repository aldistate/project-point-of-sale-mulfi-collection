@extends('layouts.app')

@section('content')
<div class="row mb-5">
  <div class="col-md-12 d-flex justify-content-end">
    <a class="btn btn-primary" href="{{ route('brand.index') }}"><i class="fas fa-arrow-left mr-2"></i> Kembali</a>
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
        {{ Form::open(['route' => 'brand.store', 'method' => 'post', 'id' => 'form']) }}
        <div class="form-group">
          {{ Form::label('nama_brand', 'Nama', ['class' => 'form-label']) }}
          {{ Form::text('nama_brand', null, ['placeholder' => 'masukan nama brand', 'class' => $errors->has('nama_brand') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'nama_brand']) }}
          @error('nama_brand')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
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