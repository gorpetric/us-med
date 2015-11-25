<?php

namespace App;

use App\News;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $dates = [
        'created_at',
        'updated_at',
        'birthday',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'password', 
        'first_name', 
        'last_name',
        'birthday',
        'oib',
        'faculty',
        'course',
        'year',
        'email',
        'active',
        'profile_picture',
        'inserted_by_admin',
        'remember_token', 
        'admin',
        'master_admin'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function news()
    {
        return $this->hasMany('App\News', 'user_id');
    }

    public function projects()
    {
        return $this->hasMany('App\Project', 'user_id');
    }

    public function albums()
    {
        return $this->hasMany('App\Album', 'user_id');   
    }

    public function getName()
    {
        return $this->first_name;
    }
    public function getFullName()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function isAdmin()
    {
        return (bool)$this->admin;
    }

    public function isStoryAuthor(News $story)
    {
        if($this->id === $story->user_id) return true;
        else return false;
    }
}
