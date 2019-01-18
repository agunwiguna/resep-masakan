@extends('layouts.front')

@section('title','Register')
    
@section('content')
<style>
.register {
    background-color: #ccc;
}

.register .tengah{
    margin: 150px auto;
    width: 600px;
    height: 350px;
    padding: 30px;
    border: 1px;
    background: #fff;
}
</style>
<section id="register" class="register">
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <div class="tengah">
                    <h4>Register Akun</h4>
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf    
                        <div class="row pt-3">
                            <div class="col">
                                <input type="text" name="nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" value="{{ old('nama') }}" aria-describedby="nama" placeholder="Masukan Nama.." autofocus required>
                                @if ($errors->has('nama'))
                                    <small id="nama" class="form-text text-muted">{{ $errors->first('nama') }}</small>
                                @endif
                            </div>
                            <div class="col">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Masukan Username.." required>
                                @if ($errors->has('username'))
                                    <small id="nama" class="form-text text-muted">{{ $errors->first('username') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Masukan E-Mail.." required>
                                @if ($errors->has('email'))
                                    <small id="nama" class="form-text text-muted">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Masukan Password.." required>
                                @if ($errors->has('password'))
                                    <small id="nama" class="form-text text-muted">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                            <div class="col">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password.." required>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-outline-dark">{{ __('Register') }}</button>
                            </div>
                        </div>          
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection