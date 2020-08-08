<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Image;
class Album extends Model
{
    //
    protected $guarded=[];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function albumimages(){
        return $this->hasMany(Image::class,'album_id','id');
    }
}
