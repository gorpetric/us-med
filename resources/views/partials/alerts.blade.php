@if (Session::has('info'))
<div class="container">
	<div class="alert alert-info" role="alert">
		{{ Session::get('info') }}
	</div>
</div>
@endif