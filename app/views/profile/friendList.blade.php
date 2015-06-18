@extends('layouts.profile')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
 <div class="container target">
    <div class="row">
        <div class="col-sm-12 col-lg-12 col-md-12" contenteditable="false" style="">
            @if(count($friends) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{count($friends).(count($friends) === 1 ? ' result' : ' friends found') }}</h4>
                </div>
                <div class="panel-body">
                    <section class="col-xs-12 col-sm-6 col-md-12">
                        @foreach($friends as $profile)

                        <article class="search-result row">
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <a href="#" title="Lorem ipsum" class="thumbnail">
                                    <img src="{{$profile->picture_small_url}}" alt="Lorem ipsum" />
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 middle-panel">
                                <h4>
                                    <a href="{{ route('profile.show', array($profile->toString())) }}" title="">{{$profile->fullName()}}</a>
                                </h4>
                                <ul class="meta-search">
                                    <li><i class="glyphicon glyphicon-map-marker"></i><span>{{$profile->currentLocation->toString()}}</span></li>
                                    <li><i class="glyphicon glyphicon-time"></i><span>{{$profile->getLastConnected()}}</span></li>
                                </ul>
                            </div>                       
                            <div class="col-xs-12 col-sm-12 col-md-3 middle-panel">
                                <ul class="meta-search">
                                    <li><h6>Learning</h6></li>
                                    <li>
                                        @foreach($profile->languageToLearn as $language)
                                            <a href="{{route('search.tag', array($language->id))}}">
                                                <h5 class="language-tag">
                                                    <span class="label label-custom">
                                                        <span class="flag-icon flag-icon-{{strtolower($language->code)}} flag-icon-squared"></span> {{strtoupper($language->name)}}
                                                    </span>
                                                </h5>
                                            </a>
                                        @endforeach
                                    </li>
                                    <li><h6>Speaks</h6></li>
                                    <li>
                                        @foreach($profile->languageSpoken as $language)
                                            <h5 class="language-tag">
                                                <span class="label label-custom">
                                                    <span class="flag-icon flag-icon-{{strtolower($language->code)}} flag-icon-squared"></span> {{strtoupper($language->name)}}
                                                </span>
                                            </h5>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 excerpet">
                                <p>{{$profile->description}}</p>
                            </div>
                            <span class="clearfix borda"></span>
                            <hr>
                        </article>
                        @endforeach
                    </section>
                </div>
            </div>
            @else
                <div class="panel panel-default">
                    <h1>Sorry, you do not have any friend :'(</h1>
                    <img src="http://fc02.deviantart.net/fs71/f/2010/239/d/f/forever_alone_by_foreveraloneplz.png">
                </div>
            @endif
        </div>
    </div>
 </div>
@stop
