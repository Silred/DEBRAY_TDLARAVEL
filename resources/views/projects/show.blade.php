@extends('app')

@section('title')
	@if($project)
		{{ $project->title }}
		@if(Auth::user()->is_admin()))
        <a href="{{  url('delete/'.$project->id.'?_token='.csrf_token()) }}" style="float: right; margin: 10px;" class="btn btn-success">Confirmed</a>
        <a href="{{  url('delete/'.$project->id.'?_token='.csrf_token()) }}" style="float: right; margin: 10px;" class="btn btn-danger">Refused</a>
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
