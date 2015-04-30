@extends('layouts.welcome')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="row">
	<div class="container">
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'signup')) }}
		<div class="col-md-6 col-lg-6 col-md-offset-3">
			<div class="row">
					<h2 class="form-signin-heading">Sign up</h2>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
					    {{ Form::label('firstname', 'Firstname') }}
					    {{ Form::text('firstname', Input::old('firstname'), array('required' => 'required', 'class' => 'form-control')) }}
					</div> 
				</div>
				<div class="col-md-6 col-lg-6">
				    <div class="form-group">
				        {{ Form::label('lastname', 'Lastname') }}
				        {{ Form::text('lastname', Input::old('lastname'), array('required' => 'required', 'class' => 'form-control')) }}
				    </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
					    {{ Form::label('email', 'Email') }}
					    {{ Form::email('email', Input::old('email'), array('required' => 'required', 'class' => 'form-control')) }}
					</div> 
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
					    {{ Form::label('birth_date', 'Birth date : ') }}
					    {{ Form::input('birth_date','0000-00-00', Input::old('birth_date'), array('required' => 'required', 'class' => 'form-control datepicker')) }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
					    {{ Form::label('spoken_languages[]', 'Spoken Languages :') }}
					    {{-- {{ Form::input('spoken_languages_input','', Input::old('spoken_languages_input'), array('required' => 'required', 'class' => 'form-control spoken-languages-input'))}} --}} 
					    {{ Form::select('spoken_languages[]', 
					                    $languages,
					                    Input::old('spoken_languages[]'), 
					                    array('multiple' => 'true',
					                          'required' => 'required', 'class'    => 'form-control spoken-languages-list')) 
					    }}
					</div>
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
					    {{ Form::label('languages_to_learn[]', 'Languages to learn :') }}
					    {{-- {{ Form::input('languages_to_learn_input','', Input::old('languages_to_learn_input'), array('required' => 'required', 'class' => 'form-control languages-to-learn-input'))}} --}}
					    {{ Form::select('languages_to_learn[]', 
					                    $languages,
					                    Input::old('languages_to_learn[]'), 
					                    array('multiple' => 'true',
					                          'required' => 'required', 'class'    => 'form-control languages-to-learn-list')) 
					    }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
					    {{ Form::label('password', 'Password :') }}
					   	{{ Form::input('password', '', '', array('required' => 'required', 'class' => 'form-control password-input'))}}
					</div>
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
					    {{ Form::label('password_confirm', 'Confirm password :') }}
					   	{{ Form::input('password_confirm', '', '', array('required' => 'required', 'class' => 'form-control password-confirm-input'))}}
					</div>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
	    			{{ Form::submit('Create the profile!', array('class' => 'btn btn-primary')) }}
				</div>
			</div>
		</div>
	{{ Form::close() }}
	</div>
</div>
<script type="text/javascript">

    $(document).ready(function() {
        
       	$('.datepicker').datepicker();
        $('.languages-to-learn-list').select2();
        $('.spoken-languages-list').select2();
        
    });

</script>

@stop