<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follower;
class FollowerController extends Controller
{

  public function followUnfollow(Request $request){
    $followerId = User::find(auth()->user()->id);
    $followingId = User::find($request->userId);
    $followerId->following()->toggle($followingId);
    return redirect()->back();
}

public function userFollow(){
  $followings = Follower::where('follower_id',auth()->user()->id)->get();
  foreach($followings as $following){
    $userId = $following->userfollowing->id;
    $follows = (new User)->amIfollowing($userId);
  }

   return view('user-follow',compact('userId','follows','followings'));
}
}
