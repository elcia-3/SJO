@extends('master')
@section('title', '授業登録')
@section('css')
<link href="{{ asset('css/makeCourse.css') }}" rel="stylesheet" type="text/css">
@endsection
@if($errors->any())
@foreach($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
@endif
@section('content')
<div class="register-form">  
    <h1 class="register-h1">授業登録</h1>
    <form action="{{ route('course.makeCourse') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="block-label">
            <label for="class-name" class="label-layout">授業名</label><input name="name" id="class-name" class="input-layout">
        </div>
        <div class="block-label">
            <label for="class-url" class="label-layout">URL</label><input name="url" type="url" id="class-url" class="input-layout">
        </div>
        <div class="block-label">
            <div class="week-layout">
            <p class="day-of-the-week">曜日</p>

            <div class="radio">
                <div class="radio-positon">
                    <input type="radio" name="day" value="月曜日" class="radio-input" id="radio-01">
                    <label for="radio-01">月曜日</label><br>
                </div> 
                <div class="radio-positon">
                    <input type="radio" name="day" value="火曜日" class="radio-input" id="radio-02">
                    <label for="radio-02">火曜日</label><br>
                </div>
                <div class="radio-positon">
                    <input type="radio" name="day" value="水曜日" class="radio-input" id="radio-03">
                    <label for="radio-03">水曜日</label><br>
                </div>                               
                <div class="radio-positon">
                    <input type="radio" name="day" value="木曜日" class="radio-input" id="radio-04">
                    <label for="radio-04">木曜日</label><br>
                </div>                               
                <div class="radio-positon">
                    <input type="radio" name="day" value="金曜日" class="radio-input" id="radio-05">
                    <label for="radio-05">金曜日</label><br>
                </div>                               
                <div class="radio-positon">
                    <input type="radio" name="day" value="土曜日" class="radio-input" id="radio-06">
                    <label for="radio-06">土曜日</label><br>
                </div>                               
                <div class="radio-positon">
                    <input type="radio" name="day" value="不定期" class="radio-input" id="radio-07">
                    <label for="radio-07">不定期</label><br>
                </div>                               
                </div>
            </div>


        </div>
        <div class="block-label">
            <div class="thumbnail-layout">
                <p class="day-of-the-week">サムネイル</p>
                <input type="file" onChange="imgPreView(event)" name="image">
                <div id="preview"></div>
            </div>
        </div>
        <div class="button-layout">
            <label><input type="submit" class="register-button" value="上記の内容で登録する"></label>
        </div>
    </form>
</div>
@endsection