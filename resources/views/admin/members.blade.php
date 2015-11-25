@extends('app')

@section('title'){{'Admin - članovi'}}@stop

@section('content')
<div class="container">
<h1><a style='color:black;text-decoration:none' href="{{ route('admin.index') }}">Admin</a></h1>
<h3>Članovi</h3>
<hr style='border-color:#262626' />
<p class='help-block'>Početni poredak: Prezime</p>
<p class='help-block'>1 (Aktivno) - Član platio članarinu / članarina važeća</p>
</div> <!-- /.container -->
<div class="container-fluid">
	<div class="table-responsive admin-members-table">
		<table class='table table-hover table-bordered'>
			<thead>
				<tr class='info'>
					<th><a href="{{ route('admin.members', ['order'=>'created_at']) }}">Kreirano</a></th>
					<th><a href="{{ route('admin.members', ['order'=>'first_name']) }}">Ime</th>
					<th><a href="{{ route('admin.members') }}">Prezime</th>
					<th><a href="{{ route('admin.members', ['order'=>'birthday']) }}">Datum rođenja</th>
					<th>OIB</th>
					<th>Fakultet</th>
					<th>Smjer</th>
					<th><a href="{{ route('admin.members', ['order'=>'year']) }}">Godina studija</th>
					<th>E-mail</th>
					<th><a href="{{ route('admin.members', ['order'=>'active']) }}">Aktivno<sup>1</sup></th>
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
						<td>{{ $user->birthday->format('d.m.Y.') }}</td>
						<td>{{ $user->oib }}</td>
						<td>{{ $user->faculty }}</td>
						<td>{{ $user->course }}</td>
						<td>{{ $user->year }}</td>
						<td>{{ $user->email }}</td>
						<td>
							@if($user->active)
								DA! <a class='delete-link' href="{{ route('admin.changeactive', ['id'=>$user->id]) }}" data-swal-text='Deaktivacija članarine ovog člana'>Deaktiviraj</a>
							@else
								NE! <a class='delete-link' href="{{ route('admin.changeactive', ['id'=>$user->id]) }}" data-swal-text='Aktivacija članarine ovog člana'>Aktiviraj</a>
							@endif
						</td>
						<td><a class='delete-link' href="{{ route('admin.deletemember', ['id'=>$user->id]) }}" data-swal-text='Član i svi podaci o njemu biti će izgubljeni'>Obriši</a></td>
					</tr>
				@endif
				@endforeach
				@endif
			</tbody>
		</table>
	</div> <!-- /.admin-members-table -->
</div> <!-- /.container-fluid -->
@stop

@section('js')
<script type='text/javascript'>
$('.delete-link').click(function(e){
	var that = $(this);
	e.preventDefault();
	swal({
		title: "Sigurno?",
		text: that.attr('data-swal-text'),
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Da, provedi akciju!",
		//closeOnConfirm: false
	},
		function(){
			location.href=that.attr('href');
		}
	);
});
</script>
@stop