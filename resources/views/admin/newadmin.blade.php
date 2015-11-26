@extends('app')

@section('title'){{'Novi admin'}}@stop

@section('content')
<div class="container">
<h1><a style='color:black;text-decoration:none' href="{{ route('admin.index') }}">Admin</a></h1>
<h3>Novi administrator</h3>
<hr style='border-color:#262626' />
<form action="{{ route('admin.newadmin') }}" method="POST" autocomplete="off">
	
	<input type="submit" value="Kreiraj" class="btn btn-default">
	<input type="hidden" name="_token" value="{{ Session::token() }}">
</form>
</div>
@stop