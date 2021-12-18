<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\DB;
use App\Favoritecourse;
use forFavorite;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function getAllCourses(){
        $courses = DB::table('courses')->get();
        return view('course.allCourses',['courses' => $courses]);
    }

    public function postSearchCourses(Request $request)
    {
        $this->validate($request, [
            'str' => 'required'
        ]);
        $str = trim($request->input('str'));
        $str = mb_convert_kana($str, 's');
        $strArray = preg_split('/[\s]+/', $str);
        $search_words = Collection::make($strArray)->map(function ($p) {
            return "%" . $p . "%";
        })->toArray();
        $courses = Course::where(function ($query) use ($search_words) {
            foreach ($search_words as $search_word) {
                $query->where('name', 'like', $search_word);
            }
        })->get();
        return view('course.searchCourses', ['courses' => $courses]);
    }

    public function getAllFavorites()
    {
        $favoriteBuf = Favoritecourse::where('userID', Auth::id())->get('courseID');
        $courses = Course::whereIn('id', $favoriteBuf)->get();

        return view('course.allFavorites', ['courses' => $courses]);
    }

    public function getClickFavorite($courseID)
    {
        $favoriteCourseBuf = new Favoritecourse();
        $favoriteCourseBuf->fill([
            'userID' => Auth::id(),
            'courseID' => $courseID,
        ]);
        $favoriteCourseBuf->save();
        return redirect()->back();
    }

    public function getClickUnfavorite($courseID)
    {
        $favoritechannelBuf = new Favoritecourse();
        $favoritechannelBuf->where('userID', Auth::id())->where('courseID', $courseID)->delete();

        return redirect()->back();
    }


    public function getMakeCourse()
    {
        return view('course.makeCourse');
    }

    public function postMakeCourse(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required|url',
            'day' => 'required'
        ]);

        if(!empty($request->file('image'))){
            $path = $request->file('image')->store('public/img');
        } else {
            $path = 'default'.rand(1,8).'.jpg';
        }

        $courseBuf = new Course();
        $courseBuf->fill([
            'img_path' => basename($path),
            'name' => $request->input('name'),
            'url' => $request->input('url'),
            'day' => $request->input('day'),
        ]);
        $courseBuf->save();

        return view('couse.allCourses');
    }
}
