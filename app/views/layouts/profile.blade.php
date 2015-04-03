<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('nerds') }}">profile Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('profiles') }}">View All profiles</a></li>
        <li><a href="{{ URL::to('profiles/create') }}">Create a profile</a>
    </ul>
</nav>


@yield('content')


</div>
</body>