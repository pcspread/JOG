@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/job/jobs.css') }}">
@endsection

@section('content')
<div class="jobs-section">
    <div class="search-group">
        <div class="jobs-title">
            <h1 class="jobs-title__text">求人を探す</h1>
        </div>
        <div class="jobs-search">
            <form class="search-form" action="">
                <select class="search-select" name="location">
                    <option class="search-option" value="">千代田区</option>
                    <option class="search-option" value="">中央区</option>
                    <option class="search-option" value="">港区</option>
                    <option class="search-option" value="">新宿区</option>
                    <option class="search-option" value="">文京区</option>
                    <option class="search-option" value="">台東区</option>
                    <option class="search-option" value="">墨田区</option>
                    <option class="search-option" value="">江東区</option>
                    <option class="search-option" value="">品川区</option>
                    <option class="search-option" value="">目黒区</option>
                    <option class="search-option" value="">大田区</option>
                    <option class="search-option" value="">世田谷区</option>
                    <option class="search-option" value="">渋谷区</option>
                    <option class="search-option" value="">中野区</option>
                    <option class="search-option" value="">杉並区</option>
                    <option class="search-option" value="">豊島区</option>
                    <option class="search-option" value="">北区</option>
                    <option class="search-option" value="">荒川区</option>
                    <option class="search-option" value="">板橋区</option>
                    <option class="search-option" value="">練馬区</option>
                    <option class="search-option" value="">足立区</option>
                    <option class="search-option" value="">葛飾区</option>
                    <option class="search-option" value="">江戸川区</option>
                </select>
                <select class="search-select" name="genre">
                    <option class="search-option" value="">コンサートスタッフ</option>
                    <option class="search-option" value="">カフェ</option>
                </select>
                <input class="search-input" type="text" value="{{ Auth::id() }}">
                <button class="search-button">検索</button>
                <a class="search-click" href="/jobs">✖</a>
            </form>
        </div>
    </div>
    <div class="jobs-content">
        @for ($i = 0; $i < 35; $i++)
        <div class="jobs-card">
            <h2 class="job-name">コンサートスタッフ</h2>
            <p class="job-campany">カンパニーA</p>
            <p class="job-location">東京都</p>
            <p class="job-description">時給1000～1500円</p>
            <a class="job-click" href="/job/detail/1"></a>
        </div>
        @endfor
    </div>
</div>
@endsection