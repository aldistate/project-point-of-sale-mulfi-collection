@extends('layouts.app')

@section('content')
<div class="row mb-5">
  <div class="col-md-12 d-flex justify-content-end">
    <a class="btn btn-primary" href="{{ route('karyawan.index') }}"><i class="fas fa-arrow-left mr-2"></i> Kembali</a>
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
        {{ Form::open(['route' => 'karyawan.store', 'method' => 'post', 'id' => 'form']) }}
        <div class="form-group">
          {{ Form::label('nik', 'NIK', ['class' => 'form-label']) }}
          {{ Form::text('nik', null, ['placeholder' => 'masukan NIK', 'class' => $errors->has('nik') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'nik']) }}
          @error('nik')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="form-group">
          {{ Form::label('name', 'Nama', ['class' => 'form-label']) }}
          {{ Form::text('name', null, ['placeholder' => 'masukan nama karyawan', 'class' => $errors->has('name') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'name']) }}
          @error('name')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="form-group">
          {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
          {{ Form::text('email', null, ['placeholder' => 'masukan email karyawan', 'class' => $errors->has('email') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'email']) }}
          @error('email')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="form-group">
          {{ Form::label('username', 'Username', ['class' => 'form-label']) }}
          {{ Form::text('username', null, ['placeholder' => 'masukan username', 'class' => $errors->has('username') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'username']) }}
          @error('username')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="form-group">
          {{ Form::label('alamat', 'Alamat', ['class' => 'form-label']) }}
          {{   Form::textarea('alamat', null, [
            'class'      => $errors->has('email') ? 'form-control b-left is-invalid' : 'form-control b-left',
            'rows'       => 3, 
            'id'         => 'alamat',
            'placeholder' => 'masukan alamat karyawan'
        ]) }}
          @error('alamat')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="form-group">
          {{ Form::label('password', 'Kata Sandi', ['class' => 'form-label']) }}
          {{ Form::password('password', ['placeholder' => 'input kata sandi karyawan', 'class' => $errors->has('password') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'password']) }}
          <small class="text-muted ml-3">* jika tidak diisi maka kata sandi akan sama dengan username</small>
          @error('password')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="form-group mb-5">
          {{ Form::label('password_confirmation', 'Konfirmasi Kata Sandi', ['class' => 'form-label']) }}
          {{ Form::password('password_confirmation', ['placeholder' => 'konfirmasi kata sandi karyawan', 'class' => $errors->has('password_confirmation') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'password_confirmation']) }}
          @error('password_confirmation')
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