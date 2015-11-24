@extends('app')

@section('title'){{'Novi član'}}@stop

@section('content')
<div class="container">
<h1><a style='color:black;text-decoration:none' href="{{ route('admin.index') }}">Admin</a></h1>
<h3>Unos novog člana</h3>
<p class="help-block">Još ne radi u potpunosti</p>
<hr style='border-color:#262626' />
<form action="{{ route('admin.newmember') }}" method="POST" autocomplete="off">
	<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
		<label for="first_name">Ime:</label>
		<input required type="text" name='first_name' id='first_name' value="{{ Request::old('first_name') ?: '' }}" placeholder='Ime' class="form-control" maxlength="20">
		@if($errors->has('first_name'))
			<p class="help-block">{{ $errors->first('first_name') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
		<label for="last_name">Prezime:</label>
		<input required type="text" name='last_name' id='last_name' value="{{ Request::old('last_name') ?: '' }}" placeholder='Prezime' class="form-control" maxlength="30">
		@if($errors->has('last_name'))
			<p class="help-block">{{ $errors->first('last_name') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
		<label for="birthday">Datum rođenja:</label>
		<input required type="date" name='birthday' id='birthday' value="{{ Request::old('birthday') ?: '' }}" placeholder='Datum rođenja' class="form-control">
		@if($errors->has('birthday'))
			<p class="help-block">{{ $errors->first('birthday') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('oib') ? ' has-error' : '' }}">
		<label for="oib">OIB:</label>
		<input required type="text" name='oib' id='oib' value="{{ Request::old('oib') ?: '' }}" placeholder='OIB' class="form-control">
		@if($errors->has('oib'))
			<p class="help-block">{{ $errors->first('oib') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('faculty') ? ' has-error' : '' }}">
		<label for="faculty">Fakultet:</label>
		<input required type="text" name='faculty' id='faculty' value="{{ Request::old('faculty') ?: '' }}" placeholder='Fakultet' class="form-control">
		@if($errors->has('faculty'))
			<p class="help-block">{{ $errors->first('faculty') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
		<label for="course">Smjer:</label>
		<input required type="text" name='course' id='course' value="{{ Request::old('course') ?: '' }}" placeholder='Smjer' class="form-control">
		@if($errors->has('faculty'))
			<p class="help-block">{{ $errors->first('course') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
		<label for="year">Godina studija:</label>
		<input required type="text" name='year' id='year' value="{{ Request::old('year') ?: '' }}" placeholder='Godina studija' class="form-control" maxlength="1">
		@if($errors->has('year'))
			<p class="help-block">{{ $errors->first('year') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		<label for="email">E-mail:</label>
		<input required type="text" name='email' id='email' value="{{ Request::old('email') ?: '' }}" placeholder='E-mail' class="form-control">
		@if($errors->has('email'))
			<p class="help-block">{{ $errors->first('email') }}</p>
		@endif
	</div>
	<input type="submit" value="Kreiraj" class="btn btn-default">
	<input type="hidden" name="_token" value="{{ Session::token() }}">
</form>
</div>
@stop