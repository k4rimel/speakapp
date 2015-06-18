@extends('layouts.welcome')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'signup', 'class' => 'signup-form')) }}
		<div class="col-md-6 col-lg-6 col-md-offset-3">
			
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
					    {{ Form::label('firstname', 'Firstname', array('class' => 'signup-form-element')) }}
					    {{ Form::text('firstname', Input::old('firstname'), array('required' => 'required', 'class' => 'form-control signup-form-element')) }}
					</div> 
				</div>
				<div class="col-md-6 col-lg-6">
				    <div class="form-group">
				        {{ Form::label('lastname', 'Lastname', array('class' => 'signup-form-element')) }}
				        {{ Form::text('lastname', Input::old('lastname'), array('required' => 'required', 'class' => 'form-control signup-form-element')) }}
				    </div>
				</div>
			</div>
			 <div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
					    {{ Form::label('email', 'Email', array('class' => 'signup-form-element')) }}
					    {{ Form::email('email', Input::old('email'), array('required' => 'required', 'class' => 'form-control signup-form-element')) }}
					</div> 
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
					    {{ Form::label('birth_date', 'Birth date : ', array('class' => 'signup-form-element')) }}
					    {{ Form::input('birth_date','0000-00-00', Input::old('birth_date'), array('required' => 'required', 'class' => 'form-control datepicker signup-form-element')) }}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
					    {{ Form::label('spoken_languages[]', 'Spoken Languages :', array('class' => 'signup-form-element')) }}
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
					    {{ Form::label('languages_to_learn[]', 'Languages to learn :', array('class' => 'signup-form-element')) }}
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
					    {{ Form::label('password', 'Password :', array('class' => 'signup-form-element')) }}
					   	{{ Form::input('password', '', '', array('required' => 'required', 'class' => 'form-control password-input signup-form-element'))}}
					</div>
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
					    {{ Form::label('password_confirm', 'Confirm password :', array('class' => 'signup-form-element')) }}
					   	{{ Form::input('password_confirm', '', '', array('required' => 'required', 'class' => 'form-control password-confirm-input signup-form-element'))}}
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
<script type="text/javascript">

    $(document).ready(function() {
        
       	$('.datepicker').datepicker();
        $('.languages-to-learn-list').select2();
        $('.spoken-languages-list').select2();
        
    });

</script>
@stop