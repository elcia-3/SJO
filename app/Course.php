<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
    protected $guarded = [
        'id'
    ];
    public function threads() {
        return $this->hasMany('App\Thread');
    }
}
