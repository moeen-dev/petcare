@extends('layouts.backend')
@section('title', 'Details Blog Comment')
@section('content')
<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Comment Details List</h4>
				<a href="{{ route('blog-comment.index') }}" class="btn btn-primary">Comment List</a>
			</div>
			<div class="card-body">
				<p><strong>Name:</strong> {{ $comment->name }}</p>
				<p><strong>Email:</strong> {{ $comment->email }}</p>
				<p><strong>Profession:</strong> {{ $comment->profession }}</p>
				<p>{!! $comment->message !!}</p>
			</div>
		</div>
	</div>
</div>
@endsection