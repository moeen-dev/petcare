@extends('layouts.backend')
@section('title', 'Edit Category')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Edit Category</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('category.update', $blogCategory->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group col-md-12">
						<label for="name">Name Of Category</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ $blogCategory->name }}">
						@if($errors->has('name'))
						<small style="color: red">{{ $errors->first('name')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="slug">Slug</label>
						<input type="text" class="form-control" id="slug" name="slug" value="{{ $blogCategory->slug }}">
						@if($errors->has('slug'))
						<small style="color: red">{{ $errors->first('slug')}}</small>
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