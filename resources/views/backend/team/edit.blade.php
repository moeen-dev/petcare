@extends('layouts.backend')
@section('title', 'Edit Team Member')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Edit Team Member</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('team-member.update', $team->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group col-md-12">
						<label for="image">Image Of Team Member (300*350)</label>
						<input type="file" class="form-image" id="image" name="image" data-default-file="{{ url('upload/images', $team->image)}}">
						@if($errors->has('image'))
						<small style="color: red">{{ $errors->first('image')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="name">Name Of Team Member</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}">
						@if($errors->has('name'))
						<small style="color: red">{{ $errors->first('name')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="designation">Designation</label>
						<input type="text" class="form-control" id="designation" name="designation" value="{{ $team->designation }}">
						@if($errors->has('designation'))
						<small style="color: red">{{ $errors->first('designation')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="facebook_url">Facebook Link</label>
						<input type="url" class="form-control" id="facebook_url" name="facebook_url" value="{{ $team->facebook_url }}">
						@if($errors->has('facebook_url'))
						<small style="color: red">{{ $errors->first('facebook_url')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="instagram_url">Instagram Link</label>
						<input type="url" class="form-control" id="instagram_url" name="instagram_url" value="{{ $team->instagram_url }}">
						@if($errors->has('instagram_url'))
						<small style="color: red">{{ $errors->first('instagram_url')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="linkedin_url">Linkedin Link</label>
						<input type="url" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ $team->linkedin_url }}">
						@if($errors->has('linkedin_url'))
						<small style="color: red">{{ $errors->first('linkedin_url')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="x_url">X Link</label>
						<input type="url" class="form-control" id="x_url" name="x_url" value="{{ $team->x_url }}">
						@if($errors->has('x_url'))
						<small style="color: red">{{ $errors->first('x_url')}}</small>
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