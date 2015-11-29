@foreach($projects as $project)
	<h4><a href="{{ route('projects.project', ['slug'=>$project->slug]) }}">{{ $project->title }}</a></h4>
	<p class="help-block"><span class="glyphicon glyphicon-time"></span> {{ $project->created_at->format('d.m.Y.') }}</p>
	<p>{{ stripMarkdown(str_limit($project->body, 200)) }}</p>
@endforeach
<p style='text-align:right'><a href="{{ route('projects.index') }}">Svi projekti</a></p>