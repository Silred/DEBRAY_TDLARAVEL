@extends('app')

@section('title')
	@if($project)
		{{ $project->title }}
		@if(Auth::user()->is_admin())
            @if($project->active == 1)
                <h2 style="color: #56b056; font-weight: bold; float: right; margin: 0px">Project accepted</h2>
            @elseif($project->active == 2)
                <h2 style="color: #cc3e3a; font-weight: bold; float: right; margin: 0px">Project refused</h2>
            @else
                <form method="post" action='{{ url("project/") }}'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <input type="submit" style="float: right; margin: 10px;" name="confirmed" value="Confirmed" class="btn btn-success"/>
                    <input type="submit" style="float: right; margin: 10px;" name="rejected" value="Rejected" class="btn btn-danger"/>
                </form>
            @endif
        @endif
	@else
		Page does not exist
	@endif
@endsection

@section('title-meta')
<p>{{ $project->created_at->format('M d,Y \a\t h:i a') }}</p>
@endsection

@section('content')

@if($project)

    <div class="panel panel-default">
        <div class="panel-heading"><h3>Client name</h3></div>
        <div class="panel-body">
            <h4>{!! $project->client_name !!}</h4>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h3>Client address</h3></div>
        <div class="panel-body">
            <h4>{!! $project->client_adresse !!}</h4>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h3>Client mail</h3></div>
        <div class="panel-body">
            <h4>{!! $project->client_mail !!}</h4>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h3>Client phone number</h3></div>
        <div class="panel-body">
            <h4>{!! $project->client_phone !!}</h4>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h3>Client informations</h3></div>
        <div class="panel-body">
            <h4>{!! $project->client_info !!}</h4>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h3>Project type</h3></div>
        <div class="panel-body">
            <h4>{!! $project->project_type !!}</h4>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h3>Context</h3></div>
        <div class="panel-body">
            <h4>{!! $project->context !!}</h4>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h3>Need</h3></div>
        <div class="panel-body">
            <h4>{!! $project->need !!}</h4>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h3>Goals</h3></div>
        <div class="panel-body">
            <h4>{!! $project->goals !!}</h4>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h3>More informations</h3></div>
        <div class="panel-body">
            <h4>{!! $project->more_infos !!}</h4>
        </div>
    </div>


@else
404 error
@endif

@endsection
