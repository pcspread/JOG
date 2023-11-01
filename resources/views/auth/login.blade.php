@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
<div class="login-section">
    <h1 class="login-title">ログイン</h1>
    <form class="login-form" action="/login" method="POST">
    @csrf
        <div class="login-item">
            <label class="login-item__title" for="email">メールアドレス</label>
            <input class="login-item__input" id="email" type="text" name="email" value="{{ old('email') }}" autofocus>
            <p class="login-item__error">
                @error('email')
                    {{ $errors->first('email') }}
                @enderror
            </p>
        </div>
        <div class="login-item">
            <label class="login-item__title" for="password">パスワード</label>
            <input class="login-item__input" id="password" type="password" name="password">
            <p class="login-item__error">
                @error('password')
                    {{ $errors->first('password') }}
                @enderror
            </p>
        </div>
        <button class="login-button">ログイン</button>
        <a class="login__register-click" href="/reset">パスワードを忘れた方はこちら</a>
    </form>
</div>
@endsection