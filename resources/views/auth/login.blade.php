@extends('app')

@section('title'){{'Prijava'}}@stop

@section('content')
<div class="container">
	<form action="{{ route('auth.login') }}" method="POST" class="form-inline" autocomplete="off">
		<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
			<label for="username">Korisničko ime:</label>
			<input type="text" class="form-control" name="username" id="username" placeholder="Korisničko ime" value="{{ Request::old('username') ?: '' }}">
		</div>
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<label for="password">Lozinka:</label>
			<input type="password" class="form-control" name="password" id="password" placeholder="Lozinka">
		</div>
		<input type="submit" value="Prijava" class="btn btn-default">
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
</div>
@stop