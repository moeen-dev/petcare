@extends('layouts.frontend')
@section('content')
@section('title', 'Blog Details')
<!-- Detail Start -->
<div class="container py-5">
	<div class="row pt-5">
		<div class="col-lg-8">
			<div class="d-flex flex-column text-left mb-4">
				<h4 class="text-secondary mb-3">Blog Detail</h4>
				<h1 class="mb-3">{{ $blog->title }}</h1>
				<div class="d-index-flex mb-2">
					<span class="mr-3"><i class="fa fa-user text-muted"></i> Admin</span>
					<span class="mr-3"><i class="fa fa-folder text-muted"></i> {{ $blog->blogCategory->name ?? 'Uncategorized' }}</span>
				</div>
			</div>

			<div class="mb-5">
				<p>{!! $blog->description !!}</p>
			</div>

			

			<div style="padding: 30px; background: #f6f6f6;">
				<h3 class="mb-4">Leave a comment</h3>
				<form action="{{ route('form.submit')}}" method="POST">
					@csrf
					<div class="form-group">
						<label for="name">Name *</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="email">Email *</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="profession">Profession *</label>
						<input type="text" class="form-control" id="profession" name="profession">
					</div>

					<div class="form-group">
						<label for="message">Message *</label>
						<textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="math_problem">Solve: {{ $digit1 }} + {{ $digit2 }} = ? *</label>
						<input type="number" class="form-control" id="math_problem" name="user_answer" required>
					</div>

					<!-- Pass the correct answer as a hidden field -->
					<input type="hidden" name="correct_answer" value="{{ $correctAnswer }}">
					<div class="form-group mb-0">
						<input type="submit" value="Leave Comment" class="btn btn-primary px-3">
					</div>
				</form>
			</div>
		</div>

		<div class="col-lg-4 mt-5 mt-lg-0">
			<div class="mb-5">
				<h3 class="mb-4">Categories</h3>
				<ul class="list-group">
					@foreach($blogCategories as $blogCategory)
					<li class="list-group-item d-flex justify-content-between align-items-center">
						{{ $blogCategory->name }}
						<span class="badge badge-primary badge-pill">{{ $blogCount[$blogCategory->id]->blogs_count }}</span>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="mb-5">
				<h3 class="mb-4">Recent Blog</h3>
				@foreach($blogs as $blog)
				<div class="d-flex align-items-center border-bottom mb-3 pb-3">
					<img class="img-fluid" src="{{ url('upload/images', $blog->image) }}" style="width: 80px; height: 80px;" alt="">
					<div class="d-flex flex-column pl-3">
						<a class="text-dark mb-2" href="{{ route('single-blog', $blog->slug)}}">{{ \Illuminate\Support\Str::limit(strip_tags($blog->title), 30) }}</a>
						<div class="d-flex">
							<small class="mr-3"><i class="fa fa-user text-muted"></i> Admin</small>
							<small class="mr-3"><i class="fa fa-folder text-muted"></i> {{ $blog->blogCategory->name ?? 'Uncategorized' }}</small>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div>
				<h3 class="mb-4">Plain Text</h3>
				Aliquyam sed lorem stet diam dolor sed ut sit. Ut sanctus erat ea est aliquyam dolor et. Et no consetetur eos labore ea erat voluptua et. Et aliquyam dolore sed erat. Magna sanctus sed eos tempor rebum dolor, tempor takimata clita sit et elitr ut eirmod.
			</div>
		</div>
	</div>
</div>
<!-- Detail End -->
@endsection