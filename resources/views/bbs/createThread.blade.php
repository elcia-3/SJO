@extends('master')
@section('css')
<link href="{{ asset('css/createThread.css')}}"  rel="stylesheet" type="text/css">
@endsection
@if($errors->any())
@foreach($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
@endif
@section('content')
    <div class="container">
        <div class="border">
            <h1 class="h5 mb-4">
                スレッドの新規作成
            </h1>

            <form method="POST" action="{{ route('bbs.createThread', ['courseID' => $courseID]) }}">
                @csrf

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input id="title" name="title" class="input-layout" type="text">
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>


                    <div class="mt-5">
                        <a class="cancel-button" href="{{ route('bbs.allThreads', ['courseID' => $courseID]) }}">
                            キャンセル
                        </a>

                        <button type="submit" class="post-button">
                            投稿する
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
