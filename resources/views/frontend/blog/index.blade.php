@extends('layouts.frontend')
@section('content')
@section('title', 'Blog')
<!-- Blog Start -->
<div class="container pt-5">
	<div class="d-flex flex-column text-center mb-5 pt-5">
		<h4 class="text-secondary mb-3">Pet Blog</h4>
		<h1 class="display-4 m-0"><span class="text-primary">Updates</span> From Blog</h1>
	</div>
	<div class="dropdown mb-4 text-center">
		<button class="btn btn-primary dropdown-toggle" type="button" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Select Category
		</button>
		<div class="dropdown-menu" aria-labelledby="categoryDropdown">
			<a class="dropdown-item" href="{{ route('blog') }}">All Categories</a>
			@foreach($blogCategories as $category)
			<a class="dropdown-item" href="{{ route('blog', ['category' => $category->slug]) }}">
				{{ $category->name }}
			</a>
			@endforeach
		</div>
	</div>
	@if($blogs->count() > 0)
	<div class="row pb-3">
		@foreach($blogs as $blog)
		<div class="col-lg-4 mb-4">
			<div class="card border-0 mb-2">
				<img class="card-img-top" src="{{ url('upload/images', $blog->image) }}" alt="">
				<div class="card-body bg-light p-4">
					<h4 class="card-title text-truncate">{{ $blog->title }}</h4>
					<div class="d-flex mb-3">
						<small class="mr-2"><i class="fa fa-user text-muted"></i> Admin</small>
						<small class="mr-2"><i class="fa fa-folder text-muted"></i> {{ $blog->blogCategory->name ?? 'Uncategorized' }}</small>
						<!-- <small class="mr-2"><i class="fa fa-comments text-muted"></i> 15</small> -->
					</div>
					<p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 120) }}</p>
					<a class="font-weight-bold" href="{{ route('single-blog', $blog->slug)}}">Read More</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	@else
	<div class="col-12 no-blogs-message text-danger">
		<p>No blogs found in this category. Please Browse Another One.</p>
	</div>
	@endif
</div>
<!-- Blog End -->
@endsection