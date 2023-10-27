@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/job/detail_job.css') }}">
@endsection

@section('content')
<div class="detail-section">
    <div class="top-group">
        <h1 class="detail-title">{{ $job->genre['name'] }}</h1>
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
            {{ $job['content'] }}
        </p>
        <div class="job-group">
            <div class="job-wrapper first">
                <div class="job-item">
                    <label class="job-label">給料</label>
                    <p class="job-content">{{ $job['salary'] }}</p>
                </div>
                <div class="job-item">
                    <label class="job-label">勤務時間</label>
                    <p class="job-content"></p>{{ $job['time'] }}
                </div>
                <div class="job-item">
                    <label class="job-label">シフト</label>
                    <p class="job-content">{{ $job['shift'] }}</p>
                </div>
            </div>

            <div class="job-wrapper second">
                <div class="job-item">
                    <label class="job-label">店舗名</label>
                    <p class="job-content">{{ $job['name'] }}</p>
                </div>
                <div class="job-item">
                    <label class="job-label">勤務場所</label>
                    <p class="job-content">{{ $job['location'] }}</p>
                </div>
                <div class="job-item">
                    <label class="job-label">電話番号</label>
                    <p class="job-content">{{ $job['tel'] }}</p>
                </div>
                <div class="job-item">
                    <label class="job-label">メールアドレス</label>
                    <p class="job-content">{{ $job['email'] }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-group">
        <h2 class="question-header">質問箱</h2>
        <label class="question-label">[質問]</label>
        <p class="question-title"></p>
        <label class="question-label">[回答]</label>
        <p class="question-content"></p>
    </div>
</div>
@endsection