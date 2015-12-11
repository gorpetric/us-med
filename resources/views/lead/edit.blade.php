@extends('app')

@section('title'){{'Vodstvo'}}@stop

@section('content')
<header class="pages-header">
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<h1><a href="{{ route('lead.index') }}"><span class="glyphicon glyphicon-king"></span> Vodstvo</a></h1>
			</div>
		</div>
	</div>
</header>
<div class="container">
	<p>Uređivanje člana vodstva: <strong>{{ $lead->getFullName() }}</strong></p>
	<p class="help-block">
		@if($lead->president)
			Ovaj član vodstva je <strong>predsjednik</strong>.
		@endif
		@if($lead->substitute)
			Ovaj član vodstva je <strong>zamjenik</strong>.
		@endif
		@if($lead->secretary)
			Ovaj član vodstva je <strong>tajnik</strong>.
		@endif
	</p>
	<form action="{{ route('lead.edit', ['id' => $lead->id]) }}" method='POST' enctype="multipart/form-data" autocomplete='off'>
		<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
			<label for="first_name">* Ime:</label>
			<input type="text" name='first_name' id='first_name' class='form-control' value="{{ Request::old('first_name') ?: $lead->first_name }}" placeholder='Ime' maxlength="20">
			@if($errors->has('first_name'))
				<p class="help-block">{{ $errors->first('first_name') }}</p>
			@endif
		</div>
		<div <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
			<label for="last_name">* Prezime:</label>
			<input type="text" name='last_name' id='last_name' class='form-control' value="{{ Request::old('last_name') ?: $lead->last_name }}" placeholder='Prezime' maxlength="30">
			@if($errors->has('last_name'))
				<p class="help-block">{{ $errors->first('last_name') }}</p>
			@endif
		</div>
		<div <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
			<label for="description">* Opis:</label>
			<textarea name="description" id="description" rows="5" class="form-control" placeholder="Opis" style="resize:vertical">{{ Request::old('description') ?: $lead->description }}</textarea>
			@if($errors->has('description'))
				<p class="help-block">{{ $errors->first('description') }}</p>
			@endif
		</div>
		<div <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
			<img class='img-responsive' src="{{ asset('img/udruga/vodstvo/'.$lead->image.'') }}" style='max-height:200px'>
			<label for="image">Nova slika:</label>
			<input type="file" name="image" id="image">
			@if($errors->has('image'))
				<p class="help-block">{{ $errors->first('image') }}</p>
			@endif
		</div>
		<div <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
			<label for="facebook">Facebook:</label>
			<input type="text" name='facebook' id='facebook' class='form-control' value="{{ Request::old('facebook') ?: $lead->facebook }}" placeholder='Link na Facebook račun'>
			@if($errors->has('facebook'))
				<p class="help-block">{{ $errors->first('facebook') }}</p>
			@endif
		</div>
		<div <div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }}">
			<label for="youtube">Youtube:</label>
			<input type="text" name='youtube' id='youtube' class='form-control' value="{{ Request::old('youtube') ?: $lead->youtube }}" placeholder='Link na Youtube račun'>
			@if($errors->has('youtube'))
				<p class="help-block">{{ $errors->first('youtube') }}</p>
			@endif
		</div>
		<div <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
			<label for="instagram">Instagram:</label>
			<input type="text" name='instagram' id='instagram' class='form-control' value="{{ Request::old('instagram') ?: $lead->instagram }}" placeholder='Link na Instagram račun'>
			@if($errors->has('instagram'))
				<p class="help-block">{{ $errors->first('instagram') }}</p>
			@endif
		</div>
		<div <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
			<label for="twitter">Twitter:</label>
			<input type="text" name='twitter' id='twitter' class='form-control' value="{{ Request::old('twitter') ?: $lead->twitter }}" placeholder='Link na Twitter račun'>
			@if($errors->has('twitter'))
				<p class="help-block">{{ $errors->first('twitter') }}</p>
			@endif
		</div>
		<div <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
			<label for="linkedin">LinkedIn:</label>
			<input type="text" name='linkedin' id='linkedin' class='form-control' value="{{ Request::old('linkedin') ?: $lead->linkedin }}" placeholder='Link na LinkedIn račun'>
			@if($errors->has('linkedin'))
				<p class="help-block">{{ $errors->first('linkedin') }}</p>
			@endif
		</div>
		<input class='btn btn-default' type="submit" value="Uredi">
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
</div>
@stop