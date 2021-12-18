<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Comment;
use App\Course;
use Illuminate\Support\Facades\DB;

class ThreadsController extends Controller
{
    public function getAllThreads($courseID){
        $threads = Thread::where('course_id', $courseID)->paginate(10);
        return view('bbs.allThreads', ['threads' => $threads, 'courseID' => $courseID]);
    }

    public function getCreateThread($courseID){
        return view('bbs.createThread', ['courseID' =>$courseID]);
    }

    public function postCreateThread(Request $request, $courseID){
        $this->validate($request, [
            'title' => 'required',
        ]);
        $newThread = new Thread();
        $newThread->fill([
            'course_id' => $courseID,
            'title' => $request->input('title'),
        ]);
        $courseBuf = Course::find($courseID);
        $newThread->course()->associate($courseBuf);
        $newThread->save();
        
        return redirect()->route('bbs.allThreads', ['courseID' => $courseID]);
    }

    public function getThread($threadID){
        $thread = Thread::findOrFail($threadID);
        return view('bbs.thread', ['thread' => $thread]);
    }

    public function postThread(Request $request, $threadID){
        $this->validate($request, [
            'body' => 'required',
        ]);
        $newComment = new Comment();
        $newComment->fill([
            'body' => $request->input('body'),
            'name' => $request->input('name')
        ]);
        $threadBuf = Thread::find($threadID);
        $newComment->thread()->associate($threadBuf);
        $newComment->save();
        return redirect()->route('bbs.thread', ['threadID' => $threadID]);
    } 
}