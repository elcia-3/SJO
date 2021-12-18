<?php

namespace App\Lib;
use App\Favoritecourse;
use Illuminate\Support\Facades\Auth;

class forFavorite{
    public static function is_favorite($courseID){
        $favoritecourseBuf = new Favoritecourse();
        if($favoritecourseBuf->where('userID', Auth::id())->where('courseID', $courseID)->exists()){
            return true;
        } else {
            return false;
        }
    }
}