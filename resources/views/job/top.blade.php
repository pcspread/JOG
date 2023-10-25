@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/job/top.css') }}">
@endsection

@section('content')
    <div class="top-section">
        <a class="top-button" href="/jobs">求人を探す</a>
        <a class="top-button" href="/company">求人を出す</a>
    </div>
@endsection