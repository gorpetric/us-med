@extends('app')

@section('title'){{'Uredi vijest'}}@stop

@section('content')
<div class="container">
	<h3>Uredi vijest: <small><a href="{{ route('news.story', ['slug' => $story->slug]) }}">{{ $story->title }}</a></small></h3>
	<form action="{{ route('news.edit', ['slug' => $story->slug]) }}" method="POST" autocomplete="off">
		<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
			<label for="title">Naslov:</label>
			<input type="text" name="title" id="title" class="form-control" placeholder="Naslov" value="{{ Request::old('title') ?: $story->title }}">
			@if($errors->has('title'))
				<p class="help-block">{{ $errors->first('title') }}</p>
			@endif
		</div>
		<div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
			<label for="slug">URL:</label>
			<input type="text" name="slug" id="slug" class="form-control" placeholder="URL" value="{{ Request::old('slug') ?: $story->slug }}" disabled>
			@if($errors->has('slug'))
				<p class="help-block">{{ $errors->first('slug') }}</p>
			@endif
		</div>
		<div class="form-goup{{ $errors->has('body') ? ' has-error' : '' }}">
			<label for="body">Sadržaj:</label>
			<textarea name="body" id="body" rows="5" class="form-control" placeholder="Sadržaj" style="resize:vertical">{{ Request::old('body') ?: $story->body }}</textarea>
			@if($errors->has('body'))
				<p class="help-block">{{ $errors->first('body') }}</p>
			@endif
		</div>
		<p class="help-block">Markdown is supported</p>
		<input type="submit" value="Uredi" class="btn btn-default">
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
</div>
@stop