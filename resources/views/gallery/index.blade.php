@extends('app')

@section('title'){{'Galerija'}}@stop

@section('content')
<header class="gallery-header">
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<h1><a href="{{ route('gallery.index') }}"><span class="glyphicon glyphicon-camera"></span> Galerija</a></h1>
				<p class="help-block">Albumi sa fotografijama</p>
			</div>
			<div class='links'>
				@if(Auth::check())
					@if(Auth::user()->isAdmin())
						<form action="{{ route('gallery.index') }}" method="POST" class="form-inline" autocomplete="off">
							<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
								<input type="text" name="title" id="title" placeholder="Naslov novog albuma" class="form-control" value="{{ Request::old('title') ?: '' }}">
							</div>
							<input type="submit" value="Kreiraj album" class="btn btn-default">
							@if($errors->has('title'))
								<p style="color:red">{{ $errors->first('title') }}</p>
							@endif
							<input type="hidden" name="_token" value="{{ Session::token() }}">
						</form>
					@endif
				@endif
			</div>
		</div>
	</div>
</header>
<div class="container">
	@if(!$albums->count())
		<p>Trenutno nema ni jednog albuma.</p>
	@else
		<div class="albums-container">
		@foreach($albums as $album)
			@include('gallery/_albums')
		@endforeach
		</div>
	@endif
</div>
@stop