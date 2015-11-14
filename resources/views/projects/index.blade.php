@extends('app')

@section('title'){{'Projekti'}}@stop

@section('content')
<header class="projects-header"></header>
<div class="container">
	<h3>Projekti</h3><hr/>
	@if(Auth::check())
		@if(Auth::user()->isAdmin())
			<a href="{{ route('projects.new') }}"><button class="btn btn-default">Novi projekt</button></a>
			<hr/>
		@endif
	@endif
	@if(!$projects->count())
		<p>Trenutno nema nijednog projekta.</p>
	@else
		@foreach ($projects as $project)
			<h4><a href="{{ route('projects.project', ['slug' => $project->slug]) }}">{{ $project->title }}</a></h4>
			{{ stripMarkdown(str_limit($project->body, 250)) }}
			<p>{{ $project->created_at->diffForHumans() }}</p>
		@endforeach
	@endif
</div>
@stop