@extends('layouts.app')

@section('content')
            <div class="container">
            <img src="{{asset('banner')}}/banner.jpg" style="width: 100%;" alt="">
			<br><br>
            @if(auth()->user()->id!=$userId)
        <follow user-id="{{$userId}}" follows="{{$follows}}"></follow>
           @endif
           <br>
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
            </div>
@endsection
