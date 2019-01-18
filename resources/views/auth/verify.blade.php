@extends('layouts.front')

@section('title','Verifikasi E-Mail')

@section('content')
<style>
section {
    min-height: 560px;
}
</style>
<section>
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verivikasi Alamat Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tautan Link verifikasi email telah dikirim ke email anda.') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan, silahkan periksa email anda untuk cek tautan verifikasi.') }}
                    {{ __('Jika kamu tidak menerima email') }}, <a href="{{ route('verification.resend') }}">{{ __('klik disini untuk mengirim ulang') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
