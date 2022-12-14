<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{$heading}} - {{ config('app.name')}}</title>

    @vite(['resources/js/app.js'])
</head>
<body>

<div class="p-4 text-bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 col-sm-6 col-xs-12">
                <h4>{{config('app.name')}}</h4>
            </div>
            <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/my-account') }}" class="btn-sm btn btn-primary">Hesabım</a>
                    @else
                        <a href="{{ route('login') }}" class="">Oturum Aç</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="ml-4 ">Kaydol</a>
                        @endif
                    @endauth
                @endif
                    <a href="{{ url('/new-listing') }}" class="btn-sm btn btn-success">Ücretsiz İlan Ver</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid search-box p-2 mb-2 bg-warning">
    <div class="container">
        <div class="row">
            <input class="form-control form-control-lg" type="text" placeholder="İlan ara"
                   aria-label="ilanlarda ara">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 mx-0">
            <p class="">Kategoriler</p>
        </div>
        <div class="col-md-9 col-lg-9 col-sm-6 col-xs-12">
            <div class="p-1 mx-0">
                <h4>{{$heading}} </h4>
            </div>
            <div class="container ">
                @unless(count($listings) == 0)
                    <div class="row" data-masonry='{"percentPosition": true }'>
                        @foreach($listings as $listing)

                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                <div class="card" id="listing-{{$listing['id']}}">
                                    <a href="/listing/{{$listing['id']}}">
                                        <svg class="bd-placeholder-img card-img-top" width="100%" height="180"
                                             xmlns="http://www.w3.org/2000/svg"
                                             role="img" aria-label="Placeholder: Image cap"
                                             preserveAspectRatio="xMidYMid slice"
                                             focusable="false">
                                            <rect width="100%" height="100%" fill="#868e96"></rect>
                                            <text x="0%" y="50%" fill="#dee2e6"
                                                  dy=".2em">{{$listing['title']}}</text>
                                        </svg>
                                    </a>
                                    <a href="/listing/{{$listing['id']}}"><p class="text-white">
                                            <b>{{$listing['price']}}</b>
                                        </p></a>
                                    <a href="/listing/{{$listing['id']}}"><p
                                            class="text-white">{{$listing['title']}}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <h3>Geçerli ilan bulunamadı</h3>
                @endunless
            </div>

        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
</body>
</html>
