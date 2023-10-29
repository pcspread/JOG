@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/job/success_message.css') }}">
@endsection

@section('content')
<div class="message-section">
    <h1 class="message-title">応募結果</h1>
    <p class="message-content">
        おめでとうございます。1次審査を通過されました。<br />
        2次審査の面接をご希望の場合、また2次審査をお断りされる場合は、
        1週間後の{{ $due }}までに下記までご連絡をお願いいたします。<br />
        ご連絡が無い場合は、お断りの方向で処理させていただきますので、何卒よろしくお願いいたします。
        電話番号：{{ $job['tel'] }}
    </p>
    <a class="message-click" href="/job/detail/1">求人詳細へ</a>
</div>
@endsection