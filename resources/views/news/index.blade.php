@extends('app')

@section('title'){{'Vijesti'}}@stop

@section('content')
<div class="container">
	<h3>Vijesti</h3><hr/>
	@if(!$news->count())
		<p>Trenutno nema ni jedne vijesti.</p>
	@else
		@foreach ($news as $story)
			<h4>{{ $story->title }}</h4>
			<p>{{ $story->body }}</p>
			<p>{{ $story->created_at->diffForHumans() }}</p>
		@endforeach
	@endif
</div>
@stop