@extends('master')
@section('title', 'お気に入り一覧')
@section('css')
<link href="{{ asset('css/allcourses.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-layout">
    <div class="heading">
        <p>お気に入り一覧</p>
    </div>
    <div class="class-box-position">
        @foreach($courses as $course)
        <div class="class-box">
            <div class="class-icon">
                <a href="{{ $course->url }}" target="_blank"><img src="{{  asset('storage/img/' . $course->img_path) }}"></a>
            </div>
            <div class="class-name">
                <a href="{{ route('bbs.allThreads', $course->id) }}" target="_blank">{{ $course->name }}</a>
                <div class="memo">
                    <p>{{ $course->day }}</p>
                    @if(forFavorite::is_favorite($course->id))
                    <button onclick="location.href='{{ route('course.unfavorite', ['courseID' => $course->id]) }}'"
                        type="button" class="fav-on" style="cursor:pointer">♥</button>
                    @else
                    <button onclick="location.href='{{ route('course.favorite', ['courseID' => $course->id]) }}'"
                        type="button" style="cursor:pointer">♡</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

        <div class="empty-box">
        </div>
        <div class="empty-box">
        </div>
        <div class="empty-box">
        </div>
        <div class="empty-box">
        </div>
        <div class="empty-box">
        </div>

    </div>
</div>
@endsection