@extends('master')
@section('css')
<link href="{{ asset('css/allThreads.css')}}"  rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="container">
        <a href="{{ route('bbs.createThread', $courseID) }}" class="create-thread">
            スレッドを新規作成する
        </a>
        <div class="content"> 
            @foreach ($threads as $thread)
            <div class="thread-box">
                <a class="thread-link" href="{{ route('bbs.thread', ['threadID' => $thread->id]) }}"></a>
                <div class="thread-title">
                    {{ $thread->title }}
                </div>
                <div>
                    <span class="mr-2">
                        投稿日時 {{ $thread->created_at->format('Y.m.d') }}
                    </span>

                    @if ($thread->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $thread->comments->count() }}件
                        </span>
                    @endif
                </div>
            </div>
            <hr class="hr-style">
        <div>
            @endforeach
    </div>
    <div class="pagenation-layout">
        {{ $threads->links() }}
    </div>
@endsection
