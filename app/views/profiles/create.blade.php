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
    <div class="form-group">
        {{ Form::label('birth_date', 'Birth date : ') }}
        {{ Form::input('birth_date','0000-00-00', Input::old('birth_date'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('spoken_languages[]', 'Spoken Languages :') }}
        {{ Form::select('spoken_languages[]', 
                        $languages,
                        Input::old('spoken_languages[]'), 
                        array('multiple' => 'true',
                              'class'    => 'form-control')) 
        }}
    </div>    
    <div class="form-group">
        {{ Form::label('languages_to_learn[]', 'Languages to learn :') }}
        {{ Form::select('languages_to_learn[]', 
                        $languages,
                        Input::old('languages_to_learn[]'), 
                        array('multiple' => 'true',
                              'class'    => 'form-control')) 
        }}
    </div>
    {{ Form::submit('Create the profile!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop