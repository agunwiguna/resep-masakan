<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cobiyan | Data User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
    crossorigin="anonymous">
    <style>
        section {
            min-height: 560px;
        }
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }
    </style>
    <link rel="shortcut icon" href="{{ url('img/favicon.ico') }}">
</head>
<body class="mt-5">

    <div class="preloader">
        <div class="loading">
        <img src="{{ url('img/load.gif') }}" width="80">
            <p>Harap Tunggu :)</p>
        </div>
    </div>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow-sm">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('img/cobiyan.png') }}" width="190" height="48" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto"></ul>
            <span class="navbar-text">
                <ul class="navbar-nav mr-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @else         
                        <li class="nav-item">
                            <a class="nav-link" href="/recipe">{{ Auth::user()->nama }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                @endguest          
                </ul>
            </span>
        </div>
    </nav>

    <section id="user" class="user pb-4">
        <div class="container">
            <div class="row pt-5">
                <div class="col">
                    <h4>Dashboard Admin</h4>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-md-6">
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                        <div class="card-header">Statistik</div>
                        <div class="card-body">
                            <p class="card-text">
                                <table>
                                    <tr>
                                        <td>Jumlah Resep</td>
                                        <td>:&nbsp;<strong>{{count($recipes)}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah User</td>
                                        <td>:&nbsp;<strong>{{count($users)}}</strong></td>
                                    </tr>
                                </table>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/recipe">Data Resep</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col">
                    <a href="#" class="sa-reset">
                        <button type="button" class="btn btn-outline-danger">
                            <i class="fas fa-sync-alt"></i> Reset Data
                        </button>
                    </a>                  
                </div>
            </div>
            <div class="row pt-3">
                <div class="col">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>E-Mail</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no =1;
                            @endphp
                            @foreach ($users as $s)                          
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$s->nama}}</td>
                                <td>{{$s->username}}</td>
                                <td>{{$s->email}}</td>
                                <td>{{$s->role}}</td>
                                <td>
                                    @if (($s->role)=="admin")
                                        <button class="btn btn-outline-danger" disabled>
                                            <i class="far fa-trash-alt"></i>
                                        </button>  
                                    @else
                                        <a href="#" data-id="{{$s->id}}" class="sa-remove">
                                            <button class="btn btn-outline-danger">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </a> 
                                    @endif                                                                  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>E-Mail</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white">
        <div class="container">
            <div class="row pt-3">
                <div class="col text-center">
                    <p>Copyright © Cobiyan 2018</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>   
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
    <script>
    $('.sa-remove').click(function () {
        
        var id = $(this).data('id');
        
        Swal({
            title: 'Apa kamu yakin?',
            text: "Data akan terhapus Permanen!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
        if (result.value) {
            Swal(
                'Terhapus!',
                'Data telah dihapus :(',
                'success'
            );
            window.location.href = "/user/delete/" + id;
        }
        })
        
    });
    $('.sa-reset').click(function () {
        
        Swal({
            title: 'Apa kamu yakin?',
            text: "Data user akan direset Permanen!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Reset!'
        }).then((result) => {
        if (result.value) {
            Swal(
                'Reset!',
                'Data user berhasil direset',
                'success'
            );
            window.location.href = "/allreset";
        }
        })
        
    });   
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    $(document).ready(function () {
        $(".preloader").fadeOut();
    });
    </script>
</body>
</html>