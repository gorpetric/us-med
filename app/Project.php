<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = ['user_id', 'title', 'body', 'image'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
