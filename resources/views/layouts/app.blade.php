<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="site-domain" content="{{env('APP_URL')}}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->uname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('verification.index')}}">
                                        <i class="fa fa-lg fa-random"></i> Account Verification
                                    </a>
                                    <a class="dropdown-item" href="{{route('profile.edit')}}">
                                        <i class="fa fa-pencil"></i> Edit Profile
                                    </a>
                                    <a class="dropdown-item" href="{{route('bank.cards')}}">
                                        <i class="fa fa-bank"></i> Bank Account &amp; Cards
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @if(active('home'))
    {{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
    <script>
        var $_dollar = 0;
        var $_btc = 0;
        var ngn_price = 0;
        let domain = document.head.querySelector('meta[name="site-domain"]');
        if (domain) {
            window.server = domain.content;
        } else {
            alert('App domain not set!');
        }
        const numberWithCommas = (x) => 
        {
            x = parseFloat(Math.round(x * 100) / 100).toFixed(2);
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        const getBTCDollar = () =>
        {
            let dollar_btc = 0;
            $.getJSON('https://api.coindesk.com/v1/bpi/currentprice.json', function (data) {
                $_btc = data.bpi.USD.rate_float;
                ngn_price = $_btc * $_dollar;
            });
        }

        const getDollarConversion = () =>
        {
            let dollar_rate = 0;
            $.getJSON('https://openexchangerates.org/api/latest.json?app_id=d2f88285655f4e3ea528c38aaf301566', function (data) {
                $_dollar = data.rates.NGN;
                ngn_price = $_btc * $_dollar;
            });
        }
        $(function() {
            setInterval(function() {
                getBTCDollar();
                getDollarConversion();
                ngn_price = $_btc * $_dollar;
                console.log(ngn_price);
                $('#ngn_price').html('Current Price: ' + numberWithCommas(ngn_price) + '/BTC');
            }, 600000);

            // get btc price history
            $.ajax({
                url: server + 'get-btc-history',
                type: 'GET',
                dataType: 'JSON',
                success: function(data) {
                    data = data;
                    Highcharts.stockChart('container', {
                        rangeSelector: {
                            buttons: [{
                                type: 'hour',
                                count: 1,
                                text: '1h'
                            }, {
                                type: 'day',
                                count: 1,
                                text: '1D'
                            }, {
                                type: 'all',
                                count: 1,
                                text: 'All'
                            }],
                            selected: 1,
                            inputEnabled: false
                        },
                        title: {
                            text: 'Bitcoin Price Rates'
                        },
                        series: [{
                            name: 'Naira per Coin',
                            data: data,
                            type: 'area',
                            threshold: null,
                            tooltip: {
                                valueDecimals: 2
                            },
                            fillColor: {
                                linearGradient: {
                                    x1: 0,
                                    y1: 0,
                                    x2: 0,
                                    y2: 1
                                },
                                stops: [
                                    [0, Highcharts.getOptions().colors[0]],
                                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                ]
                            }
                        }]
                    });
                }, 
                fail: function(error) {
                    alert('unable to load bitcoin history. Please reload page.');
                    console.log(error);
                }
            });
        })
    </script> --}}
    @endif
</body>
</html>
