@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/job/detail_job.css') }}">
@endsection

@section('content')
<div class="detail-section">
    <div class="top-group">
        <h1 class="detail-title">コンサートスタッフ</h1>
        <div class="detail-buttons">
            <form class="detail-favorite" action="">
                <button class="detail-favorite__click">♡</button>
            </form>
            <a class="detail-email" href="/job/result">✉</a>
            <div class="detail-buttons__operate-buttons">
                <a class="detail-applicant" href="/job/send">応募する</a>
                <a class="detail-back" href="/jobs">戻る</a>
            </div>
        </div>
    </div>
    <div class="middle-group">
        <p class="job-description">
            コンサート会場の設営、撤去、運営と、グッズ販売、片付けを行ってもらいます。勤務時間は2パターンに分かれていて、お好きな方を選んでいただけますが、人数が少ない方にお願いすることがあります。設営作業や撤去作業など、力仕事も多く、元気な方大歓迎です。
        </p>
        <div class="job-group">
            <div class="job-wrapper first">
                <div class="job-item">
                    <label class="job-label">給料</label>
                    <p class="job-content">時給1000～1500円</p>
                </div>
                <div class="job-item">
                    <label class="job-label">勤務時間</label>
                    <p class="job-content">①9:00～16:00、②16:00～23:00(休憩1.5h)</p>
                </div>
                <div class="job-item">
                    <label class="job-label">シフト</label>
                    <p class="job-content">週1日～</p>
                </div>
            </div>

            <div class="job-wrapper second">
                <div class="job-item">
                    <label class="job-label">店舗名</label>
                    <p class="job-content">店舗A</p>
                </div>
                <div class="job-item">
                    <label class="job-label">勤務場所</label>
                    <p class="job-content">千代田区</p>
                </div>
                <div class="job-item">
                    <label class="job-label">電話番号</label>
                    <p class="job-content">08011111111</p>
                </div>
                <div class="job-item">
                    <label class="job-label">メールアドレス</label>
                    <p class="job-content">campanyA@item.com</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-group">
        <h2 class="question-header">質問箱</h2>
        <label class="question-label">[質問]</label>
        <p class="question-title">シフトの変更はしやすいですか？</p>
        <label class="question-label">[回答]</label>
        <p class="question-content">変更は比較的しやすくなっています。</p>
    </div>
</div>
@endsection