@extends('layouts.welcome')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<h1>main page</h1>
@stop