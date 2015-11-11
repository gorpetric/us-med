@extends('app')

@section('title'){{'Home'}}@stop

@section('content')
<!--<header id='myCarousel' class='carousel slide'>
	<ol class="carousel-indicators">
		<li data-target='#myCarousel' data-slide-to='0' class="active"></li>
		<li data-target='#myCarousel' data-slide-to='1'></li>
		<li data-target='#myCarousel' data-slide-to='2'></li>
	</ol>
	<div class="carousel-inner" role='listbox'>
		<div class="item active">
			<img src="http://placehold.it/1920x400" />
			<div class="carousel-caption">
				<h3>Naslov1</h3>
			</div>
		</div>
		<div class="item">
			<img src="http://placehold.it/1920x400" />
			<div class="carousel-caption">
				<h3>Naslov2</h3>
			</div>
		</div>
		<div class="item">
			<img src="http://placehold.it/1920x400" />
			<div class="carousel-caption">
				<h3>Naslov3</h3>
			</div>
		</div>
	</div>
	<a class='laft carousel-control' href="#myCarousel" data-slide='prev'><span class="icon-prev"></span></a>
	<a class='right carousel-control' href="#myCarousel" data-slide='next'><span class="icon-next"></span></a>
</header>-->
<header>
	<h1 class='parallax-title'>Udruga studenata Međimurja</h1>
</header>
<div class="container">
	<h3>Home</h3>
	<div class="long" style="height:1000px"></div>
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