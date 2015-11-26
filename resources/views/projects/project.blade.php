@extends('app')

@section('title'){{ $project->title }}@stop

@section('content')
<header class="projects-header">
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<h1><a href="{{ route('projects.index') }}"><span class="glyphicon glyphicon-education"></span> Projekti</a></h1>
			</div>
			<div class='links'>
				@if(Auth::check())
					@if(Auth::user()->isAdmin())
						<a class='btn btn-default' href="{{ route('projects.edit', ['slug' => $project->slug]) }}">Uredi projekt</a>
						<a class='btn btn-warning delete-link' href="{{ route('projects.delete', ['slug' => $project->slug]) }}">Obriši projekt</a>
					@endif
				@endif
			</div>
		</div>
		<hr>
		<h3><a href="{{ route('projects.project', ['slug' => $project->slug]) }}">{{ $project->title }}</a></h3>
		<p class="help-block"><span class="glyphicon glyphicon-dashboard"></span> {{ $project->created_at->format('d.m.Y. H:i') }}</p>
		<p>{{ $project->user->getFullName() }}</p>
	</div>
</header>
<div class="projekt">
	<img class="img-responsive img-rounded" src="{{ asset('img/projects/' . $project->image) }}">
	<div class="projekt-body">
		<div class="container">
			<div class="letter">
				{!! Markdown::setMarkupEscaped(true)->parse($project->body) !!}
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
<script type='text/javascript'>
$('.delete-link').click(function(e){
	var that = $(this);
	e.preventDefault();
	swal({
		title: "Sigurno?",
		text: "Projekt i svi podaci o njemu će biti izgubljeni!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Da, obriši projekt!",
		//closeOnConfirm: false
	},
		function(){
			location.href=that.attr('href');
		}
	);
});
$('.letter img').each(function(){
	var that = $(this);
	var src = that.attr('src');
	that.css({
		'max-width': '200px',
		'max-height': '150px'
	});
	that.wrap("<a target='_blank' data-lightbox='project-images' href='"+src+"'></a>");
});
</script>
@stop