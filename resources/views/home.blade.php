@extends('app')

@section('title'){{'Home'}}@stop

@section('content')
<header class='home-header'>
	<h1 class='parallax-title'>Udruga studenata Međimurja</h1>
</header>
<div class="container" style="margin-top:20px">
	<div class="row">
		<div class="col-sm-6">
			<img class="img-responsive home-logo" src="{{ asset('img/LOGOvektorski.png') }}" />
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
	<div class="home-news">
		<img class='img-responsive' src="{{ asset('img/vijesti.png') }}">
		@if(!$news->count())
		<p class="help-block" style="text-align:center">Trenutno nema ni jedne vijesti.</p>
		@else
			<div class="row">
			@foreach($news as $story)
				<div class="col-sm-6 col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								{{ $story->title }}
							</div>
						</div>
						<div class="panel-body">
							<a href="{{ route('news.story', ['slug'=>$story->slug]) }}"><img class='img-responsive img-rounded' src="{{ asset('img/news/' . $story->image) }}"></a>
							<p>{{ stripMarkdown(str_limit($story->body, 200)) }}</p>
							<a href="{{ route('news.story', ['slug'=>$story->slug]) }}"><button class='btn btn-default'>Pročitaj vijest</button></a>
						</div>
					</div>
				</div>
			@endforeach
			</div>
			<p style='text-align:right'><a href="{{ route('news.index') }}">Starije vijesti</a></p>
		@endif
	</div> <!-- end home-news -->
	<div class="home-projects">
		<img class='img-responsive' src="{{ asset('img/projekti.png') }}">
		@if(!$projects->count())
			<p class="help-block" style="text-align:center">Trenutno nema ni jednog projekta.</p>
		@else
			<div class="row">
			@foreach($projects as $project)
				<div class="col-sm-6 col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">{{ $project->title }}</div>
						</div>
						<div class="panel-body">
							<a href="{{ route('projects.project', ['slug'=>$project->slug]) }}"><img class='img-responsive img-rounded' src="{{ asset('img/projects/' . $project->image) }}"></a>
							<p>{{ stripMarkdown(str_limit($project->body, 200)) }}</p>
							<a href="{{ route('projects.project', ['slug'=>$project->slug]) }}"><button class='btn btn-default'>Više o projektu</button></a>
						</div>
					</div>
				</div>
			@endforeach
			</div>
			<p style='text-align:right'><a href="{{ route('projects.index') }}">Svi projekti</a></p>
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
</script>
@stop