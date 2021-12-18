<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model {
    protected $guarded = [
        'id'
    ];

    public function comments() {
        return $this->hasMany('App\Comment');
    }
    public function course() {
        return $this->belongsTo('App\Course');
    }
}
