@extends('app')

@section('title'){{'Račun'}}@stop

@section('content')
@include('profile/_header')
<div class="container">
<p>Korisničko ime: <strong>{{ Auth::user()->username }}</strong></p>
<p>Ime: <strong>{{ Auth::user()->first_name }}</strong></p>
<p>Prezime: <strong>{{ Auth::user()->last_name }}</strong></p>
<p>Datum rođenja: <strong>{{ Auth::user()->birthday ? Auth::user()->birthday->format('d.m.Y.') : '' }}</strong></p>
<p>OIB: <strong>{{ Auth::user()->oib }}</strong></p>
<p>Fakultet: <strong>{{ Auth::user()->faculty }}</strong></p>
<p>Smjer: <strong>{{ Auth::user()->course }}</strong></p>
<p>Godina studija: <strong>{{ Auth::user()->year }}</strong></p>
<p>E-mail: <strong>{{ Auth::user()->email }}</strong></p>
<p>{{ Auth::user()->active ? 'Vaše članstvo je aktivno.' : 'Vaše članstvo NIJE aktivno.' }}</p>
@if(Auth::user()->isAdmin())
<p><strong>Vi ste administrator</strong>!</p>
@endif
</div> <!-- /.container -->
@stop