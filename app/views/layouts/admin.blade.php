<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dropdowns-enhancement.css">
    <link rel="stylesheet" href="/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="/css/datepicker.css">
    <link rel="stylesheet" href="/css/styles.css">
    <script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/dropdowns-enhancement.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
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