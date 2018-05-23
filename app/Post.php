<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    //关联评论1对多
    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function zan($user_id){
        return $this->hasOne('App\Zan')->where('user_id',$user_id);
    }

    public function zans(){
        return $this->hasMany('App\Zan');
    }


}
