@extends('app')

@section('title'){{ $project->title }}@stop

@section('content')
<div class="projekt">
<div class="container">
	<img class="img-responsive img-rounded projekt-banner" src="{{ asset('img/projects/' . $project->image) }}">
	<h2 style='text-align:center'><small>Projekt</small><br/>{{ $project->title }}</h2>
</div>
<div class="projekt-body">
	<div class="container">
		{!! Markdown::setMarkupEscaped(true)->parse($project->body) !!}
	</div>
</div>
<div class="container">
	{{ $project->user->getFullName() }}, {{ $project->created_at->diffForHumans() }}
	@if(Auth::check())
		@if(Auth::user()->isAdmin())
			<span class='glyphicon glyphicon-minus'></span>
			<a href="{{ route('projects.edit', ['slug' => $project->slug]) }}">Uredi projekt</a>
		@endif
	@endif
</div>
</div>
@stop