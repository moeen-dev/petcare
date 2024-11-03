@extends('layouts.backend')
@section('title', 'About')
@section('content')
<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>All Banner Section</h4>
				<a href="{{ route('about.create')}}" class="btn btn-primary">Add New</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">First Title</th>
								<th scope="col">Second Title</th>
								<th scope="col">Description</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($abouts->count() > 0)
							@foreach($abouts as $about)
							<tr>
								<th scope="row">{{ $loop->index + 1 }}</th>
								<td>{{ $about->firstTitle }}</td>
								<td>{{ $about->secondTitle }}</td>
								<td>{{ \Illuminate\Support\Str::limit(strip_tags($about->description), 90) }}</td>
								<td class="d-flex justify-content-center align-items-center" style="gap: 10px;">
									<a href="{{ route('about.edit', $about->id) }}" class="btn btn-info" data-toggle="tooltip" title="Edit about">Edit</a>
									<form action="{{ route('about.destroy', $about->id) }}" method="POST">
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
									<a href="{{ route('about.create')}}" class="btn btn-primary">Create a new one</a>
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