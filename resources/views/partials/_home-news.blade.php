<div class="row">
@foreach($news as $story)
	<div class="col-sm-6 col-md-3">
		<div class="story-out">
			<p class="help-block"><span class="glyphicon glyphicon-time"></span> {{ $story->created_at->format('d.m.Y. H:i') }}</p>
			<p class="help-block"><span class="glyphicon glyphicon-user"></span> {{ $story->user->getFullName() }}</p>
			<h4><a href="{{ route('news.story', ['slug'=>$story->slug]) }}" title="{{ $story->title }}">{{ str_limit($story->title, 50) }}</a></h4>
			<img class='img-responsive img-rounded' src="{{ asset('img/news/' . $story->image) }}">
			<p class='strip-story'>{{ stripMarkdown(str_limit($story->body, 100)) }}</p>
			<a class='btn btn-default' href="{{ route('news.story', ['slug'=>$story->slug]) }}">Pročitaj vijest</a>
		</div>
	</div>
@endforeach
</div>
<p style='text-align:right'><a href="{{ route('news.index') }}">Starije vijesti</a></p>
<hr style='border-color:#262626'>