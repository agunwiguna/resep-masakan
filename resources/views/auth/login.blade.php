@extends('layouts.front')

@section('title','Login')
    
@section('content')
<style>
.login {
    background-color: #ccc;
}

.login .tengah{
    margin: 100px auto;
    width: 600px;
    height: 400px;
    padding: 15px;
    border: 1px;
    background: #fff;
}
</style>
<section id="login" class="login">
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <div class="tengah">
                    <div class="row justify-content-md-center">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf    
                                <img class="rounded mx-auto d-block" src="img/login.png" width="150" height=150 alt="">
                                <div class="row pt-2">
                                    <div class="col">
                                        <input id="text" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus><br>
                                        @if ($errors->has('username'))
                                            <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-dark btn-block">Login</button>
                                    </div>
                                </div>
                                <a class="nav-link active text-center" href="{{ route('password.request') }}">Lupa Password?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection