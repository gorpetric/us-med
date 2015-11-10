@extends('app')

@section('title'){{ $story->title }}@stop

@section('content')
<div class="container">
	@if(Auth::check())
		@if(Auth::user()->isStoryAuthor($story))
			<a href="{{ route('news.edit', ['slug' => $story->slug]) }}"><button class="btn btn-default">Uredi vijest</button></a>
			<hr/>
		@endif
	@endif
	<h3><small>Vijest: </small>{{ $story->title }}</h3>	
	{!! Markdown::setMarkupEscaped(true)->parse($story->body) !!}
	<p>{{ $story->user->username }}, {{ $story->created_at->diffForHumans() }}</p>
</div>
@stop