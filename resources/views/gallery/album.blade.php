@extends('app')

@section('title'){{$album->title}}@stop

@section('content')
<div class="container">
	<h3><small>Album: </small>{{$album->title}}</h3><hr/>
	@if(!$album->images()->count())
		<p>Album prazan</p>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div id="albumImages">
				<ul>
					@foreach($album->images as $image)
						<li style="list-style:none;float:left">
							<a href="{{ asset('img/gallery/'.$image->name.'') }}" target='_blank'>
								<img src="{{ asset('img/gallery/'.$image->name.'') }}" width=200 height=200 />
							</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	
	@if(Auth::check())
		@if(Auth::user()->isAdmin())
			<form class="dropzone" id="dropzoneForm" action="{{ route('gallery.insert', ['id'=>$album->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		@endif
	@endif
</div>
@stop

@section('js')
<script type="text/javascript">
Dropzone.options.dropzoneForm = {
	maxFilesize: 3,
	acceptedFiles: 'image/*',
	success: function(file, response){
		if(file.status == 'success'){
			handleDropzoneFileUpload.handleSuccess(response);
		} else {
			handleDropzoneFileUpload.handleError(response);
		}
	}
};
var baseUrl = "{{ url('/') }}";
var handleDropzoneFileUpload = {
	handleSuccess: function(response){
		var imgName = response.name;
		var imgPath = '/img/gallery/'+imgName;
		var fullPath = baseUrl+imgPath;
		var imageList = $('#albumImages ul');
		imageList.append('<li style="list-style:none;float:left"><a target="_blank" href="'+fullPath+'"><img src="'+fullPath+'" width=200 height=200 /></a></li>');
	},
	handleError: function(response){
		console.log('Error');
		console.log(response);
	}
};
</script>
@stop