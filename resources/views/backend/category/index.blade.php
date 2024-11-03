@extends('layouts.backend')
@section('title', 'Category List')
@section('content')
<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>All Category List</h4>
				<a href="{{ route('category.create')}}" class="btn btn-primary">Create New</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Category Name</th>
								<th scope="col">Category Slug</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($blogCategories->count() > 0)
							@foreach($blogCategories as $blogCategory)
							<tr>
								<th scope="row">{{ $loop->index + 1 }}</th>
								<td>{{ $blogCategory->name }}</td>
								<td>{{ $blogCategory->slug }}</td>
								<td class="d-flex justify-content-center align-items-center" style="gap: 10px;">
									<a href="{{ route('category.edit', $blogCategory->id) }}" class="btn btn-info" data-toggle="tooltip" title="Edit this category">Edit</a>
									<form action="{{ route('category.destroy', $blogCategory->id) }}" method="POST">
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
									<a href="{{ route('category.create')}}" class="btn btn-primary">Create a new one</a>
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