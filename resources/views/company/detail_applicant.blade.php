@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/company/detail_applicant.css') }}">
@endsection

@section('content')
<div class="applicant-section">
    <div class="top-wrapper">
        <div class="left-group">
            <div class="left-group__top-block">
                <h1 class="applicant-name">中山太郎</h1>
                <div class="top-block__buttons">
                    @if (is_null($applicant['result']))
                    <form class="top-block__form" action="/company/list/{{ $applicant['job_id'] }}" method="POST">
                    @csrf
                        <button class="top-block__button success" name="result" value="success">通過</button>
                        <button class="top-block__button failure" name="result" value="failure">断る</button>
                    </form>
                    @endif
                    <a class="top-block__button back" href="/company">戻る</a>
                </div>
            </div>
            <img class="applicant-image" src="@if (Auth::user()['image']) {{ asset('storage/' . Auth::user()['image']) }} @else {{ asset('img/applicant_img.png') }} @endif" alt="証明写真">
            <div class="applicant-item reason">
                <label class="applicant-title">志望動機</label>
                <p class="applicant-content">{{ $applicant['reason'] }}</p>
            </div>
        </div>

        <div class="right-group">
            <div class="right-group__wrapper">
                <div class="right-group__left-block">
                    <div class="applicant-item">
                        <label class="applicant-title">メールアドレス</label>
                        <p class="applicant-content">{{ Auth::user()['email'] }}</p>
                    </div>
                    <div class="applicant-item">
                        <label class="applicant-title">電話番号</label>
                        <p class="applicant-content">{{ Auth::user()['tel'] }}</p>
                    </div>
                    <div class="applicant-item">
                        <label class="applicant-title">性別</label>
                        <p class="applicant-content">{{ Auth::user()['gender'] }}</p>
                    </div>
                    <div class="applicant-item">
                        <label class="applicant-title">年齢</label>
                        <p class="applicant-content">{{ Auth::user()['age'] }}</p>
                    </div>
                </div>
                <div class="right-gropu__right-block">
                    <div class="applicant-item">
                        <label class="applicant-title">郵便番号</label>
                        <p class="applicant-content">{{ Auth::user()['postcode'] }}</p>
                    </div>
                    <div class="applicant-item">
                        <label class="applicant-title">住所</label>
                        <p class="applicant-content">{{ Auth::user()['address'] }}</p>
                    </div>
                    <div class="applicant-item">
                        <label class="applicant-title">建物の名前</label>
                        <p class="applicant-content">{{ Auth::user()['building'] }}</p>
                    </div>
                </div>
            </div>
            <div class="applicant-item appeal">
                <label class="applicant-title">アピール内容</label>
                <p class="applicant-content">{{ empty($applicant['appeal']) ? '特になし' : $applicant['appeal'] }}</p>
            </div>
            <div class="applicant-item experience">
                <label class="applicant-title">アルバイト経験</label>
                <p class="applicant-content">{{ empty($applicant['experience']) ? '特になし' : $applicant['experience'] }}</p>
            </div>
        </div>
    </div>
    @if (!empty($applicant['question']))
    <div class="bottom-wrapper">
        <form class="bottom-wrapper__form" action="/company/list/{{ $applicant['job_id'] }}" method="POST">
        @method('patch')
        @csrf
            <label class="bottom-wrapper__title" for="answer">質問内容</label>
            <p class="bottom-wrapper-content">{{ $applicant['question'] }}</p>
            <textarea class="bottom-wrapper__input" name="answer" id="answer" cols="60" rows="3" placeholder="入力欄">{{ $applicant['answer'] }}</textarea>
            <p class="bottom-wrapper-error">
            @error('answer')
                {{ $errors->first('answer') }}
            @enderror
            </p>
            <button class="bottom-wrapper__button">返信する</button>
        </form>
    </div>
    @endif
</div>
@endsection