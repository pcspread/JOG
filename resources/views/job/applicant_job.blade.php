@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/job/applicant_job.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/job/job_applicant.js') }}" defer></script>
@endsection

@section('content')
<div class="applicant-section">
    <form class="applicant-form">
        <h1 class="applicant-title">応募する</h1>
        <div class="applicant-item">
            <label class="applicant-item__title" for="image">証明写真(320px×240px)</label>
            <img class="applicant-item__image" src="{{ asset('img/applicant_img.png') }}" alt="照明写真">
            <input class="applicant-item__content image" id="image" type="file" name="image" value="{{ old('image') }}" placeholder="入力欄">
            <input class="applicant-item__image-select" id="name" type="button" value="画像を選択する">
            
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="name">氏名</label>
            <input class="applicant-item__content" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="email">メールアドレス</label>
            <input class="applicant-item__content" id="email" type="text" name="email" value="{{ old('email') }}" placeholder="入力欄" readonly>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title">性別</label>
            <select class="applicant-item__content" name="gender">
                <option class="applicant-item__option" value="mail">男性</option>
                <option class="applicant-item__option" value="femail">女性</option>
                <option class="applicant-item__option" value="other">その他</option>
            </select>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="age">年齢</label>
            <input class="applicant-item__content" id="age" type="text" name="age" value="{{ old('age') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="tel">電話番号</label>
            <input class="applicant-item__content" id="tel" type="text" name="tel" value="{{ old('tel') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="postcode">郵便番号</label>
            <input class="applicant-item__content" id="postcode" type="text" name="postcode" value="{{ old('postcode') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="address">住所</label>
            <input class="applicant-item__content" id="address" type="text" name="address" value="{{ old('address') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="building">建物の名前</label>
            <input class="applicant-item__content" id="building" type="text" name="building" value="{{ old('building') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="reason">志望動機</label>
            <textarea class="applicant-item__content textarea" name="reason" id="reason" cols="30" rows="7" placeholder="入力欄">{{ old('reason') }}</textarea>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="appeal">アピール内容</label>
            <textarea class="applicant-item__content textarea" name="appeal" id="appeal" cols="30" rows="7" placeholder="入力欄">{{ old('appeal') }}</textarea>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="experience">アルバイト経験</label>
            <textarea class="applicant-item__content textarea" name="experience" id="experience" cols="30" rows="7" placeholder="入力欄">{{ old('experience') }}</textarea>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="question">質問内容</label>
            <textarea class="applicant-item__content textarea" name="question" id="question" cols="30" rows="7" placeholder="入力欄">{{ old('question') }}</textarea>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-buttons">
            <button class="applicant-button">応募する</button>
            <a class="applicant-click" href="/job/detail/1">戻る</a>
        </div>
    </form>
</div>
@endsection