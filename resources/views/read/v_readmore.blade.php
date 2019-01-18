@extends('layouts.front')

@section('title','Resep Masakan')
    
@section('content')
<style>
section {
    min-height: 420px;
}
</style>
<section id="readmore" class="readmore pb-4">
    <div class="container">
        <div class="row mb-4 pt-5">
            <div class="col">
                <h2>Resep Masakan</h2>
                <br>
                @if (count($recipes)>0)
                <div class="row mb-4">
                    @foreach ($recipes as $recipe) 
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="{{url('img/resep')}}/{{$recipe->foto}}" height="250" alt="Card image cap">
                            <div class="card-body">
                                    <h5 class="card-title">{{$recipe->nama_resep}}</h5>
                                <p class="card-text">Kreasi :  {{$recipe->user->nama}}</p>
                                <a href="{{url('resep',$recipe->slug_nama )}}" class="btn btn-outline-dark" style="width: 300px;">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col text-right">
                        {{$recipes->links()}}
                    </div>
                </div>
                @else    
                <div class="row pt-5 mb-5">
                    <div class="col-md text-center">
                        <h3>UPPS :( BELUM ADA RESEP BUAT DIMASAK</h3><br/>
                        <button type="button" onclick="goBack()" class="btn btn-outline-danger">Kembali</button>
                    </div>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                @endif
            </div>
        </div>
    </div>
</section>
<script>
function goBack() {
    window.history.back();
}
</script>
@endsection