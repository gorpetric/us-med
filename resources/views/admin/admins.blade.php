@extends('app')

@section('title'){{'Admins'}}@stop

@section('content')
<div class="container">
<h1><a style='color:black;text-decoration:none' href="{{ route('admin.index') }}">Admin</a></h1>
<h3>Svi administratori</h3>
<hr style='border-color:#262626' />
<p class="help-block">Početni poredak: Prezime</p>
<div class="table-responsive admin-members-table">
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th><a href="{{ route('admin.admins', ['order' => 'created_at']) }}">Kreirano</a></th>
				<th><a href="{{ route('admin.admins') }}">Prezime</a></th>
				<th><a href="{{ route('admin.admins', ['order' => 'first_name']) }}">Ime</a></th>
				<th><a href="{{ route('admin.admins', ['order' => 'username']) }}">Korisničko ime</a></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<th>{{ $user->created_at->diffForHumans() }}</th>
					<th>{{ $user->last_name }}</th>
					<th>{{ $user->first_name }}</th>
					<th>{{ $user->username }}</th>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>
@stop