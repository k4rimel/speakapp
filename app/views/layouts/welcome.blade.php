<!DOCTYPE html>
<html>
<head>
    @if(!Auth::check()) 
        <title>Welcome</title>
    @else 
        <title>Welcome {{Auth::user()->profile->firstname}}</title>
    @endif
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="js/bootstrap.min.js">
        <!-- <link rel="stylesheet" href="css/materialize.min.css"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">speakapp <span class="glyphicon glyphicon-comment"></span><small> alpha</small></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
         @if(!Auth::check())
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             {{ Form::open(array('url' => 'signin','class' => 'navbar-form navbar-right')) }}
            <div class="form-group">
                 {{ Form::email('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'username')) }}
            </div>
            <div class="form-group">
                 {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
            </div>
             {{ Form::submit('Submit', array('class' => 'btn btn-success')) }} {{ Form::close() }}
        </div>
         @else
        <ul class="nav navbar-nav navbar-right">
            <li class=""><a href="{{ route('profile.show', array(auth::user()->profile->toString())) }}">{{Auth::user()->username}}<span class="glyphicon glyphicon-triangle-bottom"></span></a></li>
            <li>
                <button style="margin-top: .5em;" class="btn btn-primary" type="button">
                Messages <span class="badge">4</span>
                </button>
            </li>
            <li>{{ HTML::linkRoute('profile.signout', 'Sign Out', array(), array('class' => 'btn')) }}</li>
        </ul>
         @endif
    </div>
</div>
</nav>
<div class="container">
     @yield('content')
</div>
</body>
</html>