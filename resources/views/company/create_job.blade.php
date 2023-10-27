@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/company/create_job.css') }}">
@endsection

@section('content')
<div class="applicant-section">
    <form class="applicant-form">
        <h1 class="applicant-title">求人を出す</h1>
        <div class="applicant-item">
            <label class="applicant-item__title">ジャンル</label>
            <select class="applicant-item__content" name="gender">
                <option class="applicant-item__option" value="mail">コンサートスタッフ</option>
                <option class="applicant-item__option" value="femail">イベントスタッフ</option>
            </select>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="new_genre">ジャンル(上記に無いジャンルの場合)</label>
            <input class="applicant-item__content" id="new_genre" type="text" name="new_genre" value="{{ old('new_genre') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title">勤務地</label>
            <select class="applicant-item__content" name="gender">
                <option class="applicant-item__option" value="mail">千代田区</option>
                <option class="applicant-item__option" value="femail">渋谷区</option>
            </select>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="name">企業名</label>
            <input class="applicant-item__content" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="content">仕事の内容</label>
            <textarea class="applicant-item__content textarea" name="content" id="content" cols="30" rows="7" placeholder="入力欄">{{ old('content') }}</textarea>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="email">メールアドレス</label>
            <input class="applicant-item__content" id="email" type="text" name="email" value="{{ old('email') }}" placeholder="入力欄" readonly>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="tel">電話番号</label>
            <input class="applicant-item__content" id="tel" type="text" name="tel" value="{{ old('tel') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="salary">給料</label>
            <input class="applicant-item__content" id="salary" type="text" name="salary" value="{{ old('salary') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="time">勤務時間</label>
            <input class="applicant-item__content" id="time" type="text" name="time" value="{{ old('time') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="shift">シフト</label>
            <input class="applicant-item__content" id="shift" type="text" name="shift" value="{{ old('shift') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="location">勤務場所</label>
            <input class="applicant-item__content" id="location" type="text" name="location" value="{{ old('location') }}" placeholder="入力欄">
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-buttons">
            <button class="applicant-button">応募する</button>
            <button class="applicant-button back" onclick="history.back(); return false;">戻る</button>
        </div>
    </form>
</div>
@endsection