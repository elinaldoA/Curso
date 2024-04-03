<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="{{asset('img/favicon.png')}}">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="{{asset('site/fonts/icomoon/style.css')}}">
	<link rel="stylesheet" href="{{asset('site/fonts/flaticon/font/flaticon.css')}}">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	<link rel="stylesheet" href="{{asset('site/css/tiny-slider.css')}}">
	<link rel="stylesheet" href="{{asset('site/css/aos.css')}}">
	<link rel="stylesheet" href="{{asset('site/css/glightbox.min.css')}}">
	<link rel="stylesheet" href="{{asset('site/css/style.css')}}">

	<link rel="stylesheet" href="{{asset('site/css/flatpickr.min.css')}}">


	<title>Gestor</title>
</head>
<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="/" class="logo m-0 float-start">Gestor<span class="text-primary">.</span></a>
						</div>
						<div class="col-8 text-center ">
							<ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu mx-auto">
								<li class="active"><a href="/">Home</a></li>
								{{-- <li><a href="#">Blog</a></li>
								<li><a href="#">Serviço</a></li>
								<li><a href="#">Sobre</a></li>
								<li><a href="#">Contato</a></li> --}}
                                <li class="has-children">
									<a href="#">Acesso restrito</a>
									<ul class="dropdown">
										<li><a href="{{route('login')}}">Administrador</a></li>
										<li><a href="{{route('cliente.login')}}">Cliente</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="col-2 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>
							<a href="#" class="call-us d-flex align-items-center">
								<span class="icon-phone"></span>
								<span>(27) 9999-9999</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="hero overlay">
		<img src="{{asset('site/images/blob.svg')}}" alt="" class="img-fluid blob">
		<div class="container">
			<div class="row align-items-center justify-content-between pt-5">
				<div class="col-lg-6 text-center text-lg-start pe-lg-5">
					<h1 class="heading text-white mb-3" data-aos="fade-up">Gerenciamento da sua vida financeira de forma inteligente.</h1>
					<p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">Controle de gastos na palma da sua mão.</p>
					<div class="align-items-center mb-5 mm" data-aos="fade-up" data-aos-delay="200">
						<a href="#" class="btn btn-outline-white-reverse me-4">Contato</a>
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
					<div class="img-wrap">
						<img src="{{ asset('site/images/img-1.jpg') }}" alt="Image" class="img-fluid rounded">
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="section">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-7 mb-4 mb-lg-0">
					<img src="{{asset('site/images/img-3.jpg')}}" alt="Image" class="img-fluid rounded
					">
				</div>
				<div class="col-lg-4 ps-lg-2">
					<div class="mb-5">
						<h2 class="text-black h4">Controle de gastos de forma rápida e tranquila.</h2>
						<p>-</p>
					</div>
					<div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-calculator-fill me-4"></span>
						</div>
						<div>
							<h3>Finanças</h3>
							<p>-</p>
						</div>
					</div>

					<div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-pie-chart-fill me-4"></span>
						</div>
						<div>
							<h3>Métricas</h3>
							<p>-</p>
						</div>
					</div>
					
                    <div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-clock-fill me-4"></span>
						</div>
						<div>
							<h3>Poupe tempo</h3>
							<p>-</p>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	<div class="section sec-features">
		<div class="container">
			<div class="row g-5">
				<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
					<div class="feature d-flex">
						<span class="bi-calendar2-date-fill"></span>
						<div>
							<h3>Gastos diários</h3>
							<p>-</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
					<div class="feature d-flex">
						<span class="bi-calendar2-month-fill"></span>
						<div>
							<h3>Gastos Mensais</h3>
							<p>-</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
					<div class="feature d-flex">
						<span class="bi-calendar-fill"></span>
						<div>
							<h3>Gastos anuais</h3>
							<p>-</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 order-lg-2 mb-4 mb-lg-0">
					<img src="{{asset('site/images/img-1.jpg')}}" alt="Image" class="img-fluid">
				</div>
				<div class="col-lg-5 pe-lg-5">
					<div class="mb-5">
						<h2 class="text-black h4">Straight-forward way of financing</h2>
					</div>
					<div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-calendar2-date-fill me-4"></span>
						</div>
						<div>
							<h3>Diário</h3>
							<p>-</p>
						</div>
					</div>

					<div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-calendar2-month-fill me-4"></span>
						</div>
						<div>
							<h3>Mensal</h3>
							<p>-</p>
						</div>
					</div>

					<div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-calendar-fill me-4"></span>
						</div>
						<div>
							<h3>Anual</h3>
							<p>-</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="section sec-services">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
				<h2 class="heading text-primary">Nossos Serviços</h2>
				<p>-</p>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up">

				<div class="service text-center">
					<span class="bi-cash-coin"></span>
					<div>
						<h3>Finaças</h3>
						<p class="mb-4">-</p>
						<p><a href="#" class="btn btn-outline-primary py-2 px-3">Read more</a></p>
					</div>
				</div>

			</div>
			<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
				<div class="service text-center">
					<span class="bi-pie-chart"></span>
					<div>
						<h3>Por categoria</h3>
						<p class="mb-4">-</p>
						<p><a href="#" class="btn btn-outline-primary py-2 px-3">Read more</a></p>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
				<div class="service text-center">
					<span class="bi-clipboard"></span>
					<div>
						<h3>Por situação</h3>
						<p class="mb-4">-</p>
						<p><a href="#" class="btn btn-outline-primary py-2 px-3">Read more</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">

				<div class="service text-center">
					<span class="bi-calendar2-date"></span>
					<div>
						<h3>Diário</h3>
						<p class="mb-4">-</p>
						<p><a href="#" class="btn btn-outline-primary py-2 px-3">Read more</a></p>
					</div>
				</div>

			</div>
			<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
				<div class="service text-center">
					<span class="bi-calendar2-month"></span>
					<div>
						<h3>Mensal</h3>
						<p class="mb-4">-</p>
						<p><a href="#" class="btn btn-outline-primary py-2 px-3">Read more</a></p>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
				<div class="service text-center">
					<span class="bi-calendar"></span>
					<div>
						<h3>Anual</h3>
						<p class="mb-4">-</p>
						<p><a href="#" class="btn btn-outline-primary py-2 px-3">Read more</a></p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


