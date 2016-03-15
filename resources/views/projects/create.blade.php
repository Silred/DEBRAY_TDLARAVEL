@extends('app')

@section('title')
Add New Project
@endsection

@section('content')

<form action="{{ url('/project/add') }}" method="post">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<input required="required" value="{{ old('title') }}" placeholder="Project Title" type="text" name = "title" class="form-control" />
	</div>

	<div class="form-group">
		<input required="required" value="{{ old('client_name') }}" placeholder="Client Name" type="text" name = "client_name" class="form-control" />
	</div>

	<div class="form-group">
		<input required="required" value="{{ old('client_adresse') }}" placeholder="Client adresse" type="text" name = "client_adresse" class="form-control" />
	</div>

    <div class="form-group">
        <input required="required" value="{{ old('client_phone') }}" placeholder="Client phone" type="tel" name = "client_phone" class="form-control" />
    </div>


    <div class="form-group">
		<input required="required" value="{{ old('client_mail') }}" placeholder="Client mail" type="email" name = "client_mail" class="form-control" />
	</div>

	<div class="form-group">
		<input required="required" value="{{ old('contact_name') }}" placeholder="Contact name" type="text" name = "contact_name" class="form-control" />
	</div>

	<div class="form-group">
		<input required="required" value="{{ old('contact_adresse') }}" placeholder="Contact adresse" type="text" name = "contact_adresse" class="form-control" />
	</div>

	<div class="form-group">
		<input required="required" value="{{ old('contact_mail') }}" placeholder="Contact mail" type="email" name = "contact_mail" class="form-control" />
	</div>

	<div class="form-group">
		<input required="required" value="{{ old('contact_phone') }}" placeholder="Contact phone" type="tel" name = "contact_phone" class="form-control" />
	</div>

	<div class="form-group">
		<textarea  placeholder="Client Info" name = "client_info" class="form-control"></textarea>
	</div>

    <div class="form-group">
        <select required="required" name = "project_type" class="form-control">
            <option value="Web site">Web site</option>
            <option value="3D">3D</option>
            <option value="2D Animation">2D Animation</option>
            <option value="Multimedia installation">Multimedia installation</option>
            <option value="Video game">Video game</option>
            <option value="DVD">DVD</option>
            <option value="Print">Print</option>
            <option value="CD-ROM">CD-ROM</option>
            <option value="Event">Event</option>
            <option value="Autre">Autre</option>
        </select>
    </div>

    <div class="form-group">
        <textarea  placeholder="Context" name="context" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <textarea  placeholder="Need" name="need" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <textarea  placeholder="Goals" name="goals" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <textarea  placeholder="More infos" name="more_infos" class="form-control"></textarea>
    </div>

	<input type="submit" name='publish' class="btn btn-success" value="Publish"/>
</form>
@endsection
