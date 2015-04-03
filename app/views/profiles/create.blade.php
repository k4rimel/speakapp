@extends('layouts.profile')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@section('content')

<h1>Create a profile</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'profiles')) }}

    <div class="form-group">
        {{ Form::label('firstname', 'Firstname') }}
        {{ Form::text('firstname', Input::old('firstname'), array('class' => 'form-control')) }}
    </div>    
    <div class="form-group">
        {{ Form::label('lastname', 'Lastname') }}
        {{ Form::text('lastname', Input::old('lastname'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>

        {{Former::select('spoken_languages')
        ->help('Spoken Languages : ')
        ->fromQuery($languages, 'name')}}
        {{Former::select('languages_to_learn')
        ->help('Languages to learn : ')
        ->fromQuery($languages, 'name')}}
       

    {{ Form::submit('Create the profile!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop