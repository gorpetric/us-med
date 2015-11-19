@extends('app')

@section('title'){{'Vijesti'}}@stop

@section('content')
<!-- <header class="news-header"></header> -->
<div class="container">
	<h1>Vijesti</h1><hr style='border-color:#262626'>
	@if(Auth::check())
		@if(Auth::user()->isAdmin())
			<a href="{{ route('news.new') }}"><button class="btn btn-default">Nova vijest</button></a>
			<hr/>
		@endif
	@endif
	@if(!$news->count())
		<p>Trenutno nema ni jedne vijesti.</p>
	@else
		<div class="vijesti">
			<div class="prva">
				<div class="row">
					<div class="col-sm-6">
						<img class='img-responsive img-rounded' src="{{ asset('img/news/' . $news[0]->image) }}">
					</div>
					<div class="col-sm-6">
						<h3>
							<small>{{ $news[0]->created_at->format('d.m.Y. H:i') }}</small><br/>
							<a href="{{ route('news.story', ['slug' => $news[0]->slug]) }}">{{ $news[0]->title }}</a>
						</h3>
						<p>{{ stripMarkdown(str_limit($news[0]->body, 300)) }}</p>
						<a class='btn btn-default' href="{{ route('news.story', ['slug' => $news[0]->slug]) }}">Pročitaj vijest</a>
					</div>
				</div>
			</div>
			<div class="ostale">
				@if($news->count() >= 1)
				<hr style='border-color:#262626'>
				@for ($i=1; $i < $news->count(); $i++)
					<a class='ostala' href="{{ route('news.story', ['slug' => $news[$i]->slug]) }}">
						<h4>{{ $news[$i]->title }}</h4>
						<img class='img-responsive img-rounded' src="{{ asset('img/news/' . $news[$i]->image) }}">
						<p>{{ $news[$i]->created_at->format('d.m.Y. H:i') }}</p>
					</a>
				@endfor
				@endif
			</div>
		</div>
	@endif
</div>
@stop