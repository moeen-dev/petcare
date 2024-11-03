@extends('layouts.backend')
@section('title', 'Blog Comment')
@section('content')
<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>All Blog Comment Section</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Comment Name</th>
								<th scope="col">Comment Email</th>
								<th scope="col">Comment Profession</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($comments->count() > 0)
							@foreach($comments as $comment)
							<tr>
								<th scope="row">{{ $loop->index + 1 }}</th>
								<td>{{ $comment->name }}</td>
								<td>{{ $comment->email }}</td>
								<td>{{ \Illuminate\Support\Str::limit(strip_tags($comment->profession), 10) }}</td>
								<td class="d-flex justify-content-center align-items-center" style="gap: 10px;">
									<a href="{{ route('blog-comment.show', $comment->id)}}" class="btn btn-primary" data-toggle="tooltip" title="View All Details">View</a>
									<form action="{{ route('blog-comment.destroy', $comment->id) }}" method="POST">
										@csrf
										@method('DELETE')
										<button data-toggle="tooltip" title="Delete User" class="btn btn-danger" type="submit" onclick="return confirm('Do you want to delete it?')">Delete</button>
									</form>
								</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="5" class="text-center text-danger">
									<p>No Data Found!</p>
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