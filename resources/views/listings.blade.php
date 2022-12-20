<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{$heading}} - {{ config('app.name')}}</title>

    <style>
        .item {
            cursor: pointer;
            -webkit-backface-visibility: hidden;

        &
        :hover > .overflow > .content-art {
            transform: translateY(0) translateZ(0);
        }

        }

        .overflow {
            overflow: hidden;
            position: relative;
            width: 100%;
            height: 100%;
        }

        .content-art {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.6) 100%);
            color: #fff;
            font-weight: 700 !important;
            text-align: center;
            text-shadow: 0 1px 1px #000;
            padding: 10px 15px;
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: auto;
            z-index: 100;
            -webkit-backface-visibility: hidden;
            transform: translateY(100%) translateZ(0);
            transition: transform 450ms ease-out;
        }

        .nopadding {
            padding: 0 !important;
            margin: 0 !important;
        }

        *,
        *:after,
        *:before {
            box-sizing: border-box;
        }
    </style>
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


            <div class="container-fluid">
                <div id="content" class="row">
                    @unless(count($listings) == 0)
                        @foreach($listings as $listing)
                            <div class="col-md-6 col-lg-4 col-xs-6 item nopadding">
                                <div class="overflow">
                                    <div class="content-art">
                                        <h4>{{$listing['title']}}</h4>
                                    </div>
                                    <img src="{{$listing['picture']}}" alt="{{$listing['title']}}"
                                         class="img-responsive">
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h3>Geçerli ilan bulunamadı</h3>
                    @endunless
                </div>
            </div>


        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.1.0/velocity.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.min.js"></script>

<script>
    $(document).ready(function () {


        $(window).load(function () {
            var $items = $('.item');
            $items.on({
                mousemove: function (e) {
                    var $that = $(this);
                    $that.find('.overflow > img').velocity({
                        translateZ: 0,
                        translateX: Math.floor((e.pageX - $that.offset().left) - ($that.width() / 2)),
                        translateY: Math.floor((e.pageY - $that.offset().top) - ($that.height() / 2)),
                        scale: '2'
                    }, {
                        duration: 400,
                        easing: 'linear',
                        queue: false
                    });
                },
                mouseleave: function () {
                    $(this).find('.overflow > img').velocity({
                        translateZ: 0,
                        translateX: 0,
                        translateY: 0,
                        scale: '1'
                    }, {
                        duration: 1000,
                        easing: 'easeOutSine',
                        queue: false
                    });
                }
            });
        });
    });
</script>
</body>
</html>
