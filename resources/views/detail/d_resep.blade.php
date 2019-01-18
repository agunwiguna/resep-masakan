@extends('layouts.front')

@section('title','Detail Resep Masakan')
    
@section('content')
<style>
section {
    min-height: 420px;
}
</style>
    <div class="jumbotron jumbotron-fluid bg-white pb-1">
        @foreach ($recipes as $recipe)
        <div class="container text-center">
            <img src="{{url('img/resep')}}/{{$recipe->foto}}" class="img-thumbnail" width="35%">
            <h3>{{$recipe->nama_resep}}</h3>
            <p>Kreasi : {{$recipe->user->nama}}</p>
            <p></p>
        </div>
    </div>
    <section id="resep" class="resep bg-light pb-4">
        <div class="container">
            <div class="row mb-4 pt-4">
                <div class="col-md-12">
                    <strong>Bahan-Bahan</strong> <br/>           
                        {!!$recipe->bahan!!}             
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <strong>Langkah-Langkah</strong><br/> 
                    <p>{!!$recipe->langkah!!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <strong>Estimasi Biaya</strong><br/> 
                    <p>{!!$recipe->estimasi!!} </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    {{-- <button type="button" onclick="goBack()" class="btn btn-outline-danger">Kembali</button> --}}
                </div>
            </div>
            <div id="disqus_thread"></div>
            <script>

            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://cobiyan.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
                </section>
                @endforeach
            <script>
            function goBack() {
                window.history.back();
            }
            </script>
            <script id="dsq-count-scr" src="//cobiyan.disqus.com/count.js" async></script>
@endsection