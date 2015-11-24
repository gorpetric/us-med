@extends('app')

@section('title'){{'Račun'}}@stop

@section('content')
@include('profile/_header')
<div class="container">
<form action="{{ route('profile.edit') }}" method="POST" autocomplete="off">
	<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}"
		<label for="first_name">Ime:</label>
		<input type="text" name='first_name' id='first_name' class='form-control' value="{{ Request::old('first_name') ?: Auth::user()->first_name }}" placeholder='Ime'>
		@if($errors->has('first_name'))
			<p class="help-block">{{ $errors->first('first_name') }}</p>
		@endif
	</div>
	<div <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}"
		<label for="last_name">Prezime:</label>
		<input type="text" name='last_name' id='last_name' class='form-control' value="{{ Request::old('last_name') ?: Auth::user()->last_name }}" placeholder='Prezime'>
		@if($errors->has('last_name'))
			<p class="help-block">{{ $errors->first('last_name') }}</p>
		@endif
	</div>
	<input type="submit" value="Uredi" class="btn btn-default">
	<input type="hidden" name="_token" value="{{ Session::token() }}">
</form>
</div> <!-- /.container -->
@stop