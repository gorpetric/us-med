<div class="row">
@foreach($news as $story)
	<div class="col-sm-6 col-md-3">
		<div class="story-out">
			<img class='img-responsive' src="{{ asset('img/news/' . $story->image) }}">
			<div class="ostatak">
				<div class="info">
					<p class="help-block"><span class="glyphicon glyphicon-time"></span> {{ $story->created_at->format('d.m.Y.') }}</p>
					<h4><a href="{{ route('news.story', ['slug'=>$story->slug]) }}" title="{{ $story->title }}">{{ str_limit($story->title, 50) }}</a></h4>
					<p class='strip-story'>{{ stripMarkdown(str_limit($story->body, 100)) }}</p>
				</div>
				<a class='btn btn-default' href="{{ route('news.story', ['slug'=>$story->slug]) }}">Pročitaj vijest</a>
			</div>
		</div>
	</div>
@endforeach
</div>
<p style='text-align:right'><a href="{{ route('news.index') }}">Starije vijesti</a></p>