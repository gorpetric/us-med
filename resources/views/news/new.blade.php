@extends('app')

@section('title'){{'Nova vijest'}}@stop

@section('content')
<div class="container">
	<div class="long" style="margin-top:70px"></div>
	<h3>Nova vijest</h3>
	<form action="{{ route('news.new') }}" method="POST">
		<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
			<label for="title">Naslov:</label>
			<input type="text" name="title" id="title" class="form-control" placeholder="Naslov">
			@if($errors->has('title'))
				<p class="help-block">{{ $errors->first('title') }}</p>
			@endif
		</div>
		<div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
			<label for="slug">URL:</label>
			<input type="text" name="slug" id="slug" class="form-control" placeholder="URL">
			@if($errors->has('slug'))
				<p class="help-block">{{ $errors->first('slug') }}</p>
			@endif
		</div>
		<div class="form-goup{{ $errors->has('body') ? ' has-error' : '' }}">
			<label for="body">Sadržaj:</label>
			<textarea name="body" id="body" rows="5" class="form-control" placeholder="Sadržaj" style="resize:vertical"></textarea>
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