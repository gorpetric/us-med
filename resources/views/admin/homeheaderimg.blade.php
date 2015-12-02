@extends('app')

@section('title'){{'Admin'}}@stop

@section('content')
<div class="container">
<h1><a style='color:black;text-decoration:none' href="{{ route('admin.index') }}">Admin</a></h1>
<h3>Početna slika</h3>
<hr style='border-color:#262626' />
<p><i>Početna slika</i> omogućava promjenu jednu od 3 slika koje se nalaze na početnoj stranici.</p>
@if($img)
	<img class='img-responsive' src="{{ asset('img/udruga/homeheaderimg.jpg') }}" style="width:250px;height:200px;margin-bottom:10px">
	<a href="{{ route('admin.homeheaderimg', ['action' => 'remove']) }}">Ukloni trenutnu sliku</a>
@else
	<form action="{{ route('admin.homeheaderimg') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
		<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
			<label for="image">Slika:</label>
			<input type="file" name="image" id="image" class="form-control">
			@if($errors->has('image'))
				<p class="help-block">{{ $errors->first('image') }}</p>
			@endif
		</div>
		<input type="submit" value="Postavi" class="btn btn-default">
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
@endif
</div>
@stop