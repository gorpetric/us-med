@extends('app')

@section('title'){{'Vodstvo'}}@stop

@section('content')
<header class="pages-header">
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<h1><a href="{{ route('lead.index') }}"><span class="glyphicon glyphicon-king"></span> Vodstvo</a></h1>
			</div>
		</div>
	</div>
</header>
<div class="container">
@foreach($leads as $lead)
<p>{{ $lead->getFullName() }}</p>
@endforeach
</div>
@stop