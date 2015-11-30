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
			<p style="text-align:justify"><strong>Udruga studenata Međimurja</strong> jedna je od studentskih zavičajnih udruga koje djeluju na <strong>Sveučilištu u Zagrebu</strong> sa sjedištem u <strong>Ulici Ljudevita Gaja 2a</strong>. Cilj postojanja Udruge je okupljanje i povezivanje što većeg broja međimurskih studenata, te promicanje i zaštita njihovih interesa. Razmjena iskustava, organiziranje međusobnih druženja, stvaranje veza sa drugim srodnim udrugama te pomaganje novim studentima na početku njihovog fakultetskog obrazovanja samo su neke od aktivnosti koje Udruga promiče i kojim se bavi.</p>
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
</div>
<div class="container">
	<div class="home-news">
		@if(!$news->count())
		<p class="help-block" style="text-align:center">Trenutno nema ni jedne vijesti.</p>
		@else
			@include('partials/_home-news')
		@endif
	</div> <!-- end home-news -->
</div>
<div class="home-become-member">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h3>Postani član</h3>
				<p>Udruga studenata Međimurja pomaže studentima u ostvarivanju njihovih prava posredovanjem u komunikaciji između studenata i upravnih tijela Sveučilišta i drugih institucija. Organizira prigodne manifestacije kojima nastoji podržati interese članova i studenata, te promovirati i njegovati tradiciju i običaje Međimurske županije. Cilj je Udruge da tvori zajednicu u kojoj se njezini članovi osjećaju ugodno, u kojoj se mogu međusobno družiti, zatražiti pomoć te da se i izvan svoje županije osjećaju kao kod kuće.</p>
				<a href="{{ route('pages.becomemember') }}"><button>Kako postati član?</button></a>
			</div>
		</div>
	</div>
</div>
<div class="container">
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

	var colSelect = $('.home-news .row .col-sm-6');
	if(colSelect.length && wScroll > colSelect.offset().top - ($(window).height() / 1.2)){
		colSelect.each(function(i){
			setTimeout(function(){
				colSelect.eq(i).addClass('is-showing');
			}, 300 * (i+1));
		});
	}
});
$('.bg2, .bg3').html($('.bg1').html());
$('.carousel').carousel({
	pause: 'false'
});
function equalHeight(){
	var maxh = 0;
	$('.story-out').each(function(){
		$(this).height('auto');
		if($(this).height() > maxh){
			maxh=$(this).height();
		}
	});
	$('.story-out').height(maxh);
}
equalHeight();
setInterval(function(){
	equalHeight();
},0);
</script>
@stop