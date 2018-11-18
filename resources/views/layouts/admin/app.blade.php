<!doctype html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.admin.css')
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    @include('layouts.admin.sidebar')
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="{{route('admin.dashboard')}}"><img class="main-logo" src="{{ asset('admin/img/logo/logo.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            @include('layouts.admin.nav')
            @include('layouts.admin.mobile-menu')
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li>
                                                <a href="{{route('admin.dashboard')}}">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li>
                                                @if (active('admin/dashboard'))
                                                    <span class="bread-blod">Users</span>
                                                @elseif(active('admin/users/profile/*'))
                                                    <span class="bread-blod">View Profile</span>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('contents')
        @include('layouts.admin.footer')
    </div>
    @include('layouts.admin.js')
</body>

</html>