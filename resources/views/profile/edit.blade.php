@extends('app')

@section('title'){{'Račun'}}@stop

@section('content')
@include('profile/_header')
<div class="container">
<form action="{{ route('profile.edit') }}" method="POST" autocomplete="off">
	<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
		<label for="first_name">Ime:</label>
		<input required type="text" name='first_name' id='first_name' class='form-control' value="{{ Request::old('first_name') ?: Auth::user()->first_name }}" placeholder='Ime' maxlength="20">
		@if($errors->has('first_name'))
			<p class="help-block">{{ $errors->first('first_name') }}</p>
		@endif
	</div>
	<div <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
		<label for="last_name">Prezime:</label>
		<input required type="text" name='last_name' id='last_name' class='form-control' value="{{ Request::old('last_name') ?: Auth::user()->last_name }}" placeholder='Prezime' maxlength="30">
		@if($errors->has('last_name'))
			<p class="help-block">{{ $errors->first('last_name') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
		<label for="birthday">Datum rođenja:</label>
		<input required type="date" name='birthday' id='birthday' placeholder='Datum rođenja' class="form-control">
		<p class="help-block"><i>Old value:</i> {{ Auth::user()->birthday ? Auth::user()->birthday->format('d.m.Y.') : '' }}</p>
		@if($errors->has('birthday'))
			<p class="help-block">{{ $errors->first('birthday') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('oib') ? ' has-error' : '' }}">
		<label for="oib">OIB:</label>
		<input required type="text" name='oib' id='oib' value="{{ Request::old('oib') ?: Auth::user()->oib }}" placeholder='OIB' class="form-control">
		@if($errors->has('oib'))
			<p class="help-block">{{ $errors->first('oib') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('faculty') ? ' has-error' : '' }}">
		<label for="faculty">Fakultet:</label>
		<input required type="text" name='faculty' id='faculty' value="{{ Request::old('faculty') ?: Auth::user()->faculty }}" placeholder='Fakultet' class="form-control">
		@if($errors->has('faculty'))
			<p class="help-block">{{ $errors->first('faculty') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
		<label for="course">Smjer:</label>
		<input required type="text" name='course' id='course' value="{{ Request::old('course') ?: Auth::user()->course }}" placeholder='Smjer' class="form-control">
		@if($errors->has('faculty'))
			<p class="help-block">{{ $errors->first('course') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
		<label for="year">Godina studija:</label>
		<input required type="text" name='year' id='year' value="{{ Request::old('year') ?: Auth::user()->year }}" placeholder='Godina studija' class="form-control" maxlength="1">
		@if($errors->has('year'))
			<p class="help-block">{{ $errors->first('year') }}</p>
		@endif
	</div>
	<p><strong>Email:</strong> {{ Auth::user()->email }}</p>
	<input type="submit" value="Uredi" class="btn btn-default">
	<input type="hidden" name="_token" value="{{ Session::token() }}">
</form>
</div> <!-- /.container -->
@stop