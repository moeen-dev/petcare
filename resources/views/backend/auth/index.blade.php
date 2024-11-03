<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Please Login !</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/backend/modules/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/modules/fontawesome/css/all.min.css') }}">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="{{ asset('assets/backend/modules/bootstrap-social/bootstrap-social.css') }}">

	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/css/components.css') }}">
	<!-- Start GA -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-94034622-3');
	</script>
	<!-- /END GA -->
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="login-brand">
							<img src="{{ url('assets/frontend/img/icon.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
						</div>

						<div class="card card-primary">
							<div class="card-header"><h4>Please Log In to continue.</h4></div>

							@if(Session::has('error'))
							<div class="alert alert-danger alert-dismissible show fade">
								<div class="alert-body">
									<button class="close" data-dismiss="alert">
										<span>&times;</span>
									</button>
									{{ Session::get('error')}}
								</div>
							</div>
							@endif

							<div class="card-body">
								<form method="POST" action="{{ route('login.submit')}}" class="needs-validation" novalidate="">
									@csrf
									<div class="form-group">
										<label for="email">Email</label>
										<input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
										<div class="invalid-feedback">
											Please fill in your email
										</div>
									</div>

									<div class="form-group">
										<label for="password" class="control-label">Password</label>
										<input id="password" type="password" class="form-control" name="password" tabindex="2" required>
										<div class="invalid-feedback">
											please fill in your password
										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Login
										</button>
									</div>
								</form>

							</div>
						</div>
						<div class="simple-footer">
							Copyright &copy; Pet Care - <span id="year"></span>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="{{ asset('assets/backend/modules/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/backend/modules/popper.js') }}"></script>
	<script src="{{ asset('assets/backend/modules/tooltip.js') }}"></script>
	<script src="{{ asset('assets/backend/modules/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/backend/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('assets/backend/modules/moment.min.js') }}"></script>
	<script src="{{ asset('assets/backend/js/stisla.js') }}"></script>

	<!-- JS Libraies -->

	<!-- Page Specific JS File -->

	<!-- Template JS File -->
	<script src="{{ asset('assets/backend/js/scripts.js') }}"></script>
	<script src="{{ asset('assets/backend/js/custom.js') }}"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var currentYear = new Date().getFullYear();
			document.getElementById('year').textContent = currentYear;
		});
	</script>
</body>
</html>