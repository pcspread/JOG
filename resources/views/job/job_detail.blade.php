@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/job/job_detail.css') }}">
@endsection

@section('content')
<div class="detail-section">
    <div class="top-group">
        <h1 class="detail-title">コンサートスタッフ</h1>
        <div class="detail-buttons">
            <form class="detail-favorite" action="">
                <button class="detail-favorite__click">♡</button>
            </form>
            <a class="detail-email" href="">✉</a>
            <a class="detail-applicant" href="">応募する</a>
            <a class="detail-back" href="/jobs">戻る</a>
        </div>
    </div>
    <div class="bottom-group">
        <div class="job-image">
            <img class="job-image__instance" src="https://dummyimage.com/400x300/000/fff" alt="仕事のイメージ画像">
        </div>
        <div class="job-wrapper">
            <div class="job-item">
                <p class="job-title">店舗A</p>
            </div>
            <div class="job-item">
                <p class="job-description">コンサート会場の設営、撤去、運営と、グッズ販売、片付けを行ってもらいます。勤務時間は2パターンに分かれていて、お好きな方を選んでいただけますが、人数が少ない方にお願いすることがあります。設営作業や撤去作業など、長時間の力仕事が多いため、元気な方大歓迎です。</p>
            </div>
            <div class="job-item">
                <label class="job-label">給料：</label>
                <p class="job-content">時給1000～1500円</p>
            </div>
            <div class="job-item">
                <label class="job-label">勤務時間：</label>
                <p class="job-content">①9:00～16:00、②16:00～23:00(休憩1.5h)</p>
            </div>
            <div class="job-item">
                <label class="job-label">シフト：</label>
                <p class="job-content">週1日～</p>
            </div>
            <div class="job-item">
                <label class="job-label">勤務場所：</label>
                <p class="job-content">千代田区</p>
            </div>
            <div class="job-item">
                <label class="job-label">電話番号：</label>
                <p class="job-content">08011111111</p>
            </div>
            <div class="job-item">
                <label class="job-label">メールアドレス：</label>
                <p class="job-content">campanyA@item.com</p>
            </div>
        </div>
    </div>
</div>
@endsection