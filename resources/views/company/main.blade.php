@php
use App\Models\Applicant;
@endphp

@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/company/main.css') }}">
@endsection

@section('content')
<div class="main-section">
    <div class="main-title__group">
        <h1 class="main-title__name">メインページ</h1>
        <a class="main-title__button" href="/company/create">求人を出す</a>
    </div>
    
    <div class="jobs-wrapper">
        @foreach ($jobs as $job)
        <div class="job-card">
            <h2 class="job-name">{{ $job->genre['name'] }}</h2>
            <p class="job-company">企業名：{{ $job['name'] }}</p>
            <a class="job-detail" href="/company/detail/{{ $job['id'] }}">求人詳細はこちら</a>
            <div class="job-count">
                <p class="access-count">ログインユーザー訪問件数：{{ $job['visit'] }}件</p>
                <p class="applicant-count">応募件数：{{ count(Applicant::where('job_id', $job['id'])->get()) }}件</p>
            </div>
            @if (count(Applicant::where('job_id', $job['id'])->get()) > 0)
            <table class="applicant-table">
                <tr class="applicant-record">
                    <th class="applicant-title">ユーザー名</th>
                    <th class="applicant-title">メールアドレス</th>
                    <th class="applicant-title">性別</th>
                    <th class="applicant-title">年齢</th>
                    <th class="applicant-title"></th>
                </tr>
                @foreach (Applicant::where('job_id', $job['id'])->orderBy('created_at', 'desc')->get() as $applicant)
                <tr class="applicant-record">
                    <td class="applicant-content">{{ $applicant['name'] }}</td>
                    <td class="applicant-content">{{ $applicant['email'] }}</td>
                    <td class="applicant-content">{{ $applicant['gender'] }}</td>
                    <td class="applicant-content">{{ $applicant['age'] }}歳</td>
                    <td class="applicant-content">
                        <a class="applicant-button" href="/company/list/{{ $applicant['id'] }}">詳細</a>
                    </td>
                </tr>
                @endforeach
            </table>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection