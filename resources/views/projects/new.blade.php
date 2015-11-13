@extends('app')

@section('title'){{'Novi projekt'}}@stop

@section('content')
<div class="container">
	<h3>Novi projekt</h3>
	<form action="{{ route('projects.new') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
		<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
			<label for="title">Naslov:</label>
			<input type="text" name="title" id="title" class="form-control" placeholder="Naslov" value="{{ Request::old('title') ?: '' }}">
			@if($errors->has('title'))
				<p class="help-block">{{ $errors->first('title') }}</p>
			@endif
		</div>
		<div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
			<label for="slug">URL:</label>
			<input type="text" name="slug" id="slug" class="form-control" placeholder="URL" value="{{ Request::old('slug') ?: '' }}">
			@if($errors->has('slug'))
				<p class="help-block">{{ $errors->first('slug') }}</p>
			@endif
		</div>
		<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
			<label for="image">Projekt banner:</label>
			<input type="file" name="image" id="image" class="form-control">
			@if($errors->has('image'))
				<p class="help-block">{{ $errors->first('image') }}</p>
			@endif
		</div>
		<div class="form-goup{{ $errors->has('body') ? ' has-error' : '' }}">
			<label for="body">Sadržaj:</label>
			<textarea name="body" id="body" rows="10" class="form-control" placeholder="Sadržaj" style="resize:vertical">{{ Request::old('body') }}</textarea>
			@if($errors->has('body'))
				<p class="help-block">{{ $errors->first('body') }}</p>
			@endif
		</div>
		<p class="help-block">Markdown is supported</p>
		<input type="submit" value="Objavi" class="btn btn-default">
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
</div>
@stop