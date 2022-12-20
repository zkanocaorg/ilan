<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{$listing['title']}} - {{ config('app.name')}}</title>

    @vite(['resources/js/app.js'])
</head>
<body class="antialiased">
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

<div class="container">
    <div class="row">
        <h1>{{$listing['title']}}</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-7 text-center">

            <img src="https://via.placeholder.com/480" class="img-fluid">

        </div>
        <div class="col-md-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p><b>İlan Tarihi</b></p>
                        <p>İlan Sahibi</p>
                        <p>İlan Numarası</p>
                    </div>
                    <div class="col">
                        <p>{{$listing['created_timestamp_id']}}</p>
                        <p>{{$listing['user_id']}}</p>
                        <p>{{$listing['id']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p>{{$listing['description']}}</p>
</div>


</body>
</html>
