@extends('app')

@section('title'){{ $story->title }}@stop

@section('content')
<div class="vijest">
<div class="container vj">
	<div class="vijest-banner">
		<img class="img-responsive img-rounded" src="{{ asset('img/news/' . $story->image) }}">
	</div>
	<div class="vijest-info">
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
<div class="vijest-body">
	<div class="container">
		<div class="letter">
			{!! Markdown::setMarkupEscaped(true)->parse($story->body) !!}
		</div>
	</div>
</div>
</div>
@stop