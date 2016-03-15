@extends('app')

@section('title')
    {{$title}}
@endsection

@section('content')

    @if( Auth::user()->is_admin())

    @if ( !$projects->count() )
        There is no project till now ... Wait for someone to post one ...
    @else
        <div class="">
            @foreach( $projects as $project )
                @if($project->active == 0)
                    <a href="{{ url('project/show/'.$project->slug) }}">
                        <div class="list-group">
                            <div class="list-group-item">
                                <h3>{{ $project->title }}</h3>
                                <p>{{ $project->created_at->format('M d,Y \a\t h:i a') }}</p>

                            </div>
                        </div>
                    </a>
                    @elseif($project->active == 1)
                            <a style="color: #ffffff!important;" href="{{ url('project/show/'.$project->slug) }}">
                        <div class="list-group">
                            <div class="list-group-item"  style="background-color: #56b056!important; color: #ffffff;">
                                <h3>{{ $project->title }}</h3>
                                <p>{{ $project->created_at->format('M d,Y \a\t h:i a') }}</p>

                            </div>
                        </div>
                            </a>
                    @else
                                    <a style="color: #ffffff!important;" href="{{ url('project/show/'.$project->slug) }}">
                        <div class="list-group">
                            <div class="list-group-item" style="background-color: #cc3e3a!important; color: #ffffff">
                                <h3>{{ $project->title }}</h3>
                                <p>{{ $project->created_at->format('M d,Y \a\t h:i a') }}</p>

                            </div>
                        </div>
                                    </a>
                @endif

            @endforeach
        </div>
    @endif

    @endif

@endsection