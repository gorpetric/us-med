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
			<div class='links'>
				@if(Auth::check())
					@if(Auth::user()->isAdmin())
						<a class='btn btn-default' href="{{ route('lead.new') }}">Novi član vodstva</a>
					@endif
				@endif
			</div>
		</div>
	</div>
</header>
<div class="container">
	<div class="rest-flex">
	@foreach($leads as $lead)
		@if($lead->mainRow())
			<div class="lead-out">
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
					<p style='margin-top:10px'>
						@if(Auth::check())
							@if(Auth::user()->isAdmin())
								<a href="{{ route('lead.edit', ['id' => $lead->id]) }}">Uredi</a>
							@endif
						@endif
					</p>
				</div>
			</div>
		@endif
	@endforeach
	</div>
	<hr style='border-color:#262626'>
	<div class="rest-flex">
	@foreach($leads as $lead)
		@if(!$lead->mainRow())
			<div class="lead-out">
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
					<p style='margin-top:10px'>
						@if(Auth::check())
							@if(Auth::user()->isAdmin())
								<a href="{{ route('lead.edit', ['id' => $lead->id]) }}">Uredi</a>
								<span class="glyphicon glyphicon-minus"></span>
								<a class='delete-link' href="{{ route('lead.delete', ['id' => $lead->id]) }}">Obriši</a>
							@endif
						@endif
					</p>
				</div>
			</div>
		@endif
	@endforeach
	</div>
</div>
@stop

@section('js')
<script type='text/javascript'>
$('.delete-link').click(function(e){
	var that = $(this);
	e.preventDefault();
	swal({
		title: "Sigurno?",
		text: "Član vodstva i svi podaci o njemu će biti izgubljeni",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Da, provedi akciju!",
		//closeOnConfirm: false
	},
		function(){
			location.href=that.attr('href');
		}
	);
});
</script>
@stop