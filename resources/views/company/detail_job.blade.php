@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/company/detail_job.css') }}">
@endsection

@section('content')
<div class="detail-section">
    <div class="top-group">
        <h1 class="detail-title">{{ $job->genre['name'] }}</h1>
        <div class="detail-buttons">
            <a class="detail-edit" href="/company/detail/{{ $job['id'] }}/edit">修正する</a>
            <a class="detail-back" href="/company">戻る</a>
        </div>
    </div>
    <div class="bottom-group">
        <p class="job-description">{{ $job['content'] }}</p>
        <div class="job-group">
            <div class="job-wrapper first">
                <div class="job-item">
                    <label class="job-label">給料</label>
                    <p class="job-content">{{ $job['salary'] }}</p>
                </div>
                <div class="job-item">
                    <label class="job-label">勤務時間</label>
                    <p class="job-content">{{ $job['time'] }}</p>
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
</div>
@endsection