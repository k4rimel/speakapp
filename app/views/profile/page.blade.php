@extends('layouts.welcome')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
 <hr class="">
 <div class="container target">
    <div class="row">
        <div class="col-sm-3">
            <a style="width:140px; margin:0 auto; display: block;" href="/users" class="center-block text-­center"><img title="profile image" class="img-circle img-responsive" src="http://lorempixel.com/140/140/people"></a>
        </div>
        <div class="col-sm-9">
            <h1 class="">{{$profile->firstname.' '.$profile->lastname}}</h1>
            <h3></h3>
            <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-envelope"></i> Send me a message</button>
            <br>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">City</strong></span> {{$profile->currentLocation->city}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Country</strong></span> {{$profile->currentLocation->country}}</li>
<!--                 <li class="list-group-item text-right"><span class="pull-left"><strong class="">Real name</strong></span> Joseph Doe</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Role: </strong></span> Pet Sitter </li> -->
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Spoken languages
                </div>
                <div class="panel-body">
                    @foreach($profile->languageSpoken as $res => $val)
                    {{ ($res == count($profile->languageSpoken) - 1 ? $val->name  : $val->name.',  ')}}
                    @endforeach
                </div>
            </div>  
            <div class="panel panel-default">
                <div class="panel-heading">
                    Languages to learn
                </div>
                <div class="panel-body">
                    @if(count($profile->languageToLearn) > 0)
                        @foreach($profile->languageToLearn as $res => $val)
                        {{ ($res == count($profile->languageToLearn) - 1 ? $val->name  : $val->name.',  ')}}
                        @endforeach
                    @else
                        {{'None'}}
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Website <i class="fa fa-link fa-1x"></i>
                </div>
                <div class="panel-body">
                    <a href="http://bootply.com" class="">bootply.com</a>
                </div>
            </div>
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
                                <img alt="300x200" src="http://lorempixel.com/600/200/people">
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
                                <img alt="300x200" src="http://lorempixel.com/600/200/city">
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
                                <img alt="300x200" src="http://lorempixel.com/600/200/sports">
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
@stop


