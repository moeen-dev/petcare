@extends('layouts.frontend')
@section('content')
@section('title', 'Contact')
<!-- Contact Start -->
<div class="container-fluid pt-5">
	<div class="d-flex flex-column text-center mb-5 pt-5">
		<h4 class="text-secondary mb-3">Contact Us</h4>
		<h1 class="display-4 m-0">Contact For <span class="text-primary">Any Query</span></h1>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 col-sm-8 mb-5">
			<div class="contact-form">
				<div id="success"></div>
				<form name="" action="{{ route('contact.submit') }}" method="POST" id="contactForm" novalidate="novalidate">
					@csrf
					<div class="control-group">
						<input type="text" class="form-control p-4" name="name" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" value="{{ old('name') }}" />
						@if($errors->has('name'))
						<small style="color: red">{{ $errors->first('name')}}</small>
						@endif
						<p class="help-block text-danger"></p>
					</div>
					<div class="control-group">
						<input type="email" class="form-control p-4" name="email" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" value="{{ old('email') }}"/>
						@if($errors->has('email'))
						<small style="color: red">{{ $errors->first('email')}}</small>
						@endif
						<p class="text-danger"></p>
					</div>
					<div class="control-group">
						<input type="text" class="form-control p-4" name="subject" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" value="{{ old('subject') }}"/>
						@if($errors->has('subject'))
						<small style="color: red">{{ $errors->first('subject')}}</small>
						@endif
						<p class="help-block text-danger"></p>
					</div>
					<div class="control-group">
						<textarea class="form-control p-4" rows="6" name="message" id="message" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message">{{ old('message') }}</textarea>
						@if($errors->has('message'))
						<small style="color: red">{{ $errors->first('message')}}</small>
						@endif
						<p class="text-danger"></p>
					</div>
					<div>
						<button class="g-recaptcha btn btn-primary py-3 px-5"
						data-sitekey="{{ config('services.recaptcha_v3.siteKey') }}"
						data-callback="onSubmit"
						data-action="submitContact">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Contact End -->
@endsection