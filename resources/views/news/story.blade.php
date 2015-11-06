@extends('app')

@section('title'){{ $story->title }}@stop

@section('content')
<div class="container">
	<div class="long" style="margin-top:70px"></div>
	@if(Auth::check())
		@if(Auth::user()->isStoryAuthor($story))
			<a href="{{ route('news.edit', ['slug' => $story->slug]) }}"><button class="btn btn-default">Uredi vijest</button></a>
			<hr/>
		@endif
	@endif
	<h3>{{ $story->title }}</h3>
	{{ Markdown::parse($story->body) }}
	<p>{{ $story->user->username }}, {{ $story->created_at->diffForHumans() }}</p>
</div>
@stop