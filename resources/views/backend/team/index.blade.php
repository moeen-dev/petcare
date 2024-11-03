@extends('layouts.backend')
@section('title', 'Team Member List')
@section('content')
<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>All Team Member</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Image</th>
								<th scope="col">Team Member Name</th>
								<th scope="col">Designation</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($teams->count() > 0)
							@foreach($teams as $team)
							<tr>
								<th scope="row">{{ $loop->index + 1 }}</th>
								<td>
									<img style="width: 50px; height: auto;" src="{{ url('upload/images', $team->image) }}" alt="banner_image">
								</td>
								<td>{{ $team->name }}</td>
								<td>{{ $team->designation }}</td>
								<td class="d-flex justify-content-center align-items-center" style="gap: 10px;">
									<a href="{{ route('team-member.edit', $team->id) }}" class="btn btn-info">Edit</a>
									<form action="{{ route('team-member.destroy', $team->id) }}" method="POST">
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