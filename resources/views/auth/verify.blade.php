<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{env('APP_NAME')}} | Verify E-mail</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta name="viewport" content="user-scalable=no, width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui" />

        <meta name="theme-color" content="#3F6EBF" />
        <meta name="msapplication-navbutton-color" content="#3F6EBF" />
        <meta name="apple-mobile-web-app-status-bar-style" content="#3F6EBF" />

        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="{{ asset('welcome/img/favicon.html') }}">
        <link rel="apple-touch-icon" href="{{ asset('welcome/img/apple-touch-icon.html') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('welcome/img/apple-touch-icon-72x72.html') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('welcome/img/apple-touch-icon-114x114.html') }}">

        <!-- CSS
        ================================================== -->
        <link rel="stylesheet" href="{{ asset('welcome/css/style.min.css') }}" type="text/css">

        <!-- Load google font
        ================================================== -->
        <script type="text/javascript">
            WebFontConfig = {
                google: { families: [ 'Open+Sans:300,400,500','Lato:900', 'Poppins:400', 'Catamaran:300,400,500,600,700'] }
            };
            (function() {
                var wf = document.createElement('script');
                wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + 
                '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
                wf.type = 'text/javascript';
                wf.async = 'true';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(wf, s);
            })();
        </script>

        <!-- Load other scripts
        ================================================== -->
        <script type="text/javascript">
            var _html = document.documentElement,
                isTouch = (('ontouchstart' in _html) || (navigator.msMaxTouchPoints > 0) || (navigator.maxTouchPoints));

            _html.className = _html.className.replace("no-js","js");

            isTouch ? _html.classList.add("touch") : _html.classList.add("no-touch");
        </script>
        <script type="text/javascript" src="{{ asset('welcome/js/device.min.js') }}"></script>
    </head>

	<body>
		<!-- start main -->
		<main role="main">
			<!-- start section -->
			<section class="section section--no-pt section--no-pb section--light-bg">
				<div class="grid grid--container">
					<div class="authorization authorization--login">
						<a class="site-logo" href="{{url('/')}}">
							<img class="img-responsive" width="175" height="42" src="{{ asset('welcome/img/site_logo_2.png') }}" alt="demo">
                        </a>
                        
                        <h2 class="__title">You need to verify Your Email Address</h2>
					</div>
				</div>
			</section>
            <!-- end section -->
            @if (session('resent'))
            <!-- start section -->
            <section class="section section--light-blue-bg section--custom-15">
                <style type="text/css">
                    .section--custom-15
                    {
                        background-image: url("{{ asset('welcome/img/sectoin_bg_2.png') }}");
                        background-position: 50% 50%;
                        background-repeat: no-repeat;
                    }
                </style>

                <div class="grid grid--container">
                    <div class="row row--xs-middle row--xs-center  text--center">
                        <div class="col col--lg-auto">
                            <h2>{{ __('A new verification link has been sent to your email address.') }}</h2>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end section -->
            @endif
		</main>
		<!-- end main -->

		<div id="btn-to-top-wrap">
			<a id="btn-to-top" class="circled" href="javascript:void(0);" data-visible-offset="800"></a>
		</div>

		<script src="{{ asset('welcome/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('welcome/js/main.min.js') }}"></script>
	</body>
</html>