@extends('app')

@section('title'){{'Uredi projekt'}}@stop

@section('content')
<div class="container">
	<h3>Uredi projekt: <small><a href="{{ route('projects.project', ['slug' => $project->slug]) }}">{{ $project->title }}</a></small></h3>
	<form action="{{ route('projects.edit', ['slug' => $project->slug]) }}" method="POST" autocomplete="off" enctype='multipart/form-data'>
		<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
			<label for="title">*Naslov:</label>
			<input type="text" name="title" id="title" class="form-control" placeholder="Naslov" value="{{ Request::old('title') ?: $project->title }}">
			@if($errors->has('title'))
				<p class="help-block">{{ $errors->first('title') }}</p>
			@endif
		</div>
		<div class="form-goup{{ $errors->has('body') ? ' has-error' : '' }}">
			<label for="body">*Sadržaj:</label>
			<textarea name="body" id="body" rows="10" class="form-control" placeholder="Sadržaj" style="resize:vertical">{{ Request::old('body') ?: $project->body }}</textarea>
			@if($errors->has('body'))
				<p class="help-block">{{ $errors->first('body') }}</p>
			@endif
		</div>
		<p class="help-block">
			Markdown is supported
			<span class="glyphicon glyphicon-minus"></span>
			<a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">cheatsheet</a>
		</p>
		<div class="form-goup{{ $errors->has('image') ? ' has-error' : '' }}" style='margin-bottom:20px'>
			<img class='img-responsive' src="{{ asset('img/projects/'.$project->image.'') }}" style='max-height:200px'>
			<label for="image">Nova slika:</label>
			<input type="file" name='image' id='image'>
			@if($errors->has('image'))
				<p class="help-block">{{ $errors->first('image') }}</p>
			@endif
		</div>
		<input type="submit" value="Uredi" class="btn btn-default">
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
</div>
@stop