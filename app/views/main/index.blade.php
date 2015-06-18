@extends('layouts.profile')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if(!Auth::check()) 
    <h1>main page - guest</h1>
@else 
    <h1>main page - logged in</h1>
@endif
@stop