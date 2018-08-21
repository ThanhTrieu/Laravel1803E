<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Demo CSS</title>
    <link rel="stylesheet" href=" {{ asset('css/bootstrap.css') }}">
    <script type="text/javascript" src=" {{ asset('js/jquery-3.3.1.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
    </script>
</head>
<body>
    <div class="container-fluid">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Shopping Manly</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#"> @lang('commonlang.home') <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">@lang('commonlang.about')</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">@lang('commonlang.contact')</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">gio hang {{ count(Cart::content()) }}</a>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link"> | </span>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('language',['lang'=>'en']) }}">English</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('language',['lang'=>'vi']) }}">Vietnamese</a>
                  </li>
                </ul>
                </div>
            </div>
        </nav>
        <!-- ./ navbar -->
        <!-- content -->
        <div class="row" style="margin-top: 80px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <h3>@lang('commonlang.categories')</h3>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="#">Thoi nam cong so</a></li>
                            <li class="list-group-item">Thoi nu cong so</li>
                            <li class="list-group-item">Thoi trang cho be</li>
                            <li class="list-group-item">Thoi trang dao pho</li>
                            <li class="list-group-item">Thoi trang thu dong</li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                           <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="http://placehold.it/900x350" alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="http://placehold.it/900x350" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="http://placehold.it/900x350" alt="Third slide">
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="row" style="min-width: 100%;">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- ./ content -->
    </div>
    <!-- footer -->
    <footer class="bg-dark mt-3 py-5 text-center text-white">
        <h4>This is footer</h4>
    </footer>
    <!-- ./footer -->
</body>
</html>