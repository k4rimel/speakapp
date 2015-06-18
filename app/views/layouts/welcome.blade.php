<!DOCTYPE html>
<html>
<head>
    @if(!Auth::check()) 
        <title>Welcome</title>
    @else 
        <title>Welcome {{Auth::user()->profile->firstname}}</title>
    @endif
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dropdowns-enhancement.css">
    <link rel="stylesheet" href="/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/datepicker.css">
    <link rel="stylesheet" href="/css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/dropdowns-enhancement.js"></script>
    <script type="text/javascript" src="/js/select2.full.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>
<body id="signup-body">
    @include('tools.topbar')
    <div class="welcome-main-container">
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>
</html>