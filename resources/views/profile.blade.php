@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
		<img src="/uploads/avatar/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
           <h2>{{$user->name}}'s profile</h2>
		   <form action="/profile" method="POST" enctype="multipart/form-data">
		       <label for="">Update profile image</label>
			   <br>
			   <input type="file" name="avatar">
			   <input type="hidden" name="_token" value="{{ csrf_token() }}">
			   <input type="submit" class="pull-right btn btn-sm btn-primary">
		   </form>
        </div>
    </div>
</div>
@endsection
