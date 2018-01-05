@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
      <h1>Videos <small>&mdash; {{$video->title}}</small></h1>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <follow-button id="{{$video->id}}" type="video"></follow-button>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$video->title}}</h3>
                </div>
                <div class="panel-body">
                    {{$video->body}}
                </div>
            </div>
        </div>
    </div>
</div>
<ul class="pager">
    @unless($video->id == 1)
    <li><a href="/videos/{{$video->id-1}}">Previous</a></li>
    @endunless
    @unless($video->id == 50)
    <li><a href="/videos/{{$video->id+1}}">Next</a></li>
    @endunless
</ul>
@endsection
