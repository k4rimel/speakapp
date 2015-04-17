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
<!--             <li>
                <button data-toggle="dropdown" style="margin-top: .5em;" class="btn btn-primary" type="button">
                Messages <span class="badge">7 </span> <b class="caret"></b>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#">Inbox
                            
                        </a>
                    </li>
                    <li>
                        <a href="#">Drafts
                            
                        </a>
                    </li>
                    <li>
                        <a href="#">Sent Messages
                            
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">Trash
                            
                        </a>
                    </li>
                </ul>
            </li> -->
<!--             <li class="dropdown">
                <span class="glyphicon glyphicon-bell pull-right"></span>
            </li> -->
            <li>
                <div class="nav navbar-brand notifications-container">
                   <a href="#" class="notifications-link" data-toggle="dropdown">
                     <span class="glyphicon glyphicon-bell notifications"></span>
                     <span class="label label-danger">3</span>
                   </a>
                   <ul class="dropdown-menu pull-center bullet">
                       <li>
                           <a href="">Notification 1
                           </a>
                       </li>
                        <li class="divider"></li>
                       <li>
                           <a href="#">Notification 2
                           </a>
                       </li>
                        <li class="divider"></li>
                       <li>
                           <a href="#">Notification 3
                           </a>
                       </li>
                   </ul>
                </div>
            </li>

            @if(Auth::user())
            <li class="dropdown">
                <!-- <a data-toggle="dropdown" href=""> -->
                <a data-toggle="dropdown" href="#">
                    <img src="http://placehold.it/40x40" class="img-circle">
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
           @endif
        </ul>
         @endif
    </div>
</div>
</nav>