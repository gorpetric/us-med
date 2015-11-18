<ul class="nav nav-tabs nav-justified">
	@for ($i=0; $i < $projects->count(); $i++)
		@if ($i == 0)
		<li class="active">
		@else
		<li>
		@endif
			<a href="#tab-{{ $i }}" data-toggle='tab'>{{ $projects[$i]->title }}</a>
		</li>
	@endfor
</ul>
<div class="tab-content">
	@for ($i=0; $i < $projects->count(); $i++)
		@if ($i == 0)
		<div class="tab-pane fade active in" id="tab-{{ $i }}">
		@else
		<div class="tab-pane fade" id="tab-{{ $i }}">
		@endif
			<div class="row">
				<div class="col-sm-5">
					<a href="{{ route('projects.project', ['slug'=> $projects[$i]->slug]) }}"><img class='img-responsive img-rounded' src="{{ asset('img/projects/' . $projects[$i]->image) }}"></a>
				</div>
				<div class="col-sm-7">
					<h4>{{ $projects[$i]->title }}</h4>
					<p>{{ stripMarkdown(str_limit($projects[$i]->body, 250)) }}</p>
					<a href="{{ route('projects.project', ['slug'=> $projects[$i]->slug]) }}"><button class='btn btn-default'>Više o projektu</button></a>
				</div>
			</div>
		</div>
	@endfor
</div>
<p style='text-align:right'><a href="{{ route('projects.index') }}">Svi projekti</a></p>