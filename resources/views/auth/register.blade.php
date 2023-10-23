@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
<div class="register-section">
    <form class="register-form" action="/verify/email" method="GET">
    @csrf
        <h1 class="register-title">新規登録</h1>
        <div class="register-item">
            <label class="register-item__title" for="email">メールアドレス</label>
            <input class="register-item__input" id="email" type="text" autofocus>
            <p class="register-item__error"></p>
        </div>
        <div class="register-item">
            <label class="register-item__title" for="password">パスワード</label>
            <input class="register-item__input" id="password" type="text">
            <p class="register-item__error"></p>
        </div>
        <button class="register-button">登録する</button>
        <a class="register__login-click" href="/login">ログインはこちら</a>
    </form>
</div>
@endsection