@extends('layouts.front')

@section('title','Resep Masakan')
    
@section('content')
<style>
section {
    min-height: 560px;
}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<section id="readmore" class="readmore pb-4">
    <div class="container">
        <div class="row mb-4 pt-5">
            <div class="col-md">
            <h2>My Resep</h2>
            </div>
            <div clas="col-md justify-content-end">
                @if ((Auth::user()->role)=="admin")
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/user">Dashboard Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Resep</li>
                        </ol>
                    </nav>                 
                @endif            
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>    
                    </div>
                @endif
                <table>
                    <tr>
                        <td><a href="/recipe/create" class="btn btn-outline-dark">Tambah Resep</a></td>
                        <form action="/recipe/search" method="get">
                            <td width="100%" align="right">
                                <select class="cari form-control" style="width:400px; height:40px;" name="cari"></select> 
                            </td>
                            <td>
                                <button type="submit" class="btn btn-outline-dark"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </td>
                        </form>
                    </tr>
                </table>
                @if ($count > 0)
                <div class="row mb-4">
                    @foreach ($recipes as $recipe)                   
                        <div class="col-md-4 pt-3">
                            <div class="card">
                            <img class="card-img-top" src="{{url('img/resep')}}/{{$recipe->foto}}" height="250" alt="Card image cap">
                                <div class="card-body">
                                    <div class="text-right">
                                        <table align="right">
                                            <tr>
                                                <td>
                                                    <a href="recipe/edit/{{$recipe->kode}}">
                                                        <button type="button" class="btn btn-outline-info">
                                                            <i class="far fa-edit"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="/recipe/{{$recipe->kode}}" method="post"> 
                                                        <button type="submit" name="submit" class="btn btn-outline-danger">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_method" value="DELETE"> 
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <a href="{{url('resep',$recipe->slug_nama )}}">
                                        <h5 class="card-title">{{$recipe->nama_resep}}</h5>
                                    </a>
                                    <p class="card-text">Kreasi : {{$recipe->user->nama}}</p>
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
                        <h3>RESEP MASIH KOSONG</h3><br/>
                        <h3>KAMU BELUM MENULIS RESEP :(</h3>
                    </div>
                </div>
                <br/><br/><br/><br/><br/><br/><br/>
                @endif
            </div>
        </div>
    </div>
</section>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $('.cari').select2({
      placeholder: 'Cari Resep...',
      ajax: {
        url: '/autocomplete',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.nama_resep,
                id: item.nama_resep
              }
            })
          };
        },
        cache: true
      }
    });
</script>
@endsection