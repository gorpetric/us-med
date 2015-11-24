<header class="profile">	
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<h1><a href="{{ route('profile.index') }}"><span class="glyphicon glyphicon-user"></span> Račun</a></h1>
			</div>
			<div class='links'>
				<a class='btn btn-default' href="{{ route('profile.edit') }}">Uredi račun</a>
				<a class='btn btn-warning' href="{{ route('profile.changepwd') }}">Promjeni lozinku</a>
			</div>
		</div>
	</div>
</header>