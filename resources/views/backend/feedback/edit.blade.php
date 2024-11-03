@extends('layouts.backend')
@section('title', 'Create Team Member')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Create a New FeedBack</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('feedback.update', $feedback->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group col-md-12">
						<label for="image">Image Of Team Member (100*100)</label>
						<input type="file" class="form-image" id="image" name="image" data-default-file="{{ url('upload/images', $feedback->image)}}"
						@if($errors->has('image'))
						<small style="color: red">{{ $errors->first('image')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="name">Name Of Client</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ $feedback->name }}">
						@if($errors->has('name'))
						<small style="color: red">{{ $errors->first('name')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="profession">Profession</label>
						<input type="text" class="form-control" id="profession" name="profession" value="{{ $feedback->profession }}">
						@if($errors->has('profession'))
						<small style="color: red">{{ $errors->first('profession')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="shortText">Client Feedback (Max:500)</label>
						<textarea class="summernote" id="shortText" name="shortText">{{ $feedback->shortText }}</textarea>
						@if($errors->has('shortText'))
						<small style="color: red">{{ $errors->first('shortText')}}</small>
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