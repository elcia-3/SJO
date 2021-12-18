@section('css')
<link href="{{ asset('css/thread.css')}}"  rel="stylesheet" type="text/css">
@extends('master')
@section('content')
    <div class="container">

        <div class="border p-4">
            <p class="thread-title">
                {{ $thread->title }}
            </p>

                <hr class="hr-style">

            <section>

                @forelse($thread->comments as $comment)
            <div class="comment-box">
                    <div class="p-4">
                        <div class="inline">
                        <div class="id-layout">
                            <p>{{ $comment->id }}<p>
                        </div>
                        <div class="name-layout">
                        @if(isset($comment->name))
                            <p>{{ $comment->name }}<p>
                        @else
                            <p>名無しさん</p>
                        @endif
                        </div>
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        </div>
                        <p class="mt-2">
                            {!! nl2br(e($comment->body)) !!}
                        </p>
                    </div>
                <hr class="hr-style">
            </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
<form class="mb-4" method="POST" action="{{ route('bbs.thread', ['threadID' => $thread->id]) }}">
    @csrf

    <div class="form-group">
        <label for="name">
            名前
        </label>
        <input name="name" type="text" id="name" class="name-input-layout">

        <label for="body">
            コメント
        </label>

        <textarea id="body" name="body" class="textarea-layout" class="form-control" rows="4"></textarea>
        @if ($errors->has('body'))
            <div class="invalid-feedback">
                {{ $errors->first('body') }}
            </div>
        @endif
    </div>

    <div class="comment-button">
        <button type="submit" class="btn btn-primary">
            コメントする
        </button>
    </div>
</form>
        </div>
    </div>
@endsection