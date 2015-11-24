<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="{{ route('home') }}" class="navbar-brand"><img src="{{ asset('img/logo36x36.png') }}" />USM</a>
		</div> <!-- navbar-header -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home"></span></a></li>
				<li><a href="{{ route('news.index') }}">Vijesti</a></li>
				<li><a href="{{ route('projects.index') }}">Projekti</a></li>
				<li><a href="{{ route('gallery.index') }}">Galerija</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">O nama <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('pages.vodstvo') }}">Vodstvo</a></li>
						<li><a href="{{ route('pages.povijest') }}">Povijest</a></li>
						<li><a href="{{ route('pages.statut') }}">Statut</a></li>
						<li><a href="{{ route('pages.partners') }}">Partneri</a></li>
					</ul>
				</li>
				<li><a href="{{ route('pages.kontakt') }}">Kontakt</a></li>
				@if(Auth::check())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"><span class="caret"></span></a>
					<ul class="dropdown-menu">
						@if(Auth::user()->isAdmin())
							<li><a href="{{ route('admin.index') }}">ADMIN</a></li>
						@endif
						<li><a href="{{ route('profile.index') }}">Moj račun</a></li>
						<li><a href="{{ route('auth.logout') }}">Odjava</a></li>
					</ul>
				</li>
				@else
				<li><a href="{{ route('auth.login') }}"><span class="glyphicon glyphicon-user"></span></a></li>
				@endif
			</ul>		
		</div> <!-- collapse -->
	</div> <!-- container-fluid -->
</nav>