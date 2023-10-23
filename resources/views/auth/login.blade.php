@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
<div class="login-section">
    <h1 class="login-title">ログイン</h1>
    <div class="login-item">
        <label class="login-item__title" for="email">メールアドレス</label>
        <input class="login-item__input" id="email" type="text" autofocus>
        <p class="login-item__error"></p>
    </div>
    <div class="login-item">
        <label class="login-item__title" for="password">パスワード</label>
        <input class="login-item__input" id="password" type="text">
        <p class="login-item__error"></p>
    </div>
    <button class="login-button">ログイン</button>
    <a class="login__register-click" href="/register">新規登録はこちら</a>
</div>
@endsection