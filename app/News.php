<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['user_id', 'title', 'body', 'slug', 'image'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
