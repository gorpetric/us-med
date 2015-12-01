@extends('app')

@section('title'){{'Novi admin'}}@stop

@section('content')
<div class="container">
<h1><a style='color:black;text-decoration:none' href="{{ route('admin.index') }}">Admin</a></h1>
<h3>Novi administrator</h3>
<hr style='border-color:#262626' />
<p>S obzirom da član <strong>{{ $user->getFullName() }}</strong> još nema korisnički račun, isti je potrebno kreirati.</p>
<p class='help-block'>Prije unosa treba upitati budućeg administratora za željeno korisničko ime. <small>(Aplikacija provjerava da li je slobodno)</small></p>
<p class="help-block">Nasumičnu Lozinku unosite Vi. <small>(Npr. neka kraća kombinacija imena i prezimena)</small></p>
<p class="help-block">Uneseno Korisničko ime i Lozinku nakon unosa dajete novom administratoru i dajete mu do znanja da može promijeniti lozinku nakon prijave u bilo koje vrijeme.</p>
<form action="{{ route('admin.newadmin', ['id'=>$user->id]) }}" method="POST" autocomplete="off">
	<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
		<label for="username">Korisničko ime:</label>
		<input type="text" name='username' id='username' value="{{ Request::old('username') ?: '' }}" placeholder='Korisničko ime' class="form-control">
		@if($errors->has('username'))
			<p class="help-block">{{ $errors->first('username') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		<label for="password">Lozinka:</label>
		<input type="text" name='password' id='password' value="{{ Request::old('password') ?: '' }}" placeholder='Lozinka' class="form-control">
		@if($errors->has('password'))
			<p class="help-block">{{ $errors->first('password') }}</p>
		@endif
	</div>
	<input type="submit" value="Postavi" class="btn btn-default">
	<input type="hidden" name="_token" value="{{ Session::token() }}">
</form>
</div>
@stop