<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="css/materialize.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Profile management</title>
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
</html>