<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="{{ route('home') }}" class="navbar-brand">Udruga studenata Međimurja</a>
		</div> <!-- navbar-header -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ route('news.index') }}">Vijesti</a></li>
				<li><a href="{{ route('projects.index') }}">Projekti</a></li>
				<li><a href="{{ route('gallery.index') }}">Galerija</a></li>
				<li><a href="#">Kontakt</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">O nama <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Vodstvo</a></li>
						<li><a href="#">Povijest</a></li>
						<li><a href="#">Statut</a></li>
					</ul>
				</li>
				<li><a href="#">Partneri</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Korisni linkovi <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Zdrastvo</a></li>
						<li><a href="#">ZEP</a></li>
					</ul>
				</li>
				@if(Auth::check())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->getName() }} <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('auth.logout') }}">Odjava</a></li>
					</ul>
				</li>
				@else
				<li><a href="{{ route('auth.login') }}">Prijava</a></li>
				@endif
			</ul>		
		</div> <!-- collapse -->
	</div> <!-- container-fluid -->
</nav>