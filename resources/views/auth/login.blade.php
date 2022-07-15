@extends('layouts.auth')

@section('content')
<div class="row justify-content-center align-items-center" style="height: 100vh;">

    <div class="col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            {{ Form::open(['route' => 'login', 'method' => 'post', 'class mb-2' => 'user']) }}
                            <div class="form-group">
                                {{ Form::text('email', null, ['placeholder' => 'nama pengguna', 'class' => $errors->has('email') ? 'form-control b-left is-invalid' : 'form-control b-left', 'autocomplete'=>'email' , 'autofocus'=>'autofocus']) }}
                                @error('email')
                                <span class="invalid-feedback mt-3" lab="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{ Form::password('password', ['placeholder' => 'kata sandi', 'class' => $errors->has('password') ? 'form-control b-left is-invalid' : 'form-control b-left', 'autocomplete'=>'current-password']) }}
                                @error('password')
                                <span class="invalid-feedback mt-3" lab="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Masuk
                            </button>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection