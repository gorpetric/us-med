@extends('app')

@section('title'){{'Kontakt'}}@stop

@section('content')
<iframe src="https://www.google.com/maps/d/embed?mid=ziUFdLgUkpvE.kLgMGBgNwIQY&z=17" width="100%" height="300px" frameborder="0"></iframe>
<div class="container">
<h1>Kontakt</h1><hr style='border-color:#262626' />
<div class="row">
	<div class="col-sm-7 contact-table">
		<div class="row">
			<div class="col-sm-3">Adresa:</div>
			<div class="col-sm-9">Ljudevita Gaja 2a, prvi polukat, 10 000 Zagreb</div>
		</div>
		<div class="row">
			<div class="col-sm-3">OIB:</div>
			<div class="col-sm-9">28396279066</div>
		</div>
		<div class="row">
			<div class="col-sm-3">IBAN:</div>
			<div class="col-sm-9">HR2423400091110513415</div>
		</div>
		<div class="row">
			<div class="col-sm-3">E-mail:</div>
			<div class="col-sm-9"><a href="mailto:udruga.studenata.medjimurja@gmail.com">udruga.studenata.medjimurja@gmail.com</a></div>
		</div>
		<div class="row">
			<div class="col-sm-3">Web:</div>
			<div class="col-sm-9"><a href="//us-medjimurje.hr">www.us-medjimurje.hr</a></div>
		</div>
	</div>
	<div class="col-sm-5">
		<h3 style='text-align:center'>Društvene mreže</h3>
		<div class="social-media">
			<a title='YouTube' target='_blank' href="https://www.youtube.com/channel/UC_7F2pfwq_lhOTTXqYrbcyQ"><img src="{{ asset('img/social-media-icons/youtube.png') }}" /></a>
			<a title='Facebook' target='_blank' href="https://www.facebook.com/UdrugaStudenataMedjimurja"><img src="{{ asset('img/social-media-icons/facebook.png') }}" /></a>
		</div>		
	</div>
</div> <!-- row -->
</div> <!-- container -->
@stop

