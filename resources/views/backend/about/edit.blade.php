@extends('layouts.backend')
@section('title', 'Edit About')
@section('content')
@extends('layouts.backend')
@section('title', 'Create About')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Horizontal Form</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('about.update', $about->id ) }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="firstTitle">First Title</label>
							<input type="text" class="form-control" name="firstTitle" id="firstTitle" placeholder="First Title" value="{{ $about->firstTitle }}">
							@if($errors->has('firstTitle'))
							<small style="color: red">{{ $errors->first('firstTitle')}}</small>
							@endif
						</div>
						<div class="form-group col-md-6">
							<label for="secondTitle">Second Title</label>
							<input type="text" class="form-control" name="secondTitle" id="secondTitle" placeholder="Second Title" value="{{ $about->secondTitle }}">
							@if($errors->has('secondTitle'))
							<small style="color: red">{{ $errors->first('secondTitle')}}</small>
							@endif
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="description">Description</label>
						<textarea name="description" id="description" class="summernote">{{ $about->description }}</textarea>
						@if($errors->has('description'))
						<small style="color: red">{{ $errors->first('description')}}</small>
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
@endsection