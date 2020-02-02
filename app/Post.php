<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'post_id'; // define the primary key to the model 
    // post belongs to one category:
    public function category(){
        return $this->belongsTo('App/Category'); 
    }

    // post belongs to one user:
    public function user(){
        return $this->belongsTo('App/User');
    }

    // post has many comments:
    public function comments(){
        return $this->hasMany('App/Comment');
    }
}
