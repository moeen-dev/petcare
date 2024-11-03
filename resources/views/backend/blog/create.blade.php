@extends('layouts.backend')
@section('title', 'Create New Blog')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Create a New Blog</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('blog.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group col-md-12">
						<label for="title">Title of the blog</label>
						<input type="text" class="form-control" id="title" name="title" value="{{ old('title')}}">
						@if($errors->has('title'))
						<small style="color: red">{{ $errors->first('title')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="slug">Slug</label>
						<input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug')}}">
						@if($errors->has('slug'))
						<small style="color: red">{{ $errors->first('slug')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="image">Title of the blog</label>
						<input type="file" class="form-image" id="image" name="image">
						@if($errors->has('image'))
						<small style="color: red">{{ $errors->first('image')}}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="category_id">Choose Category</label>
						<select name="category_id" class="form-control" id="category_id">
							<option value="" selected disabled>-- Please Select a Category --</option>
							@foreach($blogCategories as $blogCategory)
							<option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option>
							@endforeach
						</select>
						@if($errors->has('category_id'))
						<small style="color: red">{{ $errors->first('category_id') }}</small>
						@endif
					</div>
					<div class="form-group col-md-12">
						<label for="description">Description</label>
						<textarea name="description" id="description" class="summernote">{{ old('description') }}</textarea>
						@if($errors->has('description'))
						<small style="color: red">{{ $errors->first('description')}}</small>
						@endif
					</div>
					<div class="card-footer">
						<button class="btn btn-primary" type="Submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection