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

    public function img()
    {
        return "<img src='".asset('img/udruga/vodstvo/'.$this->image.'')."' class='img-responsive img-rounded'>";
    }

    public function mainRow()
    {
        if($this->president || $this->substitute || $this->secretary){
            return true;
        }
        return false;
    }

    public function mainGlyphicon()
    {
        if($this->president){
            return "<span class='glyphicon glyphicon-star'></span>";
        } 
        if($this->substitute){
            return "<span class='glyphicon glyphicon-star-empty'></span>";
        } 
        if($this->secretary){
            return "<span class='glyphicon glyphicon-euro'></span>";
        }
        return null;
    }
}