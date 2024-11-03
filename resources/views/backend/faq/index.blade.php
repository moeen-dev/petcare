@extends('layouts.backend')
@section('title', 'FAQs')
@section('content')
<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>All FAQs Section</h4>
				<a href="{{ route('faq.create')}}" class="btn btn-primary">Add New</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Question</th>
								<th scope="col">Answeer</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($faqs->count() > 0)
							@foreach($faqs as $faq)
							<tr>
								<th scope="row">{{ $loop->index + 1 }}</th>
								<td>{{ \Illuminate\Support\Str::limit(strip_tags($faq->answeer), 90) }}</td>
								<td>{{ \Illuminate\Support\Str::limit(strip_tags($faq->question), 90) }}</td>
								<td class="d-flex justify-content-center align-items-center" style="gap: 10px;">
									<a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-info" data-toggle="tooltip" title="Edit faq">Edit</a>
									<form action="{{ route('faq.destroy', $faq->id) }}" method="POST">
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
									<a href="{{ route('faq.create')}}" class="btn btn-primary">Create a new one</a>
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