@extends('app')

@section('title'){{'Vijesti'}}@stop

@section('content')
<div class="container">
	<h3>Vijesti</h3><hr/>
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