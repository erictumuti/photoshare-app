<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Follower extends Model
{
    //
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function userfollowing(){
        return $this->belongsTo(User::class,'following_id','id');
    }
}
