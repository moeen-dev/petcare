@extends('layouts.backend')
@section('title', 'Blog List')
@section('content')
<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>All Blog List</h4>
				<a href="{{ route('blog.create')}}" class="btn btn-primary">Create New</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Image</th>
								<th scope="col">Blog Title</th>
								<th scope="col">Blog Slug</th>
								<th scope="col">Category Name</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($blogs->count() > 0)
							@foreach($blogs as $blog)
							<tr>
								<th scope="row">{{ $loop->index + 1 }}</th>
								<td>
									<img style="width: 80px; height: auto;" src="{{ url('upload/images', $blog->image) }}" alt="blog_image">
								</td>
								<td>{{ \Illuminate\Support\Str::limit($blog->title, 25, '...') }}</td>
								<td>{{ \Illuminate\Support\Str::limit($blog->slug, 25, '...') }}</td>
								<td>{{ $blog->blogCategory['name'] }}</td>
								<td class="d-flex justify-content-center align-items-center" style="gap: 10px;">
									<a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-info" data-toggle="tooltip" title="Edit this blog">Edit</a>
									<form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger" type="submit" onclick="return confirm('Do you want to delete it?')">Delete</button>
									</form>
								</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="5" class="text-center text-danger">
									<p>No Data Found!</p>
									<a href="{{ route('blog.create')}}" class="btn btn-primary">Create a new one</a>
								</td>
							</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection