@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/thanks.css') }}">
@endsection

@section('content')
<div class="thanks-section">
    <h1 class="thanks-title">登録完了</h1>
    <p class="thanks-content">
        登録が完了しました。
    </p>
    <a class="thanks-click" href="/login">ログインへ</a>
</div>
@endsection