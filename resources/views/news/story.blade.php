@extends('app')

@section('title'){{ $story->title }}@stop

@section('content')
<div class="vijest">
<div class="container">
	<div class="row">
		<div class="col-lg-9 col-md-8 col-sm-8">
			<img class="img-responsive img-rounded vijest-banner" src="{{ asset('img/news/' . $story->image) }}">
		</div>
		<div class="col-lg-3 col-md-4 col-sm-4">
			<h2><small>Vijest</small><br/>{{ $story->title }}</h2>
			<p>{{ $story->user->getFullName() }}<br>{{ $story->created_at->format('d.m.Y. H:i') }}</p>
			@if(Auth::check())
				@if(Auth::user()->isStoryAuthor($story))
					<p>
					<a href="{{ route('news.edit', ['slug' => $story->slug]) }}">Uredi vijest</a>
					<span class='glyphicon glyphicon-minus'></span>
					<a href="{{ route('news.edit', ['slug' => $story->slug]) }}">Obriši vijest</a>
					</p>
				@endif
			@endif
		</div>
	</div>
</div>
<div class="vijest-body">
	<div class="container">
		<div class="letter">
			{!! Markdown::setMarkupEscaped(true)->parse($story->body) !!}
		</div>
	</div>
</div>
</div>
@stop