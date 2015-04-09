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
<div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Brand</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          {{ Form::open(array('url' => 'signin','class' => 'navbar-form navbar-right')) }}
          
            <div class="form-group">
            {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'username')) }}  
            </div>

            <div class="form-group">
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
            </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
          {{ Form::close() }}
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

@yield('content')

</div>
</body>
</html>