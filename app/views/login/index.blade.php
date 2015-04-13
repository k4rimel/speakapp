@extends('layouts.welcome')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h2 class="form-signin-heading">Sign up</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="container">
				{{ Form::open(array('url' => '/signup')) }}
					<div class="form-group">
				    {{ Form::text('firstname', Input::old('firstname'), array('class' => 'form-control', 'placeholder' => 'Firstname')) }}
					</div>
					<div class="form-group">
				    {{ Form::text('lastname', Input::old('lastname'), array('class' => 'form-control', 'placeholder' => 'Lastname')) }}
					</div>
					<div class="form-group">
					{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'Email')) }}	
					</div>
					<div class="form-group">
					{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
					</div>				
					{{ Form::submit('Create the profile!', array('class' => 'btn btn-lg btn-primary btn-block')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop