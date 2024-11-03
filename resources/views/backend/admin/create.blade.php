@extends('layouts.backend')
@section('title', 'Create New User')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Create New User</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group col-md-12">
						<label for="name">Name (required)</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ old('name')}}">
						@if($errors->has('name'))
						<small style="color: red">{{ $errors->first('name')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="email">Email (required)</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ old('email')}}">
						@if($errors->has('email'))
						<small style="color: red">{{ $errors->first('email')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="password">Password (required)</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="{{ old('password')}}">
						@if($errors->has('password'))
						<small style="color: red">{{ $errors->first('password')}}</small>
						@endif
					</div>
					<div class="card-footer">
						<button class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection