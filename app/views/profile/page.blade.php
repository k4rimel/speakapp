@extends('layouts.profile')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
 <div class="container target">
    @if(Auth::check())
    <div class="row">
        <div class="col-sm-3">
            <a style="width:140px; margin:0 auto; display: block;" href="{{route('profile.show', array('profile', Auth::user()->profile))}}" class="center-block text-­center">
                <img title="profile image" class="img-circle img-responsive" src="/img/140x140.gif">
            </a>

        </div>
        <div class="col-sm-9">
            <h1 class="">{{$profile->firstname.' '.$profile->lastname}}</h1>
            @if($status == 1)
            <a href="" class="btn btn-default disabled"><i class="glyphicon glyphicon-check"></i> Friends</a>
            @elseif($status == 0)
            <a href="" class="btn btn-default disabled"><i class="glyphicon glyphicon-check"></i> Request Sent</a>
            @else
            <a class="btn btn-default sendFriendRequest"><i class="glyphicon glyphicon-plus"></i> Add</a>
            @endif
            <a href="" class="btn btn-default"><i class="glyphicon glyphicon-envelope"></i> Send me a message</a>
            <a class="btn btn-default"><i class="glyphicon glyphicon-user"></i> Friends</a>
            <br>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-sm-3">
            <a style="width:140px; margin:0 auto; display: block;" href="" class="center-block text-­center">
                <img title="profile image" class="img-circle img-responsive" src="/img/140x140.gif">
            </a>
        </div>
        <div class="col-sm-9">
            <h1 class="">{{$profile->firstname.' '.$profile->lastname}}</h1>
        </div>
    </div>
    @endif

    <br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">City</strong></span> {{$profile->currentLocation->city}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Country</strong></span> {{$profile->currentLocation->country}}</li>
<!--<li class="list-group-item text-right"><span class="pull-left"><strong class="">Real name</strong></span> Joseph Doe</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Role: </strong></span> Pet Sitter </li> -->
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Spoken languages
                </div>
                <div class="panel-body">
                    @foreach($profile->languageSpoken as $language)
                        <h5 class="language-tag">
                            <span class="label label-custom">
                                <span class="flag-icon flag-icon-{{strtolower($language->code)}} flag-icon-squared"></span> {{strtoupper($language->name)}}
                            </span>
                        </h5>
                    @endforeach
                </div>
            </div>  
            <div class="panel panel-default">
                <div class="panel-heading">
                    Languages to learn
                </div>
                <div class="panel-body">
                    @foreach($profile->languageToLearn as $language)
                        <h5 class="language-tag">
                            <span class="label label-custom">
                                <span class="flag-icon flag-icon-{{strtolower($language->code)}} flag-icon-squared"></span> {{strtoupper($language->name)}}
                            </span>
                        </h5>
                    @endforeach
                </div>
            </div>
<!--             <div class="panel panel-default">
                <div class="panel-heading">
                    Website <i class="fa fa-link fa-1x"></i>
                </div>
                <div class="panel-body">
                    <a href="http://bootply.com" class="">bootply.com</a>
                </div>
            </div> -->
            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i>
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Shares</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Likes</strong></span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Posts</strong></span> 37</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Followers</strong></span> 78</li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Social Media
                </div>
                <div class="panel-body">
                    <i class="fa fa-facebook fa-2x"></i><i class="fa fa-github fa-2x"></i>
                    <i class="fa fa-twitter fa-2x"></i><i class="fa fa-pinterest fa-2x"></i><i class="fa fa-google-plus fa-2x"></i>
                </div>
            </div>
        </div>
        <!--/col-3-->
        <div class="col-sm-9" contenteditable="false" style="">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{$profile->firstname}}'s Bio</h4>
                </div>
                <div class="panel-body">
                     {{$profile->description}}
                </div>
            </div>
            <div class="panel panel-default target">
                <div class="panel-heading" contenteditable="false">
                    Pets I Own
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="300x200" src="/img/600x200.gif">
                                <div class="caption">
                                    <h3>
                                    Rover </h3>
                                    <p>
                                         Cocker Spaniel who loves treats.
                                    </p>
                                    <p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="300x200" src="/img/600x200.gif">
                                <div class="caption">
                                    <h3>
                                    Marmaduke </h3>
                                    <p>
                                         Is just another friendly dog.
                                    </p>
                                    <p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="300x200" src="/img/600x200.gif">
                                <div class="caption">
                                    <h3>
                                    Rocky </h3>
                                    <p>
                                         Loves catnip and naps. Not fond of children.
                                    </p>
                                    <p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Starfox221's Bio
                </div>
                <div class="panel-body">
                     A long description about me.
                </div>
            </div>
        </div>
        <div id="push">
        </div>
    </div>
 </div>
 <script type="text/javascript">
    $(document).ready(function() {
        var mainContainer = $('.main.container');
        var successPanel = '<div class="alert alert-success alert-dismissable"><a class="panel-close close" data-dismiss="alert">×</a> <i class="fa fa-coffee"></i>Your friend request has been successfully sent.</div>';
        $('.sendFriendRequest').click(function(event) {
            $.ajax({
                type: "POST",
                url: "{{route('profile.add', array($profile->id))}}",
                success: function(){
                    mainContainer.prepend(successPanel);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                }
            });
        })
        $('.acceptFriendRequest').click(function(event) {
            // pass js value to php
            var id = $(this).prop('data-id');
            alert(id);
            $.ajax({
                type: "POST",
                url: "{{route('profile.add', array($profile->id))}}",
                success: function(){
                    alert( 'request sent !');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                }
            });
        })
    });    
 </script>
@stop


