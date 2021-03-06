@extends('layouts.app')

@section('content')
            <div class="container">
            <div class="jumbotron jumbotron-fluid">
            <h1 class="display-4">
            Share Your Photos
            </h1>
            <p class="lead">
            Share your photos with people
            </p>
            </div>
            <div class="row">
            @foreach($albums as $album)
            <div class="col-lg-3">
            <div class="card">
            <img src="{{asset('album')}}/{{$album->image}}" alt="" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title">
                <center>{{$album->name}}</center>
            </h5>
            <center>
            <a href="{{route('view.album',[$album->slug,$album->id])}}" class="btn btn-primary">view album</a>
            </center>
            </div>
            </div>
            </div>
            @endforeach
            </div>
            {{$albums->render()}}
            </div>
@endsection
