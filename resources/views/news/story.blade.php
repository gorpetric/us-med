@extends('app')

@section('title'){{ $story->title }}@stop

@section('content')
<div class="vijest">
<div class="container">
	<img class="img-responsive img-rounded vijest-banner" src="{{ asset('img/news/' . $story->image) }}">
	<h2 style='text-align:center'><small>Vijest</small><br/>{{ $story->title }}</h2>
</div>
<div class="vijest-body">
	<div class="container">
		{!! Markdown::setMarkupEscaped(true)->parse($story->body) !!}
	</div>
</div>
<div class="container">
	{{ $story->user->getFullName() }}, {{ $story->created_at->diffForHumans() }}
	@if(Auth::check())
		@if(Auth::user()->isStoryAuthor($story))
			<span class='glyphicon glyphicon-minus'></span>
			<a href="{{ route('news.edit', ['slug' => $story->slug]) }}">Uredi vijest</a>
		@endif
	@endif
</div>
</div>
@stop