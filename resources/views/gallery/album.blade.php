@extends('app')

@section('title'){{$album->title}}@stop

@section('content')
<header class="gallery-header">
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<h1><a href="{{ route('gallery.index') }}"><span class="glyphicon glyphicon-camera"></span> Galerija</a></h1>
			</div>
			<div class='links'>
				@if(Auth::check())
					@if(Auth::user()->isAdmin())
						<a class='btn btn-warning delete-link' href="{{ route('gallery.delete', ['id' => $album->id]) }}" data-swal-text="Album i sve slike iz albuma će biti izgubljeni!">Obriši album</a>
					@endif
				@endif
			</div>
		</div>
		<hr>
		<h3><a href="{{ route('gallery.album', ['id' => $album->id]) }}">{{ $album->title }}</a></h3>
		<p class="help-block"><span class="glyphicon glyphicon-dashboard"></span> {{ $album->created_at->format('d.m.Y. H:i') }}</p>
	</div>
</header>
@if(Auth::check())
	@if(Auth::user()->isAdmin())
		<div class="dz-bg">
			<div class="container">
				<form class="dropzone" id="dropzoneForm" action="{{ route('gallery.insert', ['id'=>$album->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ Session::token() }}">
				</form>
				<p class="help-block">Slike se automatski postavljaju na server nakon odabira</p>
			</div>
		</div>
	@endif
@endif
<div class="container-fluid">
	@if(!$album->images()->count())
		<p style='text-align:center'>Album prazan</p>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div id="albumImages">
				@foreach($album->images as $image)
					<a href="{{ asset('img/gallery/'.$image->name.'') }}" target='_blank' data-lightbox='album'>
						<img class='img-responsive' src="{{ asset('img/gallery/thumbs/'.$image->name.'') }}">
					</a>
					@if(Auth::check())
						@if(Auth::user()->isAdmin())
							<a class='delete-link' href="{{ route('gallery.deleteImage', ['id'=>$image->id]) }}" data-swal-text="Slika se kompletno gubi iz albuma.">Obriši</a>
						@endif
					@endif
				@endforeach
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
<script type="text/javascript">
var baseUrl = "{{ url('/') }}";
Dropzone.options.dropzoneForm = {
	maxFilesize: 3,
	//addRemoveLinks: true,
	acceptedFiles: 'image/*',
	success: function(file, response){
		if(file.status == 'success'){
			handleDropzoneFileUpload.handleSuccess(response);
		} else {
			handleDropzoneFileUpload.handleError(response);
		}
	}
};
var handleDropzoneFileUpload = {
	handleSuccess: function(response){
		var imgName = response.name;
		var imgPath = '/img/gallery/'+imgName;
		var thumbPath = '/img/gallery/thumbs/'+imgName;
		var fullPath = baseUrl+imgPath;
		var fullThumbPath = baseUrl+thumbPath;
		var imageList = $('#albumImages');
		imageList.append('<a target="_blank" href="'+fullPath+'" data-lightbox="album"><img class="img-responsive" src="'+fullThumbPath+'"></a>');
	},
	handleError: function(response){
		console.log('Error');
		console.log(response);
	}
};
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