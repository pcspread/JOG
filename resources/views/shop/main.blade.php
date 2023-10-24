@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop/main.css') }}">
@endsection

@section('content')
<div class="main-section">
    <h1 class="main-title__name">ユーザー２様</h1>
    <div class="jobs-wrapper">
        <div class="job-card">
            <h2 class="job-name">コンサートスタッフ</h2>
            <p class="job-shop">店舗名：店舗A</p>
            <a class="job-detail" href="/shop/detail/1">求人詳細はこちら</a>
            <div class="job-count">
                <p class="access-count">訪問件数：50件</p>
                <p class="applicant-count">応募件数：3件</p>
            </div>
            <table class="applicant-table">
                <tr class="applicant-record">
                    <th class="applicant-title">ユーザー名</th>
                    <th class="applicant-title">メールアドレス</th>
                    <th class="applicant-title">性別</th>
                    <th class="applicant-title">年齢</th>
                    <th class="applicant-title"></th>
                </tr>
                @for ($i = 0; $i < 3; $i++)
                <tr class="applicant-record">
                    <td class="applicant-content">ユーザー１</td>
                    <td class="applicant-content">test@tentative.com</td>
                    <td class="applicant-content">男性</td>
                    <td class="applicant-content">17歳</td>
                    <td class="applicant-content">
                        <a class="applicant-button" href="">詳細</a>
                    </td>
                </tr>
                @endfor
            </table>
        </div>
    </div>
</div>
@endsection