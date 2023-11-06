@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/reset_password.css') }}">
@endsection

@section('content')
<div class="reset-section">
    <form class="reset-form" action="/reset/password" method="POST">
    @csrf
        <h1 class="reset-title">パスワード変更</h1>
        <div class="reset-item">
            <label class="reset-item__title" for="password">パスワード</label>
            <input class="reset-item__input" id="password" type="password" name="password" placeholder="入力欄" autofocus>
            <p class="reset-item__error">
                @error('password')
                    {{ $errors->first('password') }}
                @enderror
            </p>
        </div>
        <div class="reset-item">
            <label class="reset-item__title" for="password">確認用パスワード</label>
            <input class="reset-item__input" id="password" type="password" name="password_confirmation" placeholder="入力欄">
            <p class="reset-item__error">
                @error('password_confirmation')
                    {{ $errors->first('password_confirmation') }}
                @enderror
            </p>
        </div>
        <button class="reset-button">変更する</button>
    </form>
</div>
@endsection