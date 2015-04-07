@extends('layouts.profile')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@section('content')

<h1>All the profiles</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Email</td>
            <td>Languages spoken</td>
            <td>Languages to learn</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    @foreach($profiles as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->firstname }}</td>
            <td>{{ $value->lastname }}</td>
            <td>{{ $value->email }}</td>
            <td>
            	
            	@foreach($value->languageSpoken as $res => $val)
					{{ ($res == count($value->languageSpoken) - 1 ? $val->name  : $val->name.',  ')}}
            	@endforeach
            	
            </td>            
            <td>
            	
            	@foreach($value->languagToLearn as $res => $val)
					{{ ($res == count($value->languagToLearn) - 1 ? $val->name  : $val->name.',  ')}}
            	@endforeach
            	
            </td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /profiles/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /profiles/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('profiles/' . $value->id) }}">Show</a>

                <!-- edit this nerd (uses the edit method found at GET /profiles/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('profiles/' . $value->id . '/edit') }}">Edit</a>
                <a class="btn btn-small btn-danger" href="{{ URL::to('profiles/' . $value->id . '/delete') }}">Delete</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop
