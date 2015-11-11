@extends('app')

@section('title'){{'Home'}}@stop

@section('content')
<header class='home-header'>
	<h1 class='parallax-title'>Udruga studenata Međimurja</h1>
</header>
<div class="container" style="margin-top:20px">
	<div class="row">
		<div class="col-sm-6">
			<img style="margin:0 auto" class="img-responsive img-circle" src="http://placehold.it/200x200" />
		</div>
		<div class="col-sm-6">
			<p><strong>Udruga studenata Međimurja</strong> jedna je od studentskih zavičajnih udruga koje djeluju na <strong>Sveučilištu u Zagrebu</strong> sa sjedištem u ulici <strong>Ilica 10/III</strong>. Cilj postojanja Udruge je okupljanje i povezivanje što većeg broja međimurskih studenata, te promicanje i zaštita njihovih interesa. Razmjena iskustava, organiziranje međusobnih druženja, stvaranje veza sa drugim srodnim udrugama te pomaganje novim studentima na početku njihovog fakultetskog obrazovanja samo su neke od aktivnosti koje Udruga promiče i kojim se bavi.</p>
			<p style='text-align:center'>
				<a href="#">Vodstvo</a>
				<span class='glyphicon glyphicon-minus'></span>
				<a href="#">Povijest</a>
				<span class='glyphicon glyphicon-minus'></span>
				<a href="#">Statut</a>
			</p>
		</div>
	</div>
	<img style='margin:0 auto; margin-top:40px' class='img-responsive' src="{{ asset('img/vijesti.png') }}">
	<img style='margin:0 auto; margin-top:40px' class='img-responsive' src="{{ asset('img/projekti.png') }}">
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
</script>
@stop