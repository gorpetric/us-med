@extends('app')

@section('title'){{'Postani član'}}@stop

@section('content')
<div class="container">
<h1>Postani član</h1><hr style='border-color:#262626' />
<p><strong>Zašto postati član Udruge studenata Međimurja?</strong></p>
<p style='text-align:justify'>Udruga studenata Međimurja  pomaže studentima u ostvarivanju njihovih prava posredovanjem u komunikaciji između studenata i upravnih tijela Sveučilišta i drugih institucija. Organizira prigodne manifestacije kojima nastoji podržati interese članova i studenata, te promovirati i njegovati tradiciju i običaje Međimurske županije. Cilj je Udruge da tvori zajednicu u kojoj se njezini članovi osjećaju ugodno, u kojoj se mogu međusobno družiti, zatražiti pomoć te da se i izvan svoje županije osjećaju kao kod kuće.</p>
<p><strong>Prava i obveze članova?</strong></p>
<p style='text-align:justify'>Prava i obveze članova Udruge definirana su Statutom, a članovi su pozvani da sudjeluju u svim aktivnostima Udruge, bivaju informirani o radu Udruge, imaju pravo birati i biti birani u tijela Udruge, mogu odlučivati u onim tijelima u kojima su članovi, nadziru djelovanje i zahtijevaju odgovornost tijela i pojedinaca u Udruzi, poštuju i provode odluke tijela Udruge i Statuta, izvršavaju povjerene zadatke, svojim djelovanjem moraju štititi interese, ugled, čast i imovinu Udruge, obvezuju se na redovito plaćanje godišnje članarine, a ukoliko ustvrde nepravilnosti u provedbi statuta, dužni su upozoriti Predsjedništvo.</p>
<p><strong>Kako postati članom?</strong></p>
<p style='text-align:justify'>Udruzi studenata Međimurja pristupa se ispunjavanjem pristupnice, čime se obvezuje na sudjelovanje u radu Udruge i poštivanje njenoga Statuta i drugih akata, kao i upravnih tijela. Novopridošli članovi plaćaju upisninu  u iznosu od 20,00 HRK. Pristupnica se može dobiti u sjedištu Udruge, sastancima, projektima ili bilo kojiom aktivnostima kojima se Udruga bavi. Drugi način je popunjavanje obrasca na ovoj stranici.</p>
<button class='btn btn-primary show-form'>Prikaži obrazac</button>
<div class="become-member-form">
	<form action="{{ route('pages.becomemember') }}" method="POST" autocomplete="off">
		<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
			<label for="first_name">Ime:</label>
			<input required type="text" name='first_name' id='first_name' value="{{ Request::old('first_name') ?: '' }}" placeholder='Ime' class="form-control" maxlength="20" autofocus>
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
		<input type="submit" value="Učlani se" class='btn btn-default'>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
</div>
</div>
@stop

@section('js')
<script type='text/javascript'>
$('.show-form').click(function(){
	$('.become-member-form').toggle('slow');
	$(this).text(function(i, text){
		return text === 'Prikaži obrazac' ? 'Sakrij obrazac' : 'Prikaži obrazac';
	});
});
</script>
@stop