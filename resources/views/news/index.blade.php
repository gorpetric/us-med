@extends('app')

@section('title'){{'Vijesti'}}@stop

@section('content')
<div class="container">
	<h3>Vijesti</h3><hr/>
	@if(Auth::check())
		@if(Auth::user()->isAdmin())
			<a href="{{ route('news.new') }}"><button class="btn btn-default">Nova vijest</button></a>
			<hr/>
		@endif
	@endif
	@if(!$news->count())
		<p>Trenutno nema ni jedne vijesti.</p>
	@else
		@foreach ($news as $story)
			<h4><a href="{{ route('news.story', ['slug' => $story->slug]) }}">{{ $story->title }}</a></h4>
			{{ Markdown::parse($story->body) }}
			<p>{{ $story->created_at->diffForHumans() }}</p>
		@endforeach
	@endif
</div>
@stop