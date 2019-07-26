<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title','body','user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function answers()
    {
        return $this->hasMany('App\Models\Answers');
    }
    public function tag()
    {
        return $this->morphToMany('App\Models\Tag','taggable');
    }
}
