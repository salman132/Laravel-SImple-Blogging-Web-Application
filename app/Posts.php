<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function getFeaturedAttribute($featured){
        return asset($featured);
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $dates = ['deleted_at'];
}
