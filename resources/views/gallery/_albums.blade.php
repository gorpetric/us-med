<a class='album-link' href="{{ route('gallery.album', ['id' => $album->id]) }}">
	<div class="each-album">
		@if(!$album->images->count())
			@for($i=1; $i <= 4; $i++)
				<img src="{{ asset('img/no-image.png') }}">
			@endfor
		@elseif($album->images->count() == 1)
			<img src="{{ asset('img/gallery/thumbs/'.$album->images[0]->name.'') }}">
			@for($i=1; $i <= 3; $i++)
				<img src="{{ asset('img/no-image.png') }}">
			@endfor
		@elseif($album->images->count() == 2)
			<img src="{{ asset('img/gallery/thumbs/'.$album->images[0]->name.'') }}">
			<img src="{{ asset('img/gallery/thumbs/'.$album->images[1]->name.'') }}">
			@for($i=1; $i <= 2; $i++)
				<img src="{{ asset('img/no-image.png') }}">
			@endfor
		@elseif($album->images->count() == 3)
			<img src="{{ asset('img/gallery/thumbs/'.$album->images[0]->name.'') }}">
			<img src="{{ asset('img/gallery/thumbs/'.$album->images[1]->name.'') }}">
			<img src="{{ asset('img/gallery/thumbs/'.$album->images[2]->name.'') }}">
			<img src="{{ asset('img/no-image.png') }}">
		@else
			<img src="{{ asset('img/gallery/thumbs/'.$album->images[0]->name.'') }}">		
			<img src="{{ asset('img/gallery/thumbs/'.$album->images[1]->name.'') }}">		
			<img src="{{ asset('img/gallery/thumbs/'.$album->images[2]->name.'') }}">		
			<img src="{{ asset('img/gallery/thumbs/'.$album->images[3]->name.'') }}">		
		@endif
		<div class="info">
			<h4>{{ $album->title }}</h4>
			<h5>{{ $album->created_at->diffForHumans() }}</h5>
		</div>
	</div>
</a>