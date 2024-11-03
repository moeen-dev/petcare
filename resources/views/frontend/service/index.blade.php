@extends('layouts.frontend')
@section('content')
@section('title', 'Service')
<!-- Services Start -->
<div class="container-fluid bg-light pt-5">
	<div class="container py-5">
		<div class="d-flex flex-column text-center mb-5">
			<h4 class="text-secondary mb-3">Our Services</h4>
			<h1 class="display-4 m-0"><span class="text-primary">Our</span> Pet Services</h1>
		</div>
		<div class="row pb-3">
			<div class="col-md-6 col-lg-4 mb-4">
				<div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
					<h3 class="flaticon-house display-3 font-weight-normal text-secondary mb-3"></h3>
					<h3 class="mb-3">Pet Boarding</h3>
					<p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 mb-4">
				<div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
					<h3 class="flaticon-food display-3 font-weight-normal text-secondary mb-3"></h3>
					<h3 class="mb-3">Pet Feeding</h3>
					<p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 mb-4">
				<div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
					<h3 class="flaticon-grooming display-3 font-weight-normal text-secondary mb-3"></h3>
					<h3 class="mb-3">Pet Grooming</h3>
					<p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 mb-4">
				<div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
					<h3 class="flaticon-cat display-3 font-weight-normal text-secondary mb-3"></h3>
					<h3 class="mb-3">Per Training</h3>
					<p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 mb-4">
				<div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
					<h3 class="flaticon-dog display-3 font-weight-normal text-secondary mb-3"></h3>
					<h3 class="mb-3">Pet Exercise</h3>
					<p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 mb-4">
				<div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
					<h3 class="flaticon-vaccine display-3 font-weight-normal text-secondary mb-3"></h3>
					<h3 class="mb-3">Pet Treatment</h3>
					<p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Services End -->


<!-- Testimonial Start -->
<div class="container-fluid p-0 py-5">
	<div class="container p-0 pt-5">
		<div class="d-flex flex-column text-center mb-5">
			<h4 class="text-secondary mb-3">Testimonial</h4>
			<h1 class="display-4 m-0">Our Client <span class="text-primary">Says</span></h1>
		</div>
		<div class="owl-carousel testimonial-carousel">
			@foreach($feedbacks as $feedback)
			<div class="bg-light mx-3 p-4">
				<div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
					<img class="img-fluid" src="{{ url('upload/images', $feedback->image) }}" style="width: 80px; height: 80px;" alt="">
					<div class="ml-3">
						<h5>{{ $feedback->name }}</h5>
						<i>{{ $feedback->profession }}</i>
					</div>
				</div>
				<p class="m-0">{!! $feedback->shortText !!}</p>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- Testimonial End -->
@endsection