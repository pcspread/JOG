@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/reset.css') }}">
@endsection

@section('content')
<div class="reset-section">
    <h1 class="reset-title">パスワード変更メール送信</h1>
    <form class="reset-form" action="/reset" method="POST">
    @csrf
        <div class="reset-item">
            <label class="reset-item__title" for="email">メールアドレス</label>
            <input class="reset-item__input" id="email" type="text" name="email" value="{{ old('email') }}" autofocus>
            <p class="reset-item__error">
                @error('email')
                    {{ $errors->first('email') }}
                @enderror
            </p>
        </div>
        <button class="reset-button">送信</button>
        <a class="reset__login-click" href="/login">ログインはこちら</a>
    </form>
</div>
@endsection