@extends('app')

@section('title'){{'Račun'}}@stop

@section('content')
@include('profile/_header')
<div class="container">
<p>Korisničko ime: <strong>{{ Auth::user()->username }}</strong></p>
<p>Ime: <strong>{{ Auth::user()->first_name }}</strong></p>
<p>Prezime: <strong>{{ Auth::user()->last_name }}</strong></p>
@if(Auth::user()->isAdmin())
<p><strong>Vi ste administrator</strong>!</p>
@endif
</div> <!-- /.container -->
@stop