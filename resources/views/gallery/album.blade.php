@extends('app')

@section('title'){{$album->title}}@stop

@section('content')
<div class="container">
	<h3><small>Album: </small>{{$album->title}}</h3><hr/>
	@if(!$album->images()->count())
		<p>Album prazan</p>
	@endif()
</div>
@stop