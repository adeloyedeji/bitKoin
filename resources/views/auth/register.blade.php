<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{env('APP_NAME')}} | Register</title>
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
						<a class="site-logo" href="index.html">
							<img class="img-responsive" width="175" height="42" src="{{ asset('welcome/img/site_logo_2.png') }}" alt="demo">
						</a>

                        <form class="authorization__form"  method="POST" action="{{ route('register') }}">
                            @csrf
							<h3 class="__title">Sign Up</h3>

							<div class="input-wrp">
                                <input class="textfield{{ $errors->has('uname') ? ' is-invalid' : '' }}" type="text" value="{{old('uname')}}" placeholder="User name" name="uname" id="uname" required autofocus>
                                @if ($errors->has('uname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style='color:red'>{{ $errors->first('uname') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="input-wrp">
                                <input class="textfield{{ $errors->has('fname') ? ' is-invalid' : '' }}" type="text" value="{{old('fname')}}" placeholder="First name" name="fname" id="fname" required>
                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style='color:red'>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="input-wrp">
                                <input class="textfield{{ $errors->has('lname') ? ' is-invalid' : '' }}" type="text" value="{{old('lname')}}" placeholder="Last name" name="lname" id="lname" required>
                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style='color:red'>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="input-wrp">
                                <div class="row">
                                    <div class="col col--md-4">
                                        <select name="year" id="year" class="textfield">
                                            @for($i = 1900; $i <= date('Y'); $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                        @if ($errors->has('year'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('year') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col col--md-4">
                                        <select class="textfield" id="month" name="month">
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        @if ($errors->has('month'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('month') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col col--md-4">
                                        <select name="day" id="day" class="textfield">
                                            @for($i = 1; $i<= 31; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                        @if ($errors->has('day'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('day') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
							</div>

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

							<div class="input-wrp">
								<i class="textfield-ico fontello-eye"></i>
                                <input class="textfield" type="password" value="" placeholder="Confirm Password" name="password_confirmation" id="password-confirm" required>
                            </div>

                            <p>
                                <label class="checkbox">
                                    <input name="p1" type="checkbox" value="ok" required {{ old('agree') ? 'checked' : '' }}>
                                    <i class="fontello-check"></i><span>I agree with <a href="#">Terms of Services</a></span>
                                </label>

                                <button class="custom-btn custom-btn--medium custom-btn--style-2 wide" type="submit" role="button">Submit</button>
                            </p>

							<p>
                                <a href="{{route('login')}}">Sign In</a> if you already have an account
                            </p>
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
