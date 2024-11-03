@extends('layouts.backend')
@section('title', 'Dashboard')
@section('content')
<div class="section-header">
	<h1>Admin Dashboard</h1>
</div>
<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-primary">
				<i class="far fa-image"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Total Banner</h4>
				</div>
				<div class="card-body">
					{{ $bannerCount }}
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-danger">
				<i class="far fa-circle"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Total Category</h4>
				</div>
				<div class="card-body">
					{{ $categoryCount }}
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-warning">
				<i class="far fa-newspaper"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Total Blog</h4>
				</div>
				<div class="card-body">
					{{ $blogCount }}
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-success">
				<i class="fas fa-user"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Total Users</h4>
				</div>
				<div class="card-body">
					{{ $userCount }}
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-success">
				<i class="far fa-comment-alt"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Blog Comments</h4>
				</div>
				<div class="card-body">
					{{ $feedCount }}
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-warning">
				<i class="fas fa-users"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Team Member</h4>
				</div>
				<div class="card-body">
					{{ $teamCount }}
				</div>
			</div>
		</div>
	</div>                  
</div>
@endsection