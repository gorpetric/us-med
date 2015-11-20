@extends('app')

@section('title'){{'Projekti'}}@stop

@section('content')
<!-- <header class="projects-header"></header> -->
<div class="container">
	<h1>Projekti</h1><hr style='border-color:#262626'>
	@if(Auth::check())
		@if(Auth::user()->isAdmin())
			<a href="{{ route('projects.new') }}"><button class="btn btn-default">Novi projekt</button></a>
			<hr/>
		@endif
	@endif
	@if(!$projects->count())
		<p>Trenutno nema nijednog projekta.</p>
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