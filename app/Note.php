<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable=['title','body','notebook_id'];
    // protected $rule=[
    // 	'title'=>'required'
    // ];
  public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

public function notebook(){

return $this->belongsTo(notebook::class);

}

 }
