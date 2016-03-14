@extends('app')

@section('title')
Add New Project
@endsection

@section('content')

<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
	tinymce.init({
		selector : "textarea",
		plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
		toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
	}); 
</script>

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
        <input required="required" value="{{ old('client_phone') }}" placeholder="Client phone" type="text" name = "client_phone" class="form-control" />
    </div>


    <div class="form-group">
		<input required="required" value="{{ old('client_mail') }}" placeholder="Client mail" type="text" name = "client_mail" class="form-control" />
	</div>

	<div class="form-group">
		<input required="required" value="{{ old('contact_name') }}" placeholder="Contact name" type="text" name = "contact_name" class="form-control" />
	</div>

	<div class="form-group">
		<input required="required" value="{{ old('contact_adresse') }}" placeholder="Contact adresse" type="text" name = "contact_adresse" class="form-control" />
	</div>

	<div class="form-group">
		<input required="required" value="{{ old('contact_mail') }}" placeholder="Contact mail" type="text" name = "contact_mail" class="form-control" />
	</div>

	<div class="form-group">
		<input required="required" value="{{ old('contact_phone') }}" placeholder="Contact phone" type="text" name = "contact_phone" class="form-control" />
	</div>

	<div class="form-group">
		<input required="required" value="{{ old('client_info') }}" placeholder="Client Info" type="text" name = "client_info" class="form-control" />
	</div>

    <div class="form-group">
        <input required="required" value="{{ old('project_type') }}" placeholder="Project type" type="text" name = "project_type" class="form-control" />
    </div>

    <div class="form-group">
        <input required="required" value="{{ old('context') }}" placeholder="Context" type="text" name = "context" class="form-control" />
    </div>

    <div class="form-group">
        <input required="required" value="{{ old('need') }}" placeholder="Need" type="text" name = "need" class="form-control" />
    </div>

    <div class="form-group">
        <input required="required" value="{{ old('goals') }}" placeholder="Goals" type="text" name = "goals" class="form-control" />
    </div>

    <div class="form-group">
        <input required="required" value="{{ old('more_infos') }}" placeholder="More infos" type="text" name = "more_infos" class="form-control" />
    </div>

	<input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
</form>
@endsection
