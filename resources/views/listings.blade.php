<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{$heading}} - {{ config('app.name')}}</title>

    @vite(['resources/js/app.js'])
</head>
<body>
<h1 class="text-center">Title</h1>
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif

<div class="container-fluid search-box">
    <div class="container">
        <input class="form-control form-control-lg" type="text" placeholder="İlan ara"
               aria-label="ilanlarda ara">
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <p>Kategoriler</p>
        </div>
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
            <h2>{{$heading}} </h2>
            <div class="container-fluid ">
                <div class="row" data-masonry='{"percentPosition": true }'>
                    @foreach($listings as $listing)

                        <div class="col-md-3 col-lg-2 col-sm-6 col-xs-12">

                            <div class="card" id="listing-{{$listing['id']}}">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="180"
                                     xmlns="http://www.w3.org/2000/svg"
                                     role="img" aria-label="Placeholder: Image cap"
                                     preserveAspectRatio="xMidYMid slice"
                                     focusable="false">
                                    <rect width="100%" height="100%" fill="#868e96"></rect>
                                    <text x="0%" y="50%" fill="#dee2e6" dy=".2em">{{$listing['title']}}</text>
                                </svg>
                                <div class="card-body">

                                    <p><b>{{$listing['price']}}</b></p>
                                    <p>{{$listing['title']}}</p>
                                    <a href="/listing/{{$listing['id']}}" class="btn btn-primary">İncele</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
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
