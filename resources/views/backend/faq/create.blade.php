@extends('layouts.backend')
@section('title', 'Create New FAQs')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Create New FAQs</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group col-md-12">
						<label for="question">Question (required)</label>
						<input type="text" class="form-control" name="question" id="question" placeholder="Enter Your FAQs Question." value="{{ old('question')}}">
						@if($errors->has('question'))
						<small style="color: red">{{ $errors->first('question')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="answeer">Answeer (required)</label>
						<textarea name="answeer" id="answeer" class="summernote">{{ old('answeer') }}</textarea>
						@if($errors->has('answeer'))
						<small style="color: red">{{ $errors->first('answeer')}}</small>
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