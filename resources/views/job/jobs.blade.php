@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/job/jobs.css') }}">
@endsection

@section('content')ｓ
<div class="jobs-section">
    <div class="search-group">
        <div class="jobs-title">
            <h1 class="jobs-title__text">求人を探す</h1>
        </div>
        <div class="jobs-search">
            <form class="search-form" action="/jobs" method="POST">
            @csrf
                <select class="search-select area" name="area">
                    <option class="search-option" value="">エリア</option>
                    @foreach ($areas as $area)
                    <option class="search-option" value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                    @endforeach
                </select>
                <select class="search-select genre" name="genre">
                    <option class="search-option" value="">ジャンル</option>
                    @foreach ($genres as $genre)
                    <option class="search-option" value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                    @endforeach
                </select>
                <!-- <input class="search-input" type="text" value="{{ Auth::id() }}"> -->
                <button class="search-button">検索</button>
                <a class="search-click" href="/jobs/reset">✖</a>
            </form>
        </div>
    </div>
    
    <div class="jobs-content">
        @foreach (session('jobs') as $job)
        <div class="jobs-card">
            <h2 class="job-name">{{ $job->genre['name'] }}</h2>
            <p class="job-campany">{{ $job['name'] }}</p>
            <p class="job-area">{{ $job->area['name'] }}</p>
            <p class="job-salary">{{ $job['salary'] }}</p>
            <a class="job-click" href="/job/detail/{{ $job['id'] }}"></a>
        </div>
        @endforeach
        @if (count(session('jobs')) === 0)
        <div class="nothing-cards">
            求人情報がございません
        </div>
        @endif
    </div>
</div>
@endsection