<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>@yield('title') - Admin of Animal Life Style</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/backend/modules/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/modules/fontawesome/css/all.min.css') }}">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="{{ asset('assets/backend/modules/jqvmap/dist/jqvmap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/modules/summernote/summernote-bs4.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/modules/dropify/css/dropify.css')}}">

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
	<style>
		.custom {
			padding: 15px 40px;
			position: fixed;
			top: 1rem;
			right: 1rem;
			z-index: 9999;
			transition: opacity 0.3s ease-out;
		}
	</style>

</head>

<body>
	<div id="app">

		@if(Session::has('success'))
		<div class="alert alert-success alert-dismissible show fade custom" role="alert" id="alert">
			<div class="alert-body">
				<button class="close" data-dismiss="alert">
					<span>&times;</span>
				</button>
				{{ Session::get('success')}}
			</div>
		</div>
		@endif
		@if(Session::has('error'))
		<div class="alert alert-danger alert-dismissible show fade custom" role="alert" id="alert">
			<div class="alert-body">
				<button class="close" data-dismiss="alert">
					<span>&times;</span>
				</button>
				{{ Session::get('error')}}
			</div>
		</div>
		@endif

		<div class="main-wrapper main-wrapper-1">
			<div class="navbar-bg"></div>
			<!-- partial:partials/nav.blade.php -->
			@include('backend.partials.nav')

			<!-- partial:partials/_sidebar.blade.php -->
			@include('backend.partials.side')
		</div>

		<div class="main-content">
			<section class="section">

				@yield('content')

			</section>
		</div>

		<footer class="main-footer">
			<div class="footer-left">
				Copyright &copy; <span id="year"></span> <div class="bullet"></div> Developed By <a href="https://moeenuddin.com">Moeen Uddin</a>
			</div>
			<div class="footer-right">

			</div>
		</footer>
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
	<script src="{{ asset('assets/backend/modules/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('assets/backend/modules/chart.min.js') }}"></script>
	<script src="{{ asset('assets/backend/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/backend/modules/summernote/summernote-bs4.js') }}"></script>
	<script src="{{ asset('assets/backend/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
	<script src="{{ asset('assets/backend/modules/dropify/js/dropify.js') }}"></script>

	<!-- Page Specific JS File -->
	<!-- <script src="{{ asset('assets/backend/js/page/index.js') }}"></script> -->

	<!-- Template JS File -->
	<script src="{{ asset('assets/backend/js/scripts.js') }}"></script>
	<script src="{{ asset('assets/backend/js/custom.js') }}"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			let currentYear = new Date().getFullYear();
			document.getElementById('year').textContent = currentYear;
		});

		document.addEventListener('DOMContentLoaded', function() {
			let alertElement = document.getElementById('alert');
			if (alertElement) {
				setTimeout(function() {
					let bsAlert = new bootstrap.Alert(alertElement);
					bsAlert.close();
				}, 3000); 
			}
		});

		$('.form-image').dropify();

		$("#name, #title").keyup(function() {
			var Text = $(this).val();
			Text = Text.toLowerCase();
			Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
			$("#slug").val(Text);
		});
	</script>
	@yield('scripts')

</body>
</html>