<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Register</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('/frontend') }}/css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('/frontend') }}/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('/frontend') }}/css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!-- Header -->
		@include('layouts.sites_inc._navbar')
		<!-- /Header -->

		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{asset('frontend/img/page-background.jpg')}})"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="index.html">Home</a></li>
							<li>Register</li>
						</ul>
						<h1 class="white-text">Pendaftaran</h1>

					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Contact -->
		<div id="contact" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- contact information -->
					<div class="col-md-5 col-md-offset-1">
						<h1>Pendaftaran Online Bergabung Bersama Kami</h1>
						<p>Dengan kurikulum yang update dengan kebutuhan pasar kami menjamin lulusan akan mudah terserap di dunia kerja.</p>
					</div>
					<!-- contact information -->

					<!-- contact form -->
					<div class="col-md-6">
						<div class="contact-form">
							<h4>Formulir Pendaftaran</h4>
							{!! Form::open(['url' => '/postregister']) !!}
								{!! Form::text('nama_depan', '', ['class' => 'input', 'placeholder' => 'Nama depan . . .']) !!}
								{!! Form::text('nama_belakang', '', ['class' => 'input', 'placeholder' => 'Nama belakang . . .']) !!}
								{!! Form::text('agama', '', ['class' => 'input', 'placeholder' => 'Agama . . .']) !!}
								{!! Form::textarea('alamat', '', ['class' => 'input', 'placeholder' => 'Alamat . . .']) !!}
								<div class="form-control input">
									{!! Form::select('jenis_kelamin', ['' => 'Pilih jenis kelamin', 'L' => 'Laki-laki', 'P' => 'Perempuan'], ['class' => 'input']) !!}
								</div>
								{!! Form::email('email', '', ['class' => 'input', 'placeholder' => 'Email . . .']) !!}
								{!! Form::password('password', ['class' => 'input', 'placeholder' => 'Password . . .']) !!}
								<input type="submit" class="main-button icon-button pull-right" value="Kirim">
							{!! Form::close() !!}
						</div>
					</div>
					<!-- /contact form -->



				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->

		<!-- Footer -->
		@include('layouts.sites_inc._footer')
		<!-- /Footer -->

		<!-- preloader -->
		<div id='preloader'><div class='preloader'></div></div>
		<!-- /preloader -->


		<!-- jQuery Plugins -->
		<script type="text/javascript" src="{{ asset('/frontend') }}/js/jquery.min.js"></script>
		<script type="text/javascript" src="{{ asset('/frontend') }}/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{{ asset('/frontend') }}/js/main.js"></script>
	</body>
</html>
