<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\User;
class FrontendController extends Controller
{
    public function index(){
        $albums = Album::latest()->paginate(50);
        return view('home',compact('albums'));
    }

    public function userAlbum($id){
        $albums = Album::where('user_id',$id)->get();
        $userId = $id;
        $follows = (new User)->amIfollowing($userId);

        return view('user-album',compact('albums','userId','follows'));
    }
}
