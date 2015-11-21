@extends('app')

@section('title'){{'Projekti'}}@stop

@section('content')
<header class="projects-header">
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<a href="{{ route('projects.index') }}"><h1><span class="glyphicon glyphicon-education"></span> Projekti</h1></a>
				<p class="help-block">Sadašnji i budući projekti koje vodi Udruga</p>
			</div>
			<div class='links'>
				@if(Auth::check())
					@if(Auth::user()->isAdmin())
						<a class='btn btn-default' href="{{ route('projects.new') }}">Novi projekt</a>
					@endif
				@endif
			</div>
		</div>
	</div>
</header>
<div class="container">
	@if(!$projects->count())
		<p>Trenutno nema ni jednog projekta.</p>
	@else
		<div class="projekti">
		@foreach ($projects as $key => $project)
			<div class="svaki">
				<div class="slika">
					<img class='img-responsive img-rounded' src="{{ asset('img/projects/' .  $project->image) }}">
				</div>
				@if($key % 2 == 0)
				<div class="projekt-info info-first">
				@else
				<div class="projekt-info">
				@endif
					<h4><a href="{{ route('projects.project', ['slug' => $project->slug]) }}">{{ $project->title }}</a></h4>
					<p>{{ stripMarkdown(str_limit($project->body, 250)) }}</p>
					<a class='btn btn-info' href="{{ route('projects.project', ['slug' => $project->slug]) }}">Više o projeku</a>
				</div>
			</div>
		@endforeach
		</div>
	@endif
</div>
@stop