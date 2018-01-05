@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>Articles <small>&mdash; {{$article->title}}</small></h1>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <follow-button id="{{$article->id}}" type="article"></follow-button>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$article->title}}</h3>
                </div>
                <div class="panel-body">
                    {{$article->body}}
                </div>
            </div>
        </div>
    </div>
</div>


<ul class="pager">
    @unless($article->id == 1)
    <li><a href="/{{$article->id-1}}">Previous</a></li>
    @endunless
    @unless($article->id == 50)
    <li><a href="/{{$article->id+1}}">Next</a></li>
    @endunless
</ul>
@endsection
