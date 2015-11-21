@extends('app')

@section('title'){{$album->title}}@stop

@section('content')
<header class="gallery-header">
	<div class="container">
		<div class="flex-container">
			<div class='title'>
				<a href="{{ route('gallery.index') }}"><h1><span class="glyphicon glyphicon-list-alt"></span> Galerija</h1></a>
			</div>
			<div class='links'>
				@if(Auth::check())
					@if(Auth::user()->isAdmin())
						<a class='btn btn-warning delete-link' href="{{ route('gallery.delete', ['id' => $album->id]) }}">Obriši album</a>
					@endif
				@endif
			</div>
		</div>
		<hr>
		<a href="{{ route('gallery.album', ['id' => $album->id]) }}"><h3>{{ $album->title }}</h3></a>
		<p class="help-block"><span class="glyphicon glyphicon-dashboard"></span> {{ $album->created_at->format('d.m.Y. H:i') }}</p>
	</div>
</header>
<div class="dz-bg">
	<div class="container">
		@if(Auth::check())
			@if(Auth::user()->isAdmin())
				<form class="dropzone" id="dropzoneForm" action="{{ route('gallery.insert', ['id'=>$album->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ Session::token() }}">
				</form>
				<p class="help-block">Slike se automatski postavljaju na server nakon odabira</p>
			@endif
		@endif
	</div>
</div>
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
		text: "Album i sve slike iz albuma će biti izgubljeni!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Da, obriši album!",
		//closeOnConfirm: false
	},
		function(){
			location.href=that.attr('href');
		}
	);
});
</script>
@stop