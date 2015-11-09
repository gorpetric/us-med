@extends('app')

@section('title'){{$album->title}}@stop

@section('content')
<div class="container">
	<h3><small>Album: </small>{{$album->title}}</h3><hr/>
	@if(!$album->images()->count())
		<p>Album prazan</p>
	@endif()
	
	@if(Auth::check())
		@if(Auth::user()->isAdmin())
			<form class="dropzone" id="dropzone-form" action="{{ route('gallery.insert', ['id'=>$album->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		@endif
	@endif
</div>
@stop