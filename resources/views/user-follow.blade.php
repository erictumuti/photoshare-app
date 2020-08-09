@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item active">
    <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Following</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="buzz">
	  <br>
   @foreach($followings as $follow)
  <center><p>{{$follow->userfollowing->name}}
	   <a href="{{route('user.album',[$follow->userfollowing->id])}}">
   <img src="/uploads/avatar/{{$follow->userfollowing->avatar}}" style="width:50px; height:50px; border-radius:50%;" alt="">
   </a>
  </p>
  <p>
  @if(auth()->user()->id!=$userId)
	<follow user-id="{{$userId}}" follows="{{$follows}}"></follow>
	@endif
  </p>
  </center>
   @endforeach
  </div>
</div>

                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection