@extends('app')

@section('title'){{ $project->title }}@stop

@section('content')
<div class="container">
	@if(Auth::check())
		@if(Auth::user()->isAdmin())
			<a href="{{ route('projects.edit', ['slug' => $project->slug]) }}"><button class="btn btn-default">Uredi projekt</button></a>
			<hr/>
		@endif
	@endif
	<h3><small>Projekt: </small>{{ $project->title }}</h3>
	{!! Markdown::setMarkupEscaped(true)->parse($project->body) !!}
	<p>{{ $project->user->username }}, {{ $project->created_at->diffForHumans() }}</p>
</div>
@stop