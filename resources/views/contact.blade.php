@extends('app')

@section('title')
    Contact
@endsection

@section('content')

    <form action="{{ url("/contact") }}" method="post">
        <div class="form-group">
            <input required="required" placeholder="Email" type="email" name="email" class="form-control" />
        </div>
        <div class="form-group">
            <input required="required" placeholder="Name" type="text" name="name" class="form-control" />
        </div>
        <div class="form-group">
            <input required="required" placeholder="Subject" type="text" name="subject" class="form-control" />
        </div>
        <div class="form-group">
            <textarea name='message' placeholder="Message" class="form-control"></textarea>
        </div>
        <input type="submit" name='publish' class="btn btn-success" value="Send"/>
    </form>

@endsection