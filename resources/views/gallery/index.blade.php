@extends('app')

@section('title'){{'Galerija'}}@stop

@section('content')
<div class="container">
	<h3>Galerija</h3>
	@if(Auth::check())
		@if(Auth::user()->isAdmin())
			<hr/>
			<form action="{{ route('gallery.index') }}" method="POST" class="form-inline" autocomplete="off">
				<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
					<label for="title">Naslov: </label>
					<input type="text" name="title" id="title" placeholder="Naslov novog albuma" class="form-control" value="{{ Request::old('title') ?: '' }}">
				</div>
				<input type="submit" value="Kreiraj album" class="btn btn-default">
				<div class="form-group">
					@if($errors->has('title'))
						<p style="color:red">{{ $errors->first('title') }}</p>
					@endif
				</div>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
			<hr/>
		@endif
	@endif
	@if(!$albums->count())
		<p>Trenutno nema ni jednog albuma.</p>
	@else
		@foreach($albums as $album)
			<p>
				<a href="{{ route('gallery.album', ['id' => $album->id]) }}">{{ $album->title }}</a>
				- {{ $album->user->username }}
				- {{ $album->created_at->diffForHumans() }}
			</p>
		@endforeach
	@endif
</div>
@stop