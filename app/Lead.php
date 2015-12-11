<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'image',
    	'description',
    	'president',
    	'substitute',
    	'secretary',
    	'facebook',
    	'youtube',
    	'instagram',
    	'twitter',
    	'linkedin',
    ];

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}