@extends('app')

@section('title'){{'Vodstvo'}}@stop

@section('content')
<div class="container">
<h1>Vodstvo</h1><hr style='border-color:#262626' />
<p class="help-block">Coming soon...</p>
<div class="row">
	<div class="col-sm-4 lead-out">
		<img class='img-responsive' src="https://placehold.it/500x500">
		<h4>
			<span class="glyphicon glyphicon-star"></span>
			Pred Sjednik
		</h4>
		<div class="sm">
			<a href="#"><img src="{{ asset('img/social-media-icons/facebook.png') }}"></a>
			<a href="#"><img src="{{ asset('img/social-media-icons/instagram.png') }}"></a>
			<a href="#"><img src="{{ asset('img/social-media-icons/youtube.png') }}"></a>
		</div>
	</div>
	<div class="col-sm-4 lead-out">
		<img class='img-responsive' src="https://placehold.it/500x500">
		<h4>
			<span class="glyphicon glyphicon-star-empty"></span>
			Zam Jenik
		</h4>
		<div class="sm">
			<a href="#"><img src="{{ asset('img/social-media-icons/facebook.png') }}"></a>
			<a href="#"><img src="{{ asset('img/social-media-icons/instagram.png') }}"></a>
			<a href="#"><img src="{{ asset('img/social-media-icons/youtube.png') }}"></a>
		</div>
	</div>
	<div class="col-sm-4 lead-out">
		<img class='img-responsive' src="https://placehold.it/500x500">
		<h4>
			<span class="glyphicon glyphicon-euro"></span>
			Taj Nik
		</h4>
		<div class="sm">
			<a href="#"><img src="{{ asset('img/social-media-icons/facebook.png') }}"></a>
			<a href="#"><img src="{{ asset('img/social-media-icons/instagram.png') }}"></a>
			<a href="#"><img src="{{ asset('img/social-media-icons/youtube.png') }}"></a>
		</div>
	</div>
</div>
</div>
@stop