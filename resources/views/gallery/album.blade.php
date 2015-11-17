@extends('app')

@section('title'){{$album->title}}@stop

@section('content')
<div class="container">
	<h2 style='text-align:center'><small>Album</small><br/>{{$album->title}}</h2>
	@if(Auth::check())
		@if(Auth::user()->isAdmin())
			<form class="dropzone" id="dropzoneForm" action="{{ route('gallery.insert', ['id'=>$album->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
			<p class="help-block">Slike se automatski postavljaju na server nakon odabira</p>
		@endif
	@endif
	<hr style='border-color:#262626'>
</div>
<div class="container-fluid">
	@if(!$album->images()->count())
		<p>Album prazan</p>
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
	addRemoveLinks: true,
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
</script>
@stop