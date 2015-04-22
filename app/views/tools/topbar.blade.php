<nav class="navbar navbar-default navbar-static-top">
<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('main.index') }}">speakapp <span class="glyphicon glyphicon-comment"></span><small> alpha</small></a>
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
            <!-- todo : retrieve notifications (messages + requests) from profile -->
            @if(count(Auth::user()->profile->pendingRequests()) > 0)
            <li>
                <div class="nav navbar-brand notifications-container">
                   <a href="#" class="notifications-link" data-toggle="dropdown">
                     <span class="glyphicon glyphicon-bell notifications"></span>
                     <span class="label label-danger">{{count(Auth::user()->profile->pendingRequests())}}</span>
                   </a>
                    <ul class="dropdown-menu pull-center bullet">
                   @foreach (Auth::user()->profile->pendingRequests() as $key => $req_profile)
                            <li>
                                <a href="#">{{$req_profile->firstname.' '.$req_profile->lastname}}
                                    <span class="glyphicon glyphicon-ok pull-right acceptFriendRequest" data-id="{{$req_profile->id}}"></span>
                                    <span class="glyphicon glyphicon-remove pull-right"></span>
                                </a>
                            </li>
                            @if($key < count(Auth::user()->profile->pendingRequests()) -1)
                                <li class="divider"></li>
                            @endif
                   @endforeach
                    </ul>
                </div>
            </li>
            @endif
            <li class="dropdown">
                <!-- <a data-toggle="dropdown" href=""> -->
                <a data-toggle="dropdown" href="#">
                    <img src="/img/40x40.gif" class="img-circle">
                        {{Auth::user()->profile->firstname }}
                    <b class="caret"></b>
                    
                </a>
                <ul class="dropdown-menu profileTopBarMenu pull-center bullet">
                    <li>
                        <a href="{{ route('profile.show', array(auth::user()->profile->toString())) }}">Show my page
                            <span class="glyphicon glyphicon-user pull-right"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit', array(auth::user()->profile->toString())) }}">Edit profile
                            <span class="glyphicon glyphicon-edit pull-right"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">Settings
                            <span class="glyphicon glyphicon-cog pull-right"></span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('profile.signout', array(auth::user()->profile->toString())) }}">Sign Out
                            <span class="glyphicon glyphicon-log-out pull-right"></span>
                        </a>
                    </li>
                    <!-- <li>{{ HTML::linkRoute('profile.signout', 'Sign Out', array(), array('class' => 'btn')) }}</li> -->
                </ul>
            </li>
        </ul>
         @endif
    </div>
</div>
</nav>