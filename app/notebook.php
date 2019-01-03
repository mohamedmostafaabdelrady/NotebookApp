<?php

namespace App;
use \App\Note;
use Illuminate\Database\Eloquent\Model;

class notebook extends Model
{
    protected $fillable = ['name'];
    public function notes(){

    	return $this->hasMany(Note::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
