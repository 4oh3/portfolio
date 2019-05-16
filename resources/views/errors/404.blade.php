@extends('layouts.app')

@section('content')

<style>
.error404-container {
	display: grid;
	height: 100vh;
	place-items: center;
}
.error404 .card-header {
	color: white;
	background-color: #4c87fc;
}
</style>

<div class="error404-container">
	<div class="col-md-6 error404">
		<div class="card text-center">
			<div class="card-header">
				404 Error
			</div>
			<div class="card-body">
				<h5 class="card-title">Sorry, this page doesn't exist</h5>
				<p class="card-text">Let's take you back home!</p>
				<a href="/" class="btn btn-primary">Go Home</a>
			</div>
		</div>
	</div>
</div>

@endsection