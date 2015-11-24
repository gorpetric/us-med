@extends('app')

@section('title'){{ $story->title }}@stop

@section('content')
<header class="news-header">
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<h1><a href="{{ route('news.index') }}"><span class="glyphicon glyphicon-list-alt"></span> Vijesti</a></h1>
			</div>
			<div class='links'>
				@if(Auth::check())
					@if(Auth::user()->isAdmin())
						<a class='btn btn-default' href="{{ route('news.edit', ['slug' => $story->slug]) }}">Uredi vijest</a>
						<a class='btn btn-warning delete-link' href="{{ route('news.delete', ['slug' => $story->slug]) }}">Obriši vijest</a>
					@endif
				@endif
			</div>
		</div>
		<hr>
		<h3><a href="{{ route('news.story', ['slug' => $story->slug]) }}">{{ $story->title }}</a></h3>
		<p class="help-block"><span class="glyphicon glyphicon-dashboard"></span> {{ $story->created_at->format('d.m.Y. H:i') }}</p>
		<p>{{ $story->user->getFullName() }}</p>
	</div>
</header>
<div class="vijest">
	<img class='img-responsive img-rounded' src="{{ asset('img/news/' . $story->image) }}">
	<div class="vijest-body">
		<div class="container">
			<div class="letter">
				{!! Markdown::setMarkupEscaped(true)->parse($story->body) !!}
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
		text: "Vijest i svi podaci o njoj će biti izgubljeni!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Da, obriši vijest!",
		//closeOnConfirm: false
	},
		function(){
			location.href=that.attr('href');
		}
	);
});
</script>
@stop