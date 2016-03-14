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
                <div class="list-group">
                    <div class="list-group-item">
                        <h3><a href="{{ url('/project/show'.$project->slug) }}">{{ $project->title }}</a>
                        </h3>
                        <p>{{ $project->created_at->format('M d,Y \a\t h:i a') }}</p>

                    </div>
                    <div class="list-group-item">
                        <article>

                        </article>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @endif

@endsection