@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
<div class="register-section">
    <form class="register-form" action="/register" method="POST">
    @csrf
        <h1 class="register-title">新規登録</h1>
        <div class="register-item">
            <label class="register-item__title" for="email">メールアドレス</label>
            <input class="register-item__input" id="email" type="text" name="email" value="{{ old('email') }}" autofocus>
            <p class="register-item__error">
                @error('email')
                    {{ $errors->first('email') }}
                @enderror
            </p>
        </div>
        <div class="register-item">
            <label class="register-item__title" for="password">パスワード</label>
            <input class="register-item__input" id="password" type="password" name="password">
            <p class="register-item__error">
                @error('password')
                    {{ $errors->first('password') }}
                @enderror
            </p>
        </div>
        <div class="register-item checkbox">
            <input class="register-item__checkbox" id="company" type="checkbox" name="company">
            <label class="register-item__checkbox-label" for="company">
            求人を掲載される場合</label>
        </div>
        <button class="register-button">登録する</button>
    </form>
</div>
@endsection