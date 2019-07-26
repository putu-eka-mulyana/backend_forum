<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class answers extends Model
{
    protected $fillable =[
        'body','question_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
