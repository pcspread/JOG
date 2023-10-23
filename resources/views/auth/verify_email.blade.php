@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/verify_email.css') }}">
@endsection

@section('content')
<div class="email-section">
    <h1 class="email-title">メール認証</h1>
    <p class="email-content">
        入力されたメールアドレスに認証メールを送信しました。<br />
        メールアドレスを確認の上、本登録をお願いします。
    </p>
    <a class="email-click" href="/resend/email">メールの再送はこちら</a>
</div>
@endsection