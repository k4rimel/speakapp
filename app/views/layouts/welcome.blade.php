<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js">
    <!-- <link rel="stylesheet" href="css/materialize.min.css"> -->
 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>
<body>
<!--
<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>
    @if(!Auth::check())
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      {{ Form::open(array('url' => 'signin','class' => 'navbar-form navbar-right')) }}
        <div class="form-group">
        {{ Form::email('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'username')) }}
        </div>
        <div class="form-group">
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
        </div>
        {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
      {{ Form::close() }}
    </div>
    @else
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <a href="#">Inbox <span class="badge">42</span></a>

    <button class="btn btn-primary" type="button">
      Messages <span class="badge">4</span>
    </button>
    <h5>{{Auth::user()->username}}</h5>
    </div>
    {{ HTML::linkRoute('profile.signout', 'Sign Out', array(), array('class' => 'btn')) }}
    @endif
  </div>
</nav>-->

<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">speakapp alpha</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
<!--           <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul> -->
          @if(!Auth::check())
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            {{ Form::open(array('url' => 'signin','class' => 'navbar-form navbar-right')) }}
              <div class="form-group">
              {{ Form::email('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'username')) }}
              </div>
              <div class="form-group">
              {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
              </div>
              {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
            {{ Form::close() }}
          </div>
          @else
          <ul class="nav navbar-nav navbar-right">
            <li class=""><a href="./">{{Auth::user()->username}}<span class="sr-only">(current)</span></a></li>
            <li><button style="margin-top: .5em;" class="btn btn-primary" type="button">
            Messages <span class="badge">4</span>
          </button></li>
            <li>{{ HTML::linkRoute('profile.signout', 'Sign Out', array(), array('class' => 'btn')) }}</li>
          </ul>
          @endif
        </div><!--/.nav-collapse -->
      </div>
    </nav>







<div class="container">
@yield('content')
</div>
</body>
</html>