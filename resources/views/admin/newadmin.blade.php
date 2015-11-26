@extends('app')

@section('title'){{'Novi admin'}}@stop

@section('content')
<div class="container">
<h1><a style='color:black;text-decoration:none' href="{{ route('admin.index') }}">Admin</a></h1>
<h3>Novi administrator</h3>
<hr style='border-color:#262626' />
<p class="help-block">
	Za unos novog administratora postoje dvije opcije:<br>
	1. Unos potpuno novog - unosi se Ime, Prezime, Korisničko ime i Lozinka<br>
	<strong>ILI</strong><br>
	2. Odabir postojećeg člana - unosi se Korisničko ime, Lozinka i odabire se Postojeći član
</p>
<p class="help-block">
	Nikako <strong style='color:red'>NE</strong> popuniti / odabrati oboje (aplikacija u tom slučaju ne unosi ništa)
</p>
<p class="help-block">
	Prije unosa treba upitati budućeg administratora za željeno korisničko ime. <small>(Aplikacija provjerava da li je slobodno)</small>
</p>
<p class="help-block">
	Nasumičnu Lozinku unosite Vi. <small>Npr. neka kraća kombinacija imena i prezimena.</small>
</p>
<p class="help-block">
	Uneseno Korisničko ime i Lozinku nakon unosa dajete novom administratoru i dajete mu do znanja da može promijeniti lozinku nakon prijave u bilo koje vrijeme.
</p>
<form action="{{ route('admin.newadmin') }}" method="POST" autocomplete="off">
	<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
		<label for="first_name">Ime:</label>
		<input type="text" name='first_name' id='first_name' value="{{ Request::old('first_name') ?: '' }}" placeholder='Ime' class="form-control" maxlength="20" autofocus>
		@if($errors->has('first_name'))
			<p class="help-block">{{ $errors->first('first_name') }}</p>
		@endif
	</div>
	<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
		<label for="last_name">Prezime:</label>
		<input type="text" name='last_name' id='last_name' value="{{ Request::old('last_name') ?: '' }}" placeholder='Prezime' class="form-control" maxlength="30">
		@if($errors->has('last_name'))
			<p class="help-block">{{ $errors->first('last_name') }}</p>
		@endif
	</div>
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
	<div class="form-group{{ $errors->has('member') ? ' has-error' : '' }}">
		<label for="member">Postojeći član</label>
		<select name="member" id="member" class='form-control'>
			<option selected="true" disabled="disabled">Odaberi...</option>
			@if($users->count())
			@foreach($users as $user)
				<option value="{{ $user->id }}">{{ $user->getFullName() }}</option>
			@endforeach
			@endif
		</select>
		@if($errors->has('member'))
			<p class="help-block">{{ $errors->first('member') }}</p>
		@endif
	</div>
	<input type="submit" value="Kreiraj" class="btn btn-default">
	<input type="hidden" name="_token" value="{{ Session::token() }}">
</form>
</div>
@stop