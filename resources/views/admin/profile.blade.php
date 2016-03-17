@extends('app')

@section('title')
{{ $user->name }}
@endsection

@section('content')


<div>
	<ul class="list-group">
		<li class="list-group-item">
			Joined on {{$user->created_at->format('M d,Y \a\t h:i a') }}
		</li>
		<li class="list-group-item panel-body">
			<table class="table-padding">
				<style>
					.table-padding td{
						padding: 3px 8px;
					}
				</style>
				<form method="post" action='{{ url('/user/'.Auth::id()) }}'>
				<tr>
					<div class="panel panel-default">
						<div class="panel-heading"><h3>Name</h3></div>
						<div class="panel-body">
							<input class="form-control" name="name" type="text" value="{{Auth::user()->name}}" />
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						</div>
					</div>

				</tr>
				<tr>
					<div class="panel panel-default">
						<div class="panel-heading"><h3>Email</h3></div>
						<div class="panel-body">
							<input class="form-control" name="email"  type="email" value="{{Auth::user()->email}}"/>
						</div>
					</div>
						<input type="submit" value="Change"/>
				</tr>
				</form>
			</table>
		</li>
	</ul>
</div>
@endsection