{{-- <div class="section sec-cta overlay" style="background-image: url({{asset('site/images/img-3.jpg')}})">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-5" data-aos="fade-up" data-aos-delay="0">
				<h2 class="heading">Wanna Talk To Us?</h2>
				<p>-</p>
			</div>
			<div class="col-lg-5 text-end" data-aos="fade-up" data-aos-delay="100">
				<a href="#" class="btn btn-outline-white-reverse">Contact us</a>
			</div>
		</div>
	</div>
</div> --}}


{{-- <div class="section sec-portfolio bg-light pb-5	">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-5 mx-auto text-center ">
				<h2 class="heading text-primary mb-3" data-aos="fade-up" data-aos-delay="0">Case Studies</h2>
				<p class="mb-4" data-aos="fade-up" data-aos-delay="100">-</p>

				<div id="post-slider-nav" data-aos="fade-up" data-aos-delay="200">
					<button class="btn btn-primary py-2" class="prev" data-controls="prev">Prev</button>
					<button class="btn btn-primary py-2" class="next" data-controls="next">Next</button>
				</div>

			</div>
		</div>
	</div>

	<div class="post-slider-wrap" data-aos="fade-up" data-aos-delay="300">



		<div id="post-slider" class="post-slider">
			<div class="item">
				<a href="case-study.html" class="card d-block">
					<img src="{{asset('site/images/img-1.jpg')}}" class="card-img-top" alt="Image">
					<div class="card-body">
						<h5 class="card-title">Behind the word mountains</h5>
						<p>-</p>
					</div>
				</a>
			</div>

			<div class="item">
				<a href="case-study.html" class="card">
					<img src="{{asset('site/images/img-2.jpg')}}" class="card-img-top" alt="Image">
					<div class="card-body">
						<h5 class="card-title">Behind the word mountains</h5>
						<p>-</p>
					</div>
				</a>
			</div>

			<div class="item">
				<a href="case-study.html" class="card">
					<img src="{{asset('site/images/img-3.jpg')}}" class="card-img-top" alt="Image">
					<div class="card-body">
						<h5 class="card-title">Behind the word mountains</h5>
						<p>-</p>
					</div>
				</a>
			</div>

			<div class="item">
				<a href="case-study.html" class="card">
					<img src="{{asset('site/images/img-4.jpg')}}" class="card-img-top" alt="Image">
					<div class="card-body">
						<h5 class="card-title">Behind the word mountains</h5>
						<p>-</p>
					</div>
				</a>
			</div>

			<div class="item">
				<a href="case-study.html" class="card">
					<img src="{{asset('site/images/img-1.jpg')}}" class="card-img-top" alt="Image">
					<div class="card-body">
						<h5 class="card-title">Behind the word mountains</h5>
						<p>-</p>
					</div>
				</a>
			</div>
		</div>
	</div>


</div> --}}

{{-- <div class="section sec-testimonial bg-light">
	<div class="container">
		<div class="row mb-5 justify-content-center">
			<div class="col-lg-6 text-center">
				<h2 class="heading text-primary">Testimonials</h2>
			</div>

		</div>


		<div class="testimonial-slider-wrap">
			<div class="testimonial-slider" id="testimonial-slider">
				<div class="item">
					<div class="testimonial-half d-lg-flex bg-white">
						<div class="img" style="background-image: url('{{asset('site/images/img-4.jpg')}}')">

						</div>
						<div class="text">
							<blockquote>
								<p>-Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							</blockquote>
							<div class="author">
								<strong class="d-block text-black">John Campbell</strong>
								<span>CEO & Co-founder</span>
							</div>
						</div>
					</div>
				</div>

				<div class="item">
					<div class="testimonial-half d-lg-flex bg-white">
						<div class="img" style="background-image: url('{{asset('site/images/img-3.jpg')}}')">

						</div>
						<div class="text">
							<blockquote>
								<p>-Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							</blockquote>
							<div class="author">
								<strong class="d-block text-black">John Campbell</strong>
								<span>CEO & Co-founder</span>
							</div>
						</div>
					</div>
				</div>

				<div class="item">
					<div class="testimonial-half d-lg-flex bg-white">
						<div class="img" style="background-image: url('{{asset('site/images/img-2.jpg')}}')">

						</div>
						<div class="text">
							<blockquote>
								<p>-Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							</blockquote>
							<div class="author">
								<strong class="d-block text-black">John Campbell</strong>
								<span>CEO & Co-founder</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> --}}



