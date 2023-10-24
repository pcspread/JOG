@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/job/mypage.css') }}">
@endsection

@section('content')
<div class="mypage-section">
    <h1 class="mypage-title">ユーザー１様</h1>
    <div class="mypage__group-wrapper">
        <div class="mypage__group">
            <h2 class="group-title">お気に入り</h2>
            <div class="group-cards">
                @for ($i = 0; $i < 4; $i++)
                <div class="group-card">
                    <h3 class="group-genre">コンサートスタッフ</h3>
                    <p class="group-name">店舗A</p>
                    <p class="group-location">東京都</p>
                    <p class="group-salary">時給1000～1500円</p>
                    <a class="group-click" href="/job/detail/1"></a>
                </div>
                @endfor
            </div>
        </div>
        <div class="mypage__group">
            <h2 class="group-title">応募中</h2>
            <div class="group-cards">
                @for ($s = 0; $s < 4; $s++)
                <div class="group-card">
                    <h3 class="group-genre">コンサートスタッフ</h3>
                    <p class="group-name">店舗A</p>
                    <p class="group-location">東京都</p>
                    <p class="group-salary">時給1000～1500円</p>
                    <a class="group-click" href="/job/detail/1"></a>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection