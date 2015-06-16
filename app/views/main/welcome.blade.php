@extends('layouts.welcome')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="row main-header-text-container">
	<h2 class="main-header-text">{{trans('landing-page.header-text')}}</h2>
</div>
<div class="row">
	<div class="col-md-2 col-lg-2 col-md-offset-2 col-lg-offset-5">
		<a class="btn btn-primary" href="{{URL::route('main.signup')}}">
			{{trans('landing-page.start-button-text')}}
		</a>
	</div>
</div>
@stop