@extends('layouts.backend')
@section('title', 'Create Banner')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4> Create New Banner </h4>
			</div>
			<div class="card-body">
				<form action="{{ route('banner.store') }}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
					@csrf
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Image (1366*800) <span class="text-danger">*</span></label>
						<div class="col-sm-12 col-md-7">
							<input type="file" class="form-image" name="image" id="image">
							@if($errors->has('image'))
							<small style="color: red">{{ $errors->first('image')}}</small>
							@endif
						</div>
					</div>
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Tag Line <span class="text-danger">*</span></label>
						<div class="col-sm-12 col-md-7">
							<input type="text" class="form-control" name="tagLine" id="tagLine" autofocus value="{{ old('tagLine')}}">
							@if($errors->has('tagLine'))
							<small style="color: red">{{ $errors->first('tagLine')}}</small>
							@endif
						</div>
					</div>
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Title <span class="text-danger">*</span></label>
						<div class="col-sm-12 col-md-7">
							<input type="text" class="form-control" name="title" id="title" value="{{ old('title')}}">
							@if($errors->has('title'))
							<small style="color: red">{{ $errors->first('title')}}</small>
							@endif
						</div>
					</div>
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Short Text <span class="text-danger">*</span></label>
						<div class="col-sm-12 col-md-7">
							<input type="text" class="form-control" name="shortText" id="shortText" value="{{ old('shortText')}}">
							@if($errors->has('shortText'))
							<small style="color: red">{{ $errors->first('shortText')}}</small>
							@endif
						</div>
					</div>
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
						<div class="col-sm-12 col-md-7">
							<button class="btn btn-primary">Publish</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection