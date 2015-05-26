@extends('layouts.profile')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="row">
    <div class="col-sm-12" contenteditable="false" style="">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Results</h4>
            </div>
            <div class="panel-body">
                    <section class="col-xs-12 col-sm-6 col-md-12">
                        @foreach($results as $profile)
                        <article class="search-result row">
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <a href="#" title="Lorem ipsum" class="thumbnail"><img src="{{$profile->picture_small_url}}" alt="Lorem ipsum" /></a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 middle-panel">
                                <h3><a href="#" title="">{{$profile->fullName()}}</a></h3>
                                <ul class="meta-search">
                                   <li><i class="glyphicon glyphicon-map-marker"></i> <span>{{$profile->currentLocation->toString()}}</span></li>
                                   <li><i class="glyphicon glyphicon-time"></i> <span>{{$profile->getLastConnected()}}</span></li>
                                </ul>    
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                                <p>{{$profile->description}}</p>
                                                
                            </div>
                            <span class="clearfix borda"></span>
                        </article>
                        {{$profile}}
                        @endforeach
                    </section>
                
            </div>
        </div>

    </div>
</div>
@stop