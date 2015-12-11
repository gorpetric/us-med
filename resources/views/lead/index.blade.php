@extends('app')

@section('title'){{'Vodstvo'}}@stop

@section('content')
<header class="pages-header">
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<h1><a href="{{ route('lead.index') }}"><span class="glyphicon glyphicon-king"></span> Vodstvo</a></h1>
				<p class='help-block'>
					<span class="glyphicon glyphicon-star"></span> Predsjednik
					<span class="glyphicon glyphicon-star-empty"></span> Zamjenik
					<span class="glyphicon glyphicon-euro"></span> Tajnik
				</p>
			</div>
		</div>
	</div>
</header>
<div class="container">
	<div class="row">
	@foreach($leads as $lead)
		@if($lead->mainRow())
			<div class="col-sm-4 lead-out">
				<div class="lead-in">
					<div class="info">
						{!! $lead->img() !!}
						<div class="text">{{ $lead->description }}</div>
					</div>
					<h4>
						{!! $lead->mainGlyphicon() !!}
						{{ $lead->getFullName() }}
					</h4>
					<div class="sm">
						@if($lead->facebook)
							<a target='_blank' href="{{ $lead->facebook }}"><img src="{{ asset('img/social-media-icons/facebook.png') }}"></a>
						@endif
						@if($lead->youtube)
							<a target='_blank' href="{{ $lead->youtube }}"><img src="{{ asset('img/social-media-icons/youtube.png') }}"></a>
						@endif
						@if($lead->instagram)
							<a target='_blank' href="{{ $lead->instagram }}"><img src="{{ asset('img/social-media-icons/instagram.png') }}"></a>
						@endif
						@if($lead->twitter)
							<a target='_blank' href="{{ $lead->twitter }}"><img src="{{ asset('img/social-media-icons/twitter.png') }}"></a>
						@endif
						@if($lead->linkedin)
							<a target='_blank' href="{{ $lead->linkedin }}"><img src="{{ asset('img/social-media-icons/linkedin.png') }}"></a>
						@endif
					</div>
				</div>
			</div>
		@else
			<div class="col-sm-3 lead-out">
				<div class="lead-in">
					<div class="info">
						{!! $lead->img() !!}
						<div class="text">{{ $lead->description }}</div>
					</div>
					<h4>{{ $lead->getFullName() }}</h4>
					<div class="sm">
						@if($lead->facebook)
							<a target='_blank' href="{{ $lead->facebook }}"><img src="{{ asset('img/social-media-icons/facebook.png') }}"></a>
						@endif
						@if($lead->youtube)
							<a target='_blank' href="{{ $lead->youtube }}"><img src="{{ asset('img/social-media-icons/youtube.png') }}"></a>
						@endif
						@if($lead->instagram)
							<a target='_blank' href="{{ $lead->instagram }}"><img src="{{ asset('img/social-media-icons/instagram.png') }}"></a>
						@endif
						@if($lead->twitter)
							<a target='_blank' href="{{ $lead->twitter }}"><img src="{{ asset('img/social-media-icons/twitter.png') }}"></a>
						@endif
						@if($lead->linkedin)
							<a target='_blank' href="{{ $lead->linkedin }}"><img src="{{ asset('img/social-media-icons/linkedin.png') }}"></a>
						@endif
					</div>
				</div>
			</div>
		@endif
	@endforeach
	</div>
</div>
@stop