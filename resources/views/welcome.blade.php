@extends('layouts.front')

@section('title','Home')
    
@section('content')
<style>
.cari {
    height: 500px;
    background-image : url("img/gambar_utama.jpg");
    background-attachment : fixed;
    background-size: cover;
    background-position: 0 -100px;
    opacity: 0.7;
}

.cari .tengah{
    margin: 200px auto;
    padding: 10px;
}
</style>
<section id="cari" class="cari">
    <div class="container">
        <div class="row mb-4 pt-5">
            <div class="col">
                <div class="tengah">
                    <form action="/recipe/cari" method="GET">
                    <div class="row justify-content-md-center">
                        <div class="col-md-8 offset-md-1">
                            <input type="text" value="{{ old('cari') }}" id="search_text" name="cari" size="20" class="form-control" placeholder="Masak apa ya hari ini ...">
                        </div>
                        <div class="col-md-2">
                           <button type="submit" class="btn btn-dark" style="width:100px;">Cari</button>
                           {{csrf_field()}}
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="readmore" class="readmore pb-4">
    <div class="container">
        <div class="row mb-4 pt-3">
            <div class="col">
                <ul class="nav justify-content-center h5">
                    <li class="nav-item"><h2>Resep Hari Ini</h2></li>
                </ul>                    
                <div class="row mb-4 pt-3">
                    @if (count($recipes)> 0)
                        @foreach ($recipes as $recipe)
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="img/resep/{{$recipe->foto}}" height="250" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{$recipe->nama_resep}}</h5>
                                    <p class="card-text">Kreasi : {{$recipe->user->nama}}</p>
                                    <a href="{{url('resep',$recipe->slug_nama )}}" class="btn btn-outline-secondary btn-block">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        @endforeach 
                    @else
                        <div class="col-md-12 text-center pt-5">
                            <h2>UPPS :( BELUM ADA RESEP BUAT DIMASAK</h2>
                        </div> 
                    @endif
                </div>
                <br>
                <a href="/readmore">
                    <button type="button" class="btn btn-outline-dark">Lebih Banyak</button><br>
                </a>    
            </div>
        </div>
    </div>
</section>
@endsection