{{-- <div class="section sec-news">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-7">
				<h2 class="heading text-primary">Latest News</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4">
				<div class="card post-entry">
					<a href="single.html"><img src="{{asset('site/images/img-1.jpg')}}" class="card-img-top" alt="Image"></a>
					<div class="card-body">
						<div><span class="text-uppercase font-weight-bold date">Jan 20, 2021</span></div>
						<h5 class="card-title"><a href="single.html">Behind the word mountains</a></h5>
						<p>-</p>
						<p class="mt-5 mb-0"><a href="#">Read more</a></p>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card post-entry">
					<a href="single.html"><img src="{{asset('site/images/img-2.jpg')}}" class="card-img-top" alt="Image"></a>
					<div class="card-body">
						<div><span class="text-uppercase font-weight-bold date">Jan 20, 2021</span></div>
						<h5 class="card-title"><a href="single.html">Behind the word mountains</a></h5>
						<p>-</p>
						<p class="mt-5 mb-0"><a href="#">Read more</a></p>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card post-entry">
					<a href="single.html"><img src="{{asset('site/images/img-3.jpg')}}" class="card-img-top" alt="Image"></a>
					<div class="card-body">
						<div><span class="text-uppercase font-weight-bold date">Jan 20, 2021</span></div>
						<h5 class="card-title"><a href="single.html">Behind the word mountains</a></h5>
						<p>-</p>
						<p class="mt-5 mb-0"><a href="single.html">Read more</a></p>
					</div>
				</div>
			</div>


		</div>
	</div>
</div> --}}

<div class="site-footer">
	<div class="container">
		<div class="row">
			{{-- <div class="col-lg-4">
				<div class="widget">
					<h3>About</h3>
					<p>-</p>
				</div> <!-- /.widget -->
				<div class="widget">
					<address>43 Raymouth Rd. Baltemoer, <br> London 3910</address>
					<ul class="list-unstyled links">
						<li><a href="tel://11234567890">+1(123)-456-7890</a></li>
						<li><a href="tel://11234567890">+1(123)-456-7890</a></li>
						<li><a href="mailto:info@mydomain.com">info@mydomain.com</a></li>
					</ul>
				</div> <!-- /.widget -->
			</div> <!-- /.col-lg-4 --> --}}
			{{-- <div class="col-lg-4">
				<div class="widget">
					<h3>Company</h3>
					<ul class="list-unstyled float-start links">
						<li><a href="#">About us</a></li>
						<li><a href="#">Services</a></li>
						<li><a href="#">Vision</a></li>
						<li><a href="#">Mission</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Privacy</a></li>
					</ul>
					<ul class="list-unstyled float-start links">
						<li><a href="#">Partners</a></li>
						<li><a href="#">Business</a></li>
						<li><a href="#">Careers</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Creative</a></li>
					</ul>
				</div> <!-- /.widget -->
			</div> <!-- /.col-lg-4 --> --}}
			{{-- <div class="col-lg-4">
				<div class="widget">
					<h3>Navigation</h3>
					<ul class="list-unstyled links mb-4">
						<li><a href="#">Our Vision</a></li>
						<li><a href="#">About us</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>

					<h3>Social</h3>
					<ul class="list-unstyled social">
						<li><a href="#"><span class="icon-instagram"></span></a></li>
						<li><a href="#"><span class="icon-twitter"></span></a></li>
						<li><a href="#"><span class="icon-facebook"></span></a></li>
						<li><a href="#"><span class="icon-linkedin"></span></a></li>
						<li><a href="#"><span class="icon-pinterest"></span></a></li>
						<li><a href="#"><span class="icon-dribbble"></span></a></li>
					</ul>
				</div> <!-- /.widget -->
			</div> <!-- /.col-lg-4 -->
		</div> <!-- /.row --> --}}

		<div class="row mt-5">
			<div class="col-12 text-center">
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. Todos os direitos reservados</p>
          </div>
        </div>
      </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>


    <script src="{{asset('site/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('site/js/tiny-slider.js')}}"></script>

    <script src="{{asset('site/js/flatpickr.min.js')}}"></script>


    <script src="{{asset('site/js/aos.js')}}"></script>
    <script src="{{asset('site/js/glightbox.min.js')}}"></script>
    <script src="{{asset('site/js/navbar.js')}}"></script>
    <script src="{{asset('site/js/counter.js')}}"></script>
    <script src="{{asset('site/js/custom.js')}}"></script>
  </body>
  </html>
