<header class="profile">	
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<a href="{{ route('profile.index') }}"><h1><span class="glyphicon glyphicon-user"></span> Račun</h1></a>
			</div>
			<div class='links'>
				<a class='btn btn-default' href="{{ route('profile.edit') }}">Uredi račun</a>
				<a class='btn btn-warning' href="{{ route('profile.changepwd') }}">Promjeni lozinku</a>
			</div>
		</div>
	</div>
</header>