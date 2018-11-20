<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{env('APP_NAME')}} | Sign In</title>
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

                        <form class="authorization__form"  method="POST" action="{{ route('login') }}">
                            @csrf
							<h3 class="__title">Sign In</h3>

							<div class="input-wrp">
                                <input class="textfield{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" value="{{old('email')}}" placeholder="Email" name="email" id="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style='color:red'>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="input-wrp">
								<i class="textfield-ico fontello-eye"></i>
                                <input class="textfield{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" value="" placeholder="Password" name="password" id="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p>
                                <label class="checkbox">
                                    <input name="remember" id="remember" type="checkbox" value="ok"  {{ old('remember') ? 'checked' : '' }} />
                                    <i class="fontello-check"></i><span>Remember me</span>
                                </label>

                                <button class="custom-btn custom-btn--medium custom-btn--style-2 wide" type="submit" role="button">Submit</button>
                            </p>

							<p>
								<a href="{{ route('password.request') }}">I forgot my password</a>
							</p>

							<p><a href="{{route('register')}}">Sign Up</a> if you don’t have an account</p>
						</form>
					</div>
				</div>
			</section>
			<!-- end section -->
		</main>
		<!-- end main -->

		<div id="btn-to-top-wrap">
			<a id="btn-to-top" class="circled" href="javascript:void(0);" data-visible-offset="800"></a>
		</div>

		<script src="{{ asset('welcome/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('welcome/js/main.min.js') }}"></script>
	</body>
</html>