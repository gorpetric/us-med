@extends('app')

@section('title'){{'Vijesti'}}@stop

@section('content')
<!-- <header class="news-header"></header> -->
<div class="container">
	<h1>Vijesti</h1><hr style='border-color:#262626'>
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
			{{ stripMarkdown(str_limit($story->body, 250)) }}
			<p>{{ $story->created_at->diffForHumans() }}</p>
		@endforeach
	@endif
</div>
@stop