@extends('app')

@section('title'){{'Admin - članovi'}}@stop

@section('content')
<div class="container">
<h1><a style='color:black;text-decoration:none' href="{{ route('admin.index') }}">Admin</a></h1>
<h3>Članovi</h3>
<hr style='border-color:#262626' />
<p class="help-block">
	1 (Aktivno) - Član platio članarinu / članarina važeća
</p>
</div> <!-- /.container -->
<div class="container-fluid">
	<div class="table-responsive admin-members-table">
		<table class='table table-hover table-bordered'>
			<thead>
				<tr class='info'>
					<th>Kreirano</th>
					<th>Ime</th>
					<th>Prezime</th>
					<th>Datum rođenja</th>
					<th>OIB</th>
					<th>Fakultet</th>
					<th>Smjer</th>
					<th>Godina studija</th>
					<th>E-mail</th>
					<th>Aktivno<sup>1</sup></th>
					<th>Akcija</th>
				</tr>
			</thead>
			<tbody>
				@if($users->count())
				@foreach($users as $user)
				@if(!$user->isAdmin())
					<tr>
						<td>{{ $user->created_at->diffForHumans() }}</td>
						<td>{{ $user->first_name }}</td>
						<td>{{ $user->last_name }}</td>
						<td>{{ $user->birthday }}</td>
						<td>{{ $user->oib }}</td>
						<td>{{ $user->faculty }}</td>
						<td>{{ $user->course }}</td>
						<td>{{ $user->year }}</td>
						<td>{{ $user->email }}</td>
						<td>
							@if($user->active)
								DA! <a href="#">Deaktiviraj</a>
							@else
								NE! <a href="#">Aktiviraj</a>
							@endif
						</td>
						<td><a href="#">Obriši</a></td>
					</tr>
				@endif
				@endforeach
				@endif
			</tbody>
		</table>
	</div> <!-- /.admin-members-table -->
</div> <!-- /.container-fluid -->
@stop