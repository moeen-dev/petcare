@extends('layouts.backend')
@section('title', 'Banner')
@section('content')
<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>All Banner Section</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Image</th>
								<th scope="col">Title</th>
								<th scope="col">Tag Line</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($banners->count() > 0)
							@foreach($banners as $banner)
							<tr>
								<th scope="row">{{ $loop->index + 1 }}</th>
								<td>
									<img style="width: 80px; height: auto;" src="{{ url('upload/images', $banner->image) }}" alt="banner_image">
								</td>
								<td>{{ $banner->title }}</td>
								<td>{{ $banner->tagLine }}</td>
								<td class="d-flex justify-content-center align-items-center" style="gap: 10px;">
									<a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-info" data-toggle="tooltip" title="Edit this banner">Edit</a>
									<form action="{{ route('banner.destroy', $banner->id) }}" method="POST">
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
									<a href="{{ route('banner.create')}}" class="btn btn-primary">Create a new one</a>
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