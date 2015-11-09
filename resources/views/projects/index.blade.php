@extends('app')

@section('title'){{'Projekti'}}@stop

@section('content')
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
			{{ Markdown::parse($project->body) }}
			<p>{{ $project->created_at->diffForHumans() }}</p>
		@endforeach
	@endif
</div>
@stop