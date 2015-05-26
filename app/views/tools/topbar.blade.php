<nav class="navbar navbar-default navbar-static-top">
<div class="container">
    <div class="navbar-header">
        <a class="navbar-brand navbar-collapse collapse" href="{{ route('main.index') }}">speakapp <span class="glyphicon glyphicon-comment"></span><small> alpha</small></a>
        {{ Form::open(array('route' => 'search' , 'class' => 'navbar-form pull-left', 'role'=>'search', 'method' => 'GET')) }}
            <div class="input-group">
                {{ Form::text('q', Input::old('q'), array('class' => 'form-control')) }}
                <div class="input-group-btn">
                   <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        {{ Form::close() }}
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
         @if(!Auth::check())
        <div class="collapse navbar-collapse">
            {{ Form::open(array('url' => 'signin','class' => 'navbar-form navbar-right')) }}
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                {{ Form::email('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'username')) }}
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
            </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-success')) }} 
            {{ Form::close() }}
        </div>
         @else
        <ul class="nav navbar-nav navbar-right">
            <!-- todo : retrieve messages from profile -->
            @if(count(Auth::user()->profile->latestPendingRequests()) > 0)
            <li>
                <div class="nav navbar-brand notifications-container">
                   <a href="#" class="notifications-link" data-toggle="dropdown">
                     <span class="glyphicon glyphicon-bell notifications"></span>
                     <span class="label label-danger">{{count(Auth::user()->profile->allPendingRequests())}}</span>
                   </a>
                   <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">
                        <div class="notification-heading">
                            <h4 class="menu-title-dropdown-header">Notifications</h4>
                        
                        </div>
                        <li class="divider"></li>
                        @foreach (Auth::user()->profile->latestPendingRequests() as $key => $req_profile)
                            <div class="notifications-wrapper">
                                <div class="notification-item">
                                    <h4 class="item-title friend-request-name">{{$req_profile->firstname.' '.$req_profile->lastname}}</h4>
                                    <a href="" class="friendButton acceptFriendRequest" data-id="{{$req_profile->id}}"><span class="glyphicon glyphicon-ok-circle pull-right friendNotificationIcon"></span></a>
                                    <a href="" class="friendButton denyFriendRequest" data-id="{{$req_profile->id}}"><span class="glyphicon glyphicon-remove-circle pull-right friendNotificationIcon"></span></a>
                                    <p class="item-info">Sent you a friend request</p>
                                </div>
                            </div>
                        @endforeach
                        @if(count(Auth::user()->profile->allPendingRequests()) > 3)
                            <li class="divider"></li>
                            <div class="notification-footer">
                                <a href="">
                                    <h4 class="menu-title pull-right">View all
                                        <i class="glyphicon glyphicon-circle-arrow-right"></i>
                                    </h4>
                                </a>
                            </div>
                        @endif
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
<script type="text/javascript">
    $(document).ready(function() {
        var mainContainer = $('.main.container');
        
        var successPanel = '<div class="alert alert-success alert-dismissable"><a class="panel-close close" data-dismiss="alert">×</a> <i class="fa fa-coffee"></i>Congratulations ! You and '++' are now friends !</div>';
        $('.acceptFriendRequest').click(function(event) {
            var id = $(this).prop('data-id');
            var friendName = $(this).siblings('.friend-request-name');
            $.ajax({
                type: "POST",
                url: "",
                success: function(){
                    mainContainer.prepend(successPanel);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                }
            });
        })
        // $('.denyFriendRequest').click(function(event) {
        //     var id = $(this).prop('data-id');
        //     alert(id);
        //     $.ajax({
        //         type: "POST",
        //         url: "",
        //         success: function(){
        //             alert( 'request sent !');
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             alert(textStatus);
        //         }
        //     });
        // })
    });
</script>