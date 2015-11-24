@extends('app')

@section('title'){{'Partneri'}}@stop

@section('content')
<div class="container">
<h1>Partneri</h1><hr style='border-color:#262626' />
<div class="partneri">
	<div class="partner">
		<img class='img-responsive' src="{{ asset('img/partneri/med-zupanija.gif') }}" /></a>
		<h4>Međimurska županija</h4>
		<a class='btn btn-info' title="Međimurska županija" target='_blank' href="http://medjimurska-zupanija.hr/">Posjeti stranicu</a>
	</div>
	<div class="partner">
		<img class='img-responsive' src="{{ asset('img/partneri/clab.png') }}" /></a>
		<h4>C LAB</h4>
		<a class='btn btn-info' title="C-Lab" target='_blank' href="http://clab.hr/">Posjeti stranicu</a>
	</div>
	<div class="partner">
		<img class='img-responsive' src="{{ asset('img/partneri/med-vode.png') }}" /></a>
		<h4>Međimurske vode</h4>
		<a class='btn btn-info' title="Međimurske vode" target='_blank' href="http://medjimurske-vode.hr/">Posjeti stranicu</a>
	</div>
	<div class="partner">
		<img class='img-responsive' src="{{ asset('img/partneri/med-plin.png') }}" /></a>
		<h4>Međimurje plin</h4>
		<a class='btn btn-info' title="Međimurje plin" target='_blank' href="http://www.medjimurje-plin.hr/">Posjeti stranicu</a>
	</div>
	<div class="partner">
		<img class='img-responsive' src="{{ asset('img/partneri/grad-cakovec.gif') }}" /></a>
		<h4>Grad Čakovec</h4>
		<a class='btn btn-info' title="Grad Čakovec" target='_blank' href="http://www.cakovec.hr/">Posjeti stranicu</a>
	</div>
	<div class="partner">	
		<img class='img-responsive' src="http://placehold.it/200x200" /></a>
		<h4>Hortus Croatiae</h4>
		<a class='btn btn-info' title="Hortus Croatiae" target='_blank' href="http://projekti.hgk.hr/projects/9206-hortus-croatiae-vrt-hrvatske">Posjeti stranicu</a>
	</div>
	<div class="partner">
		<img class='img-responsive' src="{{ asset('img/partneri/opcina_nedelisce.gif') }}" /></a>
		<h4>Općina Nedelišće</h4>
		<a class='btn btn-info' title="Općina Nedelišće" target='_blank' href="http://nedelisce.hr/">Posjeti stranicu</a>
	</div>
	<div class="partner">
		<img class='img-responsive' src="{{ asset('img/partneri/msphoto_logo_black.png') }}" /></a>
		<h4>Mateo Simonovic Photography</h4>
		<a class='btn btn-info' title="Mateo Simonovic Photography" target='_blank' href="https://www.facebook.com/MateoSimonovicPhotography">Posjeti stranicu</a>
	</div>
</div> <!-- /.partneri -->
</div>
@stop