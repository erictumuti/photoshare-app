@extends('layouts.app')

@section('content')
<div class="container">
   <ol class="bredcrumb">
   <h3>Your album</h3>
   <span style="margin-left: 100px;">
   <a href="{{route('album.create')}}">
   <button class="btn btn-primary">Create New Album</button>
   </a>
   </span>
   </ol>
   <div class="row">
   <div class="col-md-12">
   <index></index>
   </div>
   </div>
</div>
@endsection
