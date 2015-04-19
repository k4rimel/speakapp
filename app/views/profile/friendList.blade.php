@extends('layouts.profile')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
 <div class="container target">
	<h2>{{count($friends).(count($friends) === 1 ? ' friend found' : ' friends found') }}</h2>
	<hr>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-left" contenteditable="false">
                	<strong>Filters</strong>
            	</li>
            	<li class="list-group-item filter">
            		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            		         Location <span class="caret pull-right"></span>
    		        </button>
		           	<ul class="dropdown-menu pull-center bullet" role="menu">
	               		<li>
	               			<a href="#">Action</a>
	               		</li>
	               		<li>
	               			<a href="#">Another action</a>
	               		</li>
		           	</ul>
            	</li>
            	<li class="list-group-item filter">
            		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        		         	Spoken Languages <span class="caret pull-right"></span>
    		        </button>
    		           	<ul class="dropdown-menu pull-center bullet" role="menu">
		               		<li>
		               			<a href="#">Action</a>
		               		</li>
		               		<li>
		               			<a href="#">Another action</a>
		               		</li>
    		           	</ul>
            	</li>
            	<li class="list-group-item filter">
    		    	<div class="input-group">
    		    	      <input type="text" class="form-control" placeholder="Age min.">
    			    </div>
            	</li>
            </ul>
         
        </div>
        <!--/col-3-->
        @if(count($friends) > 0)
        <div class="col-sm-9 " contenteditable="false" style="">
            <div class="panel panel-default">
            	@if(count($friends) > 1)
	            	<div class="panel-heading">
	    		    	<div class="input-group">
	    		    	      <input type="text" class="form-control" placeholder="Search">
	    		    	      <span class="input-group-btn">
	    		    	        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
	    		    	      </span>
	    			    </div>
	            	</div>
            	@else
	            	<div class="panel-heading">
						
	            	</div>
            	@endif
    			@foreach($friends as $friend)
    				<div class="panel-body">
    			      	<div class="panel panel-default">
    				      	<div class="panel-heading">
    				      		<div class="row">
    				      			<div class="col-sm-6">
    			      		        	<a class="thumbnail pull-left" href="#">
    				                        <img class="media-object" src="/img/50x50.gif">
    				                    </a>
    				                    <a href="{{route('profile.show', array($friend->firstname.'.'.$friend->lastname))}}">
    				                    	<h3>{{$friend->firstname}}</h3>
    				                    </a>
    			  					</div>
    								</div>
    							</div>
    			      		<div class="panel-body">
    			      			{{$friend->description}}
    			  			</div>
    			  		</div>
    				</div>
    			@endforeach
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

@stop
