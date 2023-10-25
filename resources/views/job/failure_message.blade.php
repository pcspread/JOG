@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/job/failure_message.css') }}">
@endsection

@section('content')
<div class="message-section">
    <h1 class="message-title">応募結果</h1>
    <p class="message-content">
        日頃より、JOGをご利用いただき誠にありがとうございます。<br />
        1次審査の結果、この度は採用を見送らせていただくことになりました。<br />
        ご希望に添えず申し訳ございませんが、あしからずご了承ください。<br />
        今後のご健勝を心よりお祈り申し上げます。
    </p>
    <a class="message-click" href="/job/detail/1">求人詳細へ</a>
</div>
@endsection