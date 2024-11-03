@extends('layouts.frontend')
@section('title', 'About')
@section('content')
<!-- About Start -->
@if($abouts->count() >= 1)
<div class="container py-5">
	<div class="row py-5">
		<div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
			<h4 class="text-secondary mb-3">About Us</h4>
			<h1 class="display-4 mb-4"><span class="text-primary">{{ $abouts->firstTitle }}</span> & <span class="text-secondary">{{ $abouts->secondTitle }}</span></h1>
			<p>{!! $abouts->description !!}</p>
		</div>
		<div class="col-lg-5">
			<div class="row px-3">
				<div class="col-12 p-0">
					<img class="img-fluid w-100" src="{{ url('assets/frontend/img/about-1.jpg') }}" alt="">
				</div>
				<div class="col-6 p-0">
					<img class="img-fluid w-100" src="{{ url('assets/frontend/img/about-2.jpg') }}" alt="">
				</div>
				<div class="col-6 p-0">
					<img class="img-fluid w-100" src="{{ url('assets/frontend/img/about-3.jpg') }}" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- About End -->
@endif


<!-- Features Start -->
<div class="container-fluid bg-light">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-5">
				<img class="img-fluid w-100" src="{{ url('assets/frontend/img/feature.jpg') }}" alt="">
			</div>
			<div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
				<h4 class="text-secondary mb-3">Why Choose Us?</h4>
				<h1 class="display-4 mb-4"><span class="text-primary">Special Care</span> On Pets</h1>
				<p class="mb-4">Dolor lorem lorem ipsum sit et ipsum. Sadip sea amet diam sed ut vero no sit. Et elitr stet sed sit sed kasd. Erat duo eos et erat sed diam duo</p>
				<div class="row py-2">
					<div class="col-6">
						<div class="d-flex align-items-center mb-4">
							<h1 class="flaticon-cat font-weight-normal text-secondary m-0 mr-3"></h1>
							<h5 class="text-truncate m-0">Best In Industry</h5>
						</div>
					</div>
					<div class="col-6">
						<div class="d-flex align-items-center mb-4">
							<h1 class="flaticon-doctor font-weight-normal text-secondary m-0 mr-3"></h1>
							<h5 class="text-truncate m-0">Emergency Services</h5>
						</div>
					</div>
					<div class="col-6">
						<div class="d-flex align-items-center">
							<h1 class="flaticon-care font-weight-normal text-secondary m-0 mr-3"></h1>
							<h5 class="text-truncate m-0">Special Care</h5>
						</div>
					</div>
					<div class="col-6">
						<div class="d-flex align-items-center">
							<h1 class="flaticon-dog font-weight-normal text-secondary m-0 mr-3"></h1>
							<h5 class="text-truncate m-0">Customer Support</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Features End -->
@endsection