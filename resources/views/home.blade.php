@extends('app')

@section('title'){{'Home'}}@stop

@section('content')
<header class='home-header'>
	@include('partials/_home-carousel')
	<!--<h1 class='parallax-title'>Udruga studenata Međimurja</h1>-->
</header>
<div class="container" style="margin-top:20px">
	<div class="row">
		<div class="col-sm-6">
			<img class="img-responsive home-logo" src="{{ asset('img/LOGOvektorski.png') }}" />
		</div>
		<div class="col-sm-6">
			<p><strong>Udruga studenata Međimurja</strong> jedna je od studentskih zavičajnih udruga koje djeluju na <strong>Sveučilištu u Zagrebu</strong> sa sjedištem u <strong>Ulici Ljudevita Gaja 2a</strong>. Cilj postojanja Udruge je okupljanje i povezivanje što većeg broja međimurskih studenata, te promicanje i zaštita njihovih interesa. Razmjena iskustava, organiziranje međusobnih druženja, stvaranje veza sa drugim srodnim udrugama te pomaganje novim studentima na početku njihovog fakultetskog obrazovanja samo su neke od aktivnosti koje Udruga promiče i kojim se bavi.</p>
			<p style='text-align:center'>
				<a href="{{ route('pages.vodstvo') }}">Vodstvo</a>
				<span class='glyphicon glyphicon-minus'></span>
				<a href="{{ route('pages.povijest') }}">Povijest</a>
				<span class='glyphicon glyphicon-minus'></span>
				<a href="{{ route('pages.statut') }}">Statut</a>
				<span class='glyphicon glyphicon-minus'></span>
				<a href="{{ route('pages.partners') }}">Partneri</a>
			</p>
		</div>
	</div>
	<div class="home-news">
		@if(!$news->count())
		<p class="help-block" style="text-align:center">Trenutno nema ni jedne vijesti.</p>
		@else
			@include('partials/_home-news')
		@endif
	</div> <!-- end home-news -->
	<div class="home-projects">
		@if(!$projects->count())
			<p class="help-block" style="text-align:center">Trenutno nema ni jednog projekta.</p>
		@else
			@include('partials/_home-projects')
		@endif
	</div><!-- end home-projects -->
</div>
@stop

@section('js')
<script type="text/javascript">
$(window).scroll(function(){
	var wScroll = $(this).scrollTop();
	$('.parallax-title').css({
		'transform': 'translate(0px, '+ wScroll /2 +'px)'
	});
});
$('.bg2, .bg3').html($('.bg1').html());
$('.carousel').carousel({
	pause: 'false'
});
</script>
@stop