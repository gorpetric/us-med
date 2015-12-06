@extends('app')

@section('title'){{'Prijava'}}@stop

@section('content')
<header class="pages-header">
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<h1><a href="{{ route('pages.vodstvo') }}"><span class="glyphicon glyphicon-user"></span> Prijava</a></h1>
			</div>
		</div>
	</div>
</header>
<div class="container login-page">
	<form action="{{ route('auth.login') }}" method="POST" class="form-inline" autocomplete="off">
		<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
			<label for="username">Korisničko ime:</label>
			<input type="text" class="form-control" name="username" id="username" placeholder="Korisničko ime" value="{{ Request::old('username') ?: '' }}" autofocus>
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