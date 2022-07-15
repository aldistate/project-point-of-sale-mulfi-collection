@extends('layouts.app')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title">Ubah Sandi</h3>
          </div>

          <!-- Card-Body -->
          <div class="card-body box-profile">
            {{ Form::open(['route' => 'changePassword.update', 'method' => 'put']) }}
            <div class="form-group row">
              {{ Form::label('inputCurrentPassword', 'Kata Sandi saat ini', ['class' => 'col-sm-2 col-form-label']) }}
              <div class="col-sm-10">
                {{ Form::password('password', ['placeholder' => 'masukan kata sandi sekarang', 'class' => $errors->has('password') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'inputOCurrentPassword']) }}
                @error('password')
                <span class="invalid-feedback" lab="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              {{ Form::label('inputNewPassword', 'Kata Sandi baru', ['class' => 'col-sm-2 col-form-label']) }}
              <div class="col-sm-10">
                {{ Form::password('new-password', ['placeholder' => 'masuk kata sandi baru', 'class' => $errors->has('new-password') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'inputNewPassword']) }}
                @error('new-password')
                <span class="invalid-feedback" lab="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              {{ Form::label('inputNewPasswordConfirmation', 'Ulangi Kata Sandi', ['class' => 'col-sm-2 col-form-label']) }}
              <div class="col-sm-10">
                {{ Form::password('new-password-confirmation', ['placeholder' => 'masuk ulangi kata sandi', 'class' => $errors->has('new-password-confirmation') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'inputNewPasswordConfirmation']) }}
                @error('new-password-confirmation')
                <span class="invalid-feedback" lab="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-sm-2 col-md-2 col-sm-10">
                {{ Form::submit('Ubah', ['class' => 'btn btn-primary']) }}
              </div>
            </div>
            {{ Form::close() }}
          </div>
          <!-- End-Card-Body -->
        </div>
        <!-- End-About-Me-->
      </div>
    </div>
  </div>
</section>
@endsection