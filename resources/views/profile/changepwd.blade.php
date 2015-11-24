@extends('app')

@section('title'){{'Račun'}}@stop

@section('content')
@include('profile/_header')
<div class="container">
<form action="{{ route('profile.changepwd') }}" method="POST" autocomplete="off">
	<div class="form-group{{ $errors->has('old_pwd') ? ' has-error' : '' }}">
		<label for="old_pwd">Stara lozinka:</label>
		<input type="password" name='old_pwd' id='old_pwd' class='form-control' placeholder='Stara lozinka'>
		@if($errors->has('old_pwd'))
			<p class="help-block">{{ $errors->first('old_pwd') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('new_pwd') ? ' has-error' : '' }}">
		<label for="new_pwd">Nova lozinka:</label>
		<input type="password" name='new_pwd' id='new_pwd' class='form-control' placeholder='Nova lozinka'>
		@if($errors->has('new_pwd'))
			<p class="help-block">{{ $errors->first('new_pwd') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('new_pwd_repeat') ? ' has-error' : '' }}">
		<label for="new_pwd_repeat">Ponovi novu lozinku:</label>
		<input type="password" name='new_pwd_repeat' id='new_pwd_repeat' class='form-control' placeholder='Ponovi novu lozinku'>
		@if($errors->has('new_pwd_repeat'))
			<p class="help-block">{{ $errors->first('new_pwd_repeat') }}</p>
		@endif
	</div>
	<input type="submit" value="Promjeni lozinku" class="btn btn-default">
	<input type="hidden" name="_token" value="{{ Session::token() }}">
</form>
</div> <!-- /.container -->
@stop