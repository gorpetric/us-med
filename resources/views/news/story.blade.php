@extends('app')

@section('title'){{ $story->title }}@stop

@section('content')
<div class="container">
	<div class="long" style="margin-top:70px"></div>
	<h3>{{ $story->title }}</h3>
	{{ Markdown::parse($story->body) }}
	<p>{{ $story->user->username }}, {{ $story->created_at->diffForHumans() }}</p>
</div>
@stop