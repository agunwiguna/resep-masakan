@extends('layouts.front')

@section('title','Resep Masakan')
    
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col text"><br><br>
                <h4>Ubah Resep</h4>
            </div>
        </div>
        @foreach ($recipes as $recipe)
        <form action="/recipe/{{ $recipe->kode }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" value="{{ Auth::user()->id }}" name="id">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nama_resep"  value="{{ $recipe->nama_resep }}" placeholder="Masukkan nama resep" required>
                </div>
                <div class="col-md-6">
                    <input type="file" name="foto" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Unggah File</label>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col">
                    <textarea cols="80" id="editor1" name="bahan" rows="10" required>{{ $recipe->bahan }}</textarea>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col">
                    <textarea cols="80" id="editor2" name="langkah" rows="10" required>{{ $recipe->langkah }}</textarea>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col">
                    <input type="text" class="form-control" name="estimasi" value="{{ $recipe->estimasi }}" placeholder="Masukkan estimasi biaya resep kamu disini" required>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col">
                    <button type="button" onclick="goBack()" class="btn btn-outline-danger">Batal</button>
                    <button type="submit" class="btn btn-outline-dark">Ubah</button>
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                </div>
            </div>
        </form>
        @endforeach
    </div>
    <br>
</section>
<script src="https://cdn.ckeditor.com/4.11.1/standard-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1', {
        width: '100%',
        height: 250
    });
    CKEDITOR.replace('editor2', {
        width: '100%',
        height: 250
    });
    CKEDITOR.replace('editor3', {
        width: '100%',
        height: 250
    });
</script>
<script>
    function goBack(){
        window.history.back();
    }
</script>
@endsection