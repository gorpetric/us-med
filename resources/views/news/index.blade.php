@extends('app')

@section('title'){{'Vijesti'}}@stop

@section('content')
<header class="news-header">
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<h1><a href="{{ route('news.index') }}"><span class="glyphicon glyphicon-list-alt"></span> Vijesti</a></h1>
				<p class="help-block">Najnovije vijesti vezane uz Udrugu i ostalo</p>
			</div>
			<div class='links'>
				@if(Auth::check())
					@if(Auth::user()->isAdmin())
						<a class='btn btn-default' href="{{ route('news.new') }}">Nova vijest</a>
					@endif
				@endif
			</div>
		</div>
	</div>
</header>
@if(!$news->count())
	<p style='text-align:center'>Trenutno nema ni jedne vijesti.</p>
@else
	<div class="vijesti">
		<div class="prva">
			<div class="container">
				<img class='img-responsive img-rounded' src="{{ asset('img/news/' . $news[0]->image) }}">
				<a href="{{ route('news.story', ['slug' => $news[0]->slug]) }}"><h3>{{ $news[0]->title }}</h3></a>
				<p class="help-block"><span class="glyphicon glyphicon-dashboard"></span> {{ $news[0]->created_at->format('d.m.Y. H:i') }}</p>
				<a class='btn btn-info' href="{{ route('news.story', ['slug' => $news[0]->slug]) }}">Pročitaj vijest</a>
			</div>
		</div>
		@if($news->count() >= 2)
		<div class="container ostale">
			@for($i=1; $i < $news->count(); $i++)
				<div class="row svaka">
					<div class="col-lg-6 col-lg-offset-2 col-md-8 col-md-offset-1 col-sm-10">
						<a href="{{ route('news.story', ['slug' => $news[$i]->slug]) }}"><h4>{{ $news[$i]->title }}</h4></a>
						<p class="help-block"><span class="glyphicon glyphicon-dashboard"></span> {{ $news[$i]->created_at->format('d.m.Y. H:i') }}</p>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<a class='btn btn-info' href="{{ route('news.story', ['slug' => $news[$i]->slug]) }}">Pročitaj vijest</a>
					</div>
				</div>
			@endfor
		</div>
		@endif
	</div>
@endif
@stop