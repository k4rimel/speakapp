<nav class="navbar navbar-default navbar-static-top top-bar">
<div class="container">
    <div class="navbar-header">
        <a class="navbar-brand navbar-collapse collapse" href="{{ route('main.index') }}">speakapp <span class="glyphicon glyphicon-comment"></span><small> alpha</small></a>
        <div class="input-group" id="adv-search">
            {{ Form::open(array('url' => 'search', 'class' => 'signup-form', 'method' => 'GET')) }}
            {{ Form::text('q', Input::old('q'), array('class' => 'form-control main-search-form-input', 'placeholder' => 'Search for people')) }}
            <!-- <input type="text" class="form-control main-search-form-input" placeholder="Search for people"> -->
            <div class="input-group-btn">
                <div class="btn-group" role="group">
                    <!-- <div class="dropdown dropdown-lg"> -->
                        <!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button> -->
                        <!-- <div class="dropdown-menu dropdown-menu-right" role="menu"> -->
                            <!-- <form class="form-horizontal" role="form" > -->
                             <!--    <div class="form-group">
                                   
                                </div>
                                <div class="form-group">
                                    <label for="contain">Is learning : </label>
                                    <input class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="contain">Contains the words</label>
                                    <input class="form-control" type="text" />
                                </div>
                                <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button> -->
                            <!-- </form> -->
                        <!-- </div> -->
                    <!-- </div> -->
                </div>
                    {{ Form::submit('Search', array('class' => 'btn btn-primary btn-main-search-form')) }}
                    <!-- <button type="submit" class="btn btn-primary btn-main-search-form"></button> -->
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
   
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
            {{ Form::submit(trans('top-bar.signin-button'), array('class' => 'btn btn-primary')) }} 
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
                    <img src="{{Auth::user()->profile->picture_small_url}}" class="img-circle" height="40" width="40">
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
</div>
</nav>
<script type="text/javascript">
    $(document).ready(function() {
        
        $('.avanded-search-spoken-languages-list').select2();
        $('.avanded-search-spoken-languages-list').click(function(event) {
            event.stopPropagation();
        });
        $('.dropdown-menu input, .dropdown-menu label .dropdown .avanded-search-spoken-languages-list').click(function(e) {
            e.stopPropagation();
        });
        $('.btn-main-search-form').click(function(event) {
            var query = $('.main-search-form-input').val();
            var url = "{{route('asearch', array('q="+query+"'))}}";
            $.ajax({
                type: "GET",
                url: url,
                success: function(data){
                    console.log('success');
                    console.log(data);
                },
                error: function(data, jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        });
        var mainContainer = $('.main.container');
        
        // $('.acceptFriendRequest').click(function(event) {
        //     var id = $(this).prop('data-id');
        //     var friendName = $(this).siblings('.friend-request-name');
        //     $.ajax({
        //         type: "POST",
        //         url: "",
        //         success: function(){
        //             mainContainer.prepend(successPanel);
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             alert(textStatus);
        //         }
        //     });
        // })
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