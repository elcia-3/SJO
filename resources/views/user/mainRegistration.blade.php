@extends('master')
@section('title', '本登録完了')
@section('css')
<link href="{{ asset('css/mainRegistration.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="item">
    <p>本登録完了！</p>
    <div class="row">
        <p>トップページは</p>
        <a href="{{ route('course.allCourses') }}">こちら</a>
    </div>
</div>
@endsection