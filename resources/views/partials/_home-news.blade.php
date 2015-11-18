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