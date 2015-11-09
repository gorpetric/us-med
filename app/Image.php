<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['album_id', 'name'];

    public function album()
    {
    	return $this->belongsTo('App\Album', 'album_id');
    }
}
