@extends('master')
@section('title', '新規登録')
@section('css')
<link href="{{ asset('css/signup.css') }}" rel="stylesheet" type="text/css">
@endsection
@if($errors->any())
@foreach($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
@endif
@section('content')
<div class="register-form">
    <h1 class="register-h1">会員登録フォーム</h1>
    <form action="{{ route('user.signup') }}" method="post">
        @csrf
        <div class="block-label">
            <label for="email" class="label-layout"><span class="required">必須</span>メールアドレス</label><input name="email"
                type="email" id="email" inputmode="email" class="input-layout">
        </div>
        <div class="block-label">
            <label for="password" class="label-layout"><span class="required">必須</span>パスワード</label><input
                name="password" type="password" id="password" class="input-layout">
        </div>
        <p class="notice">※アルファベットと数字を組み合わせて８文字以上で入力してください</p>
        <div class="block-label">
            <label for="repassword" class="label-layout"><span class="required">必須</span>パスワード再入力</label><input 
                type="password" id="repassword" class="input-layout">
        </div>
        <div class="block-label">
            <label class="register-checkbox"><input type="checkbox">利用規約、個人情報保護方針に同意する</label>
        </div>
        <div class="button-layout">
            <label><input type="submit" class="register-button" value="上記の内容で登録する"></label>
        </div>
    </form>
</div>
@endsection