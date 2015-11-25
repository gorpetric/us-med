@extends('app')

@section('title'){{'Admin'}}@stop

@section('content')
<div class="container">
<h1><a style='color:black;text-decoration:none' href="{{ route('admin.index') }}">Admin</a></h1><hr style='border-color:#262626' />
<a href="{{ route('admin.newmember') }}">Unos novog člana</a>
<span class="glyphicon glyphicon-minus"></span>
<a href="{{ route('admin.members') }}">Svi članovi</a>
</div>
@stop