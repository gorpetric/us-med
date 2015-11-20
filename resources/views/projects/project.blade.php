@extends('app')

@section('title'){{ $project->title }}@stop

@section('content')
<div class="projekt">
<div class="container">
	<img class="img-responsive img-rounded projekt-banner" src="{{ asset('img/projects/' . $project->image) }}">
	<h2 style='text-align:center'><small>Projekt</small><br/>{{ $project->title }}</h2>
	@if(Auth::check())
		@if(Auth::user()->isAdmin())
			<p style='text-align:center'>
			<a href="{{ route('projects.edit', ['slug' => $project->slug]) }}">Uredi projekt</a>
			<span class='glyphicon glyphicon-minus'></span>
			<a class='delete-link' href="{{ route('projects.delete', ['slug' => $project->slug]) }}">Obriši projekt</a>
			</p>
		@endif
	@endif
</div>
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
</script>
@stop