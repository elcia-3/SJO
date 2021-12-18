@extends('master')
@section('title', 'サインイン')
@section('css')
<link href="{{ asset('css/signin.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
@if($errors->has('attempt_faild'))
<p>{{ $errors->first('attempt_faild') }}</p>
@endif
<div class="login">
    <img src="{{ asset('img/logo.png') }}" alte="logo" class="logo">
    <form action="{{ route('user.signin') }}" method="post" class="login-layout">
        @csrf
            <input type="email" name="email" auto complete="email" placeholder="メールアドレス" class="login-form">
            <input type="password" name="password" placeholder="パスワード" class="login-form">
            <div>
                <label><input type="checkbox" name="remember" value="remember">次回から自動でログイン</label>
            </div>
            <input type="submit" value="ログイン" class="login-button">
    </form>
    <hr color="#ff0000" width="40%" size="3">
    <div class="register">
        <p>新規登録は</p>
        <a href="{{ route('user.signup') }}">こちら</a>
    </div>
</div>
@endsection