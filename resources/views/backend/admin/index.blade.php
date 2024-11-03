@extends('layouts.backend')
@section('title', 'FAQs')
@section('content')
<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>All FAQs Section</h4>
				<a href="{{ route('admin.create')}}" class="btn btn-primary">Add New</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">User Name</th>
								<th scope="col">Email</th>
								<th scope="col">Password</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($users->count() > 0)
							@foreach($users as $admin)
							<tr>
								<th scope="row">{{ $loop->index + 1 }}</th>
								<td>{{ $admin->name }}</td>
								<td>{{ $admin->email }}</td>
								<td>{{ \Illuminate\Support\Str::limit(strip_tags($admin->password), 10) }} Password is ecrypted</td>
								<td class="d-flex justify-content-center align-items-center" style="gap: 10px;">
									<form action="{{ route('admin.destroy', $admin->id) }}" method="POST">
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
									<a href="{{ route('admin.create')}}" class="btn btn-primary">Create a new one</a>
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