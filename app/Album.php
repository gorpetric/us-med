<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    protected $fillable = ['user_id', 'title', 'body'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function images()
    {
    	return $this->hasMany('App\Image', 'album_id');
    }
}
