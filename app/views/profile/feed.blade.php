@extends('layouts.profile')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
 <div class="container target">
<br>
<div class="row">
    <div class="col-sm-3">
        <ul class="list-group">
            <li class="list-group-item text-left">
            	<a href="{{route('profile.show', array('profile', $profile))}}" class="center-block text-left">
    			    <span class="pull-right">{{$profile->firstname}}</span>
    			    <img title="profile image" class="img-circle img-responsive" src="/img/50x50.gif">
    			</a>
    		</li>
            <li class="list-group-item text-left">
            	<a href="{{ route('profile.edit', array($profile->toString())) }}">
            		<span class="glyphicon glyphicon-edit pull-right"></span>
            		Edit profile
            	</a>
            </li>
            <li class="list-group-item text-left"><a href="{{ route('profile.friendlist', array($profile->toString())) }}"><span class="glyphicon glyphicon-user pull-right"></span>Friends</a></li>
            <li class="list-group-item text-left"><a href=""><span class="glyphicon glyphicon-envelope pull-right"></span>Messages (4)</a></li>
            <li class="list-group-item text-left"><a href=""><span class="glyphicon glyphicon-picture pull-right"></span>Images</a></li>
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

    </div>
    <div id="push">
    </div>
</div>
</div>
@stop