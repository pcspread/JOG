@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/job/mypage.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/job/mypage.js') }}" defer></script>
@endsection

@section('content')
<div class="mypage-section">
    <h1 class="mypage-title">マイページ</h1>
    <div class="mypage__group-wrapper">
        <div class="mypage__group">
            <h2 class="group-title">お気に入り</h2>
            <div class="group-cards">
                @foreach ($favorites as $favorite)
                <div class="group-card">
                    <h3 class="group-genre">{{ $favorite->genre['name'] }}</h3>
                    <p class="group-name">{{ $favorite['name'] }}</p>
                    <p class="group-location">{{ $favorite->area['name'] }}</p>
                    <p class="group-salary">{{ $favorite['salary'] }}</p>
                    <a class="group-click" href="/job/detail/{{ $favorite['id'] }}"></a>
                </div>
                @endforeach
                @if (count($favorites) === 0)
                <div class="not-card">
                    お気に入り情報がございません
                </div>
                @endif
            </div>
        </div>
        <div class="mypage__group">
            <h2 class="group-title">応募中</h2>
            <div class="group-cards">
                @foreach ($applicants as $applicant)
                <div class="group-card">
                    <h3 class="group-genre">{{ $applicant->genre['name'] }}</h3>
                    <p class="group-name">{{ $applicant['name'] }}</p>
                    <p class="group-location">{{ $applicant->area['name'] }}</p>
                    <p class="group-salary">{{ $applicant['salary'] }}</p>
                    <a class="group-click" href="/job/detail/{{ $applicant['id'] }}"></a>
                </div>
                @endforeach
                @if (count($applicants) === 0)
                <div class="not-card">
                    応募情報がございません
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection