@extends('layouts.front')

@section('title','Tambah Resep Masakan')
    
@section('content')
<section>   
    <div class="container">
        <div class="row">
            <div class="col text"><br><br>
                <h4>Tambah Resep</h4>
            </div>
        </div>
        <form action="/recipe" method="POST" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" value="{{ Auth::user()->id }}" name="id">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nama_resep" value="{{ old('nama_resep') }}" placeholder="Masukkan nama resep" required>
                </div>
                <div class="col-md-6">
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                     </div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col">
                    <textarea class="form-control" id="editor1" name="bahan" rows="3" placeholder="Masukan bahan-bahan resep kamu disini.." style="height: 200px;">Masukan bahan-bahan resep kamu disini..</textarea>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col">
                    <textarea cols="80" id="editor2" class="form-control" name="langkah" placeholder="Masukan langkah-langkah resep kamu disini.." style="height: 200px;" rows="3" required>Masukan langkah-langkah resep kamu disini..</textarea>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col">
                    <input type="text" class="form-control" name="estimasi" value="{{ old('estimasi') }}" placeholder="Masukkan estimasi biaya resep kamu disini" required>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col">
                    <button type="button" onclick="goBack()" class="btn btn-outline-danger">Batal</button>
                    <button type="submit" class="btn btn-outline-dark">Simpan</button>
                    {{csrf_field()}}
                </div>
            </div>
        </form>
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