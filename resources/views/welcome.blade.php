<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
		<title>{{env('APP_NAME')}}</title>
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
		<!-- start header -->
		<header id="top-bar" class="top-bar--light">
			<div id="top-bar__inner">
				<a id="top-bar__logo" class="site-logo" href="{{url('/')}}">
					<img class="img-responsive" width="175" height="42" src="{{ asset('welcome/img/site_logo.png') }}" alt="demo" />
					<img class="img-responsive" width="175" height="42" src="{{ asset('welcome/img/site_logo_2.png') }}" alt="demo" />
				</a>

				<a id="top-bar__navigation-toggler" href="javascript:void(0);"><span></span></a>

				<div id="top-bar__navigation-wrap">
					<div>
						<br class="hide--lg">
						<ul id="top-bar__subnavigation">
							<li><a class="custom-btn custom-btn--small custom-btn--style-3" href="{{route('login')}}">Login</a></li>
							<li><a href="{{route('register')}}">Sign up</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- end header -->

		<!-- start intro -->
		<div id="intro" class="jarallax" data-speed="0.5" style="background-image: url({{ asset('welcome/img/intro_img/1.jpg') }});">
			<div class="grid grid--container">
				<div class="row row--xs-middle">
					<div class="col col--lg-5 text--center">
						<h1 class="__title">{{env('APP_NAME')}}</h1>
                        <p>{{env('APP_NAME')}} is the world’s most popular, fastest and secure way to buy and sell bitcoin in africa.</p>
                        <div class="text--center">
                            <a class="custom-btn custom-btn--medium custom-btn--style-1" href="#">Buy or Sell Now</a>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<!-- end intro -->

		<!-- start main -->
		<main role="main">
			<!-- start section -->
			<section class="section section--no-pb">
				<div class="grid grid--container">
					<div class="row row--xs-middle">
						<div class="col col--md-9 col--lg-8">
							<form class="form--horizontal" action="#">
								<div class="b-table">
									<div class="cell v-middle">
										<div class="input-wrp">
											<input class="textfield" type="text" value="" placeholder="How much do you want to buy?" />
										</div>
									</div>

									<div class="cell v-middle">
										<button class="custom-btn custom-btn--medium custom-btn--style-2" type="submit" role="button">Search</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- end section -->

			<!-- start section -->
			<section class="section">
				<div class="grid grid--container">
					<div class="section-heading section-heading--center  col-MB-60">
						<h2 class="__title">Popular Questions</h2>
					</div>

					<div class="row row--xs-middle">
						<div class="col col--md-10">
							<!-- start FAQ -->
							<div class="faq">
								<div class="accordion-container">
									<!-- start item -->
									<div class="accordion-item">
										<div class="accordion-toggler">
											<h4 class="__title h5">What is Bitcoin?</h4>

											<i class="circled"></i>
										</div>

										<article>
											<div class="__inner">
                                                <p>
                                                    Bitcoin is a consensus network that enables a new payment system and a completely digital money. It is the first decentralized peer-to-peer payment network that is powered by its users with no central authority or middlemen. From a user perspective, Bitcoin is pretty much like cash for the Internet. Bitcoin can also be seen as the most prominent triple entry bookkeeping system in existence.
                                                </p>
											</div>
										</article>
									</div>
									<!-- end item -->

									<!-- start item -->
									<div class="accordion-item">
										<div class="accordion-toggler">
											<h4 class="__title h5">How does Bitcoin Works?</h4>

											<i class="circled"></i>
										</div>

										<article>
											<div class="__inner">
												<p>
                                                    From a user perspective, Bitcoin is nothing more than a mobile app or computer program that provides a personal Bitcoin wallet and allows a user to send and receive bitcoins with them. This is how Bitcoin works for most users.                                 
                                                </p>
                                                <p>
                                                    Behind the scenes, the Bitcoin network is sharing a public ledger called the "block chain". This ledger contains every transaction ever processed, allowing a user's computer to verify the validity of each transaction. The authenticity of each transaction is protected by digital signatures corresponding to the sending addresses, allowing all users to have full control over sending bitcoins from their own Bitcoin addresses. In addition, anyone can process transactions using the computing power of specialized hardware and earn a reward in bitcoins for this service. This is often called "mining". To learn more about Bitcoin, you can consult the <a target="_blank" href="https://bitcoin.org/en/how-it-works">dedicated page</a> and the <a target="_blank" href="https://bitcoin.org/en/bitcoin-paper">original paper</a>.
                                                </p>
											</div>
										</article>
									</div>
									<!-- end item -->

									<!-- start item -->
									<div class="accordion-item">
										<div class="accordion-toggler">
											<h4 class="__title h5">Are people really using Bitcoins?</h4>

											<i class="circled"></i>
										</div>

										<article>
											<div class="__inner">
												<p>
                                                    Yes. There are a <a target="_blank" href="https://bitcoin.org/en/spend-bitcoin">growing number of businesses</a> and individuals using Bitcoin. This includes brick-and-mortar businesses like restaurants, apartments, and law firms, as well as popular online services such as Namecheap, Overstock.com, and Reddit. While Bitcoin remains a relatively new phenomenon, it is growing fast. As of May 2018, the <a target="_blank" href="https://bitcoincharts.com/bitcoin/">total value of all existing bitcoins</a> exceeded 100 billion US dollars, with millions of dollars worth of bitcoins exchanged daily.
                                                </p>
											</div>
										</article>
									</div>
									<!-- end item -->

									<!-- start item -->
									<div class="accordion-item">
										<div class="accordion-toggler">
											<h4 class="__title h5">How does {{env('APP_NAME')}} fit into all of these?</h4>

											<i class="circled"></i>
										</div>

										<article>
											<div class="__inner">
												<p>
                                                    Due to the increading demand for Bitcoin, hackers and fradulent people all over the globe have come up with creative ways of defrauding and scamming people of the money and crypto currencies. We provide a neutral and secured platform for people like you to securely store and trade your coins without fear of being scammed.
												</p>

												<p>
                                                    <b>Beware!</b> there are lots of scammers out there whose sole aim is to rip off your properties, you need a safe, reliable and fast way to transact and make money without limits. That's how we fit in.
												</p>
											</div>
										</article>
									</div>
									<!-- end item -->

									<!-- start item -->
									<div class="accordion-item">
										<div class="accordion-toggler">
											<h4 class="__title h5">What then is our Profit?</h4>

											<i class="circled"></i>
										</div>

										<article>
											<div class="__inner">
												<p>
                                                    We try as much as possible to provide a reliable service almost as free as possible. Hence, we only request 0.3% of your transactions on our platform. This helps us to maintain this platform for your benefit without having to compromise on our security standards.
												</p>
											</div>
										</article>
									</div>
									<!-- end item -->
								</div>
							</div>
							<!-- end FAQ -->
						</div>
					</div>
				</div>
			</section>
			<!-- end section -->

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
							<h2>Sell and buy as much as you want. No limits...</h2>
						</div>

						<div class="col col--lg-auto">
							<br class="hide--lg">
							<a class="custom-btn custom-btn--medium custom-btn--style-2" href="#">Post a Trade</a>
						</div>
					</div>
				</div>
			</section>
			<!-- end section -->

			<!-- start section -->
			<section class="section">
				<div class="grid grid--container">
					<div class="section-heading section-heading--center  col-MB-60">
						{{-- <h5 class="__subtitle">MEET THE PRODUCT</h5> --}}

						<h2 class="__title">Secure, fast and easy to use interface. No complications!</h2>
					</div>

					<!-- start feature -->
					<div class="feature feature--style-2  text--center text--sm-left">
						<div class="__inner">
							<div class="row">
								<!-- start item -->
								<div class="col col--sm-6 col--lg-4">
									<div class="__item" data-aos="fade" data-aos-delay="100" data-aos-offset="100">
										<div class="__content">
											<i class="__ico">
												<img class="img-responsive lazy" src="{{ asset('welcome/img/blank.gif') }}" data-src="{{ asset('welcome/img/feature_img/1_1.png') }}" width="34" height="60" alt="demo" />
											</i>

											<h3 class="__title">Secure Transactions</h3>

                                            <p>All transactions are secured and properly verified through our state of the art security mechanisms to deliver a reliable service any time, any where</p>
										</div>
									</div>
								</div>
								<!-- end item -->

								<!-- start item -->
								<div class="col col--sm-6 col--lg-4">
									<div class="__item" data-aos="fade" data-aos-delay="150" data-aos-offset="100">
										<div class="__content">
											<i class="__ico">
												<img class="img-responsive lazy" src="{{ asset('welcome/img/blank.gif') }}" data-src="{{ asset('welcome/img/feature_img/2_1.png') }}" width="46" height="60" alt="demo" />
											</i>

											<h3 class="__title">Easy to use</h3>

                                            <p>Our portal is easy to use even if you are not used to online trading, we provide a flexible and user friendly experience for maximum satisfaction.</p>
										</div>
									</div>
								</div>
								<!-- end item -->

								<!-- start item -->
								<div class="col col--sm-6 col--lg-4">
									<div class="__item" data-aos="fade" data-aos-delay="200" data-aos-offset="100">
										<div class="__content">
											<i class="__ico">
												<img class="img-responsive lazy" src="{{ asset('welcome/img/blank.gif') }}" data-src="{{ asset('welcome/img/feature_img/3_1.png') }}" width="46" height="60" alt="demo" />
											</i>

											<h3 class="__title">Up-to-date Information</h3>

                                            <p>The world of crypto currency is always changing and we have learnt to flow with the tide to bring you accurate and globally acceptable information at all times.</p>
										</div>
									</div>
								</div>
								<!-- end item -->

								<!-- start item -->
								<div class="col col--sm-6 col--lg-4">
									<div class="__item" data-aos="fade" data-aos-delay="250" data-aos-offset="100">
										<div class="__content">
											<i class="__ico">
												<img class="img-responsive lazy" src="{{ asset('welcome/img/blank.gif') }}" data-src="{{ asset('welcome/img/feature_img/4_1.png') }}" width="60" height="60" alt="demo" />
											</i>

											<h3 class="__title">Monitoring and Tracking</h3>

                                            <p>Still in doubt? track and monitor your trade with our flexible and easy to use portal. We maintain a user only log for you to monitor and track your activies on our portal.</p>
										</div>
									</div>
								</div>
								<!-- end item -->

								<!-- start item -->
								<div class="col col--sm-6 col--lg-4">
									<div class="__item" data-aos="fade" data-aos-delay="300" data-aos-offset="100">
										<div class="__content">
											<i class="__ico">
												<img class="img-responsive lazy" src="{{ asset('welcome/img/blank.gif') }}" data-src="{{ asset('welcome/img/feature_img/5_1.png') }}" width="68" height="51" alt="demo" />
											</i>

											<h3 class="__title">Credit Card Use</h3>

                                            <p>We accept master card, visa etc. Pay with your local card through Paystack's fast and secure payment gateways.</p>
										</div>
									</div>
								</div>
								<!-- end item -->

								<!-- start item -->
								<div class="col col--sm-6 col--lg-4">
									<div class="__item" data-aos="fade" data-aos-delay="350" data-aos-offset="100">
										<div class="__content">
											<i class="__ico">
												<img class="img-responsive lazy" src="{{ asset('welcome/img/blank.gif') }}" data-src="{{ asset('welcome/img/feature_img/6_1.png') }}" width="64" height="46" alt="demo" />
											</i>

											<h3 class="__title">No Spam</h3>

                                            <p>We do not spam you. We only provide credible information as need be and keep you informed of latest updates in the crypto world.</p>
										</div>
									</div>
								</div>
								<!-- end item -->
							</div>
						</div>
					</div>
					<!-- end feature -->
				</div>
			</section>
			<!-- end section -->
		</main>
		<!-- end main -->

		<!-- start footer -->
		<footer id="footer" class="text--center text--lg-left">
			<div class="grid grid--container">
				<div class="row row--xs-middle">
					<div class="col col--sm-10 col--md-8 col--lg-4">
						<div class="__item">
							<a class="site-logo" href="{{url('/')}}">
								<img class="img-responsive lazy" width="175" height="42" src="{{ asset('welcome/img/blank.gif') }}" data-src="{{ asset('welcome/img/site_logo.png') }}" alt="demo" />
							</a>

							<p class="__text">
								Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. 
							</p>
						</div>
					</div>

					<div class="col col--sm-10 col--md-8 col--lg-3 col--xl-offset-1">
						<div class="__item">
							<h4 class="__title">Main menu</h4>

							<nav id="footer__navigation" class="navigation">
								<div class="row row--xs-middle">
									<div class="col col--xs-auto col--lg-6">
										<ul class="__menu">
											<li><a href="{{url('/')}}">Home</a></li>
											<li><a href="{{url('/')}}">About us</a></li>
											<li><a href="{{url('/')}}">Contacts</a></li>
											{{-- <li><a href="#">News</a></li> --}}
										</ul>
									</div>

									<div class="col col--xs-auto col--lg-6">
										<ul class="__menu">
											<li><a href="{{url('/')}}">Wallet</a></li>
											<li><a href="{{url('/')}}">FAQ’s</a></li>
											<li><a href="{{url('/')}}">Support</a></li>
										</ul>
									</div>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- end footer -->

		<div id="btn-to-top-wrap">
			<a id="btn-to-top" class="circled" href="javascript:void(0);" data-visible-offset="800"></a>
		</div>

		<script src="{{ asset('welcome/js/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('welcome/js/main.min.js') }}"></script>
	</body>
</html>