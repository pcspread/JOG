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
                    <form class="top-block__form" action="">
                        <button class="top-block__button success">通過</button>
                    </form>
                    <form class="top-block__form" action="">
                        <button class="top-block__button failure">断る</button>
                    </form>
                    <a class="top-block__button back" href="/company">戻る</a>
                </div>
            </div>
            <img class="applicant-image" src="{{ asset('img/applicant_img.png') }}" alt="証明写真">
            <div class="applicant-item reason">
                <label class="applicant-title">志望動機</label>
                <p class="applicant-content">    
                    以前も何度かコンサートスタッフを行ったことがあり、コンサートスタッフの経験があります。今回のスタッフの内容を見て、ぜひとも働きたいと思ったので、応募しました。
                </p>
            </div>
        </div>

        <div class="right-group">
            <div class="right-group__wrapper">
                <div class="right-group__left-block">
                    <div class="applicant-item">
                        <label class="applicant-title">メールアドレス</label>
                        <p class="applicant-content">test@test.com</p>
                    </div>
                    <div class="applicant-item">
                        <label class="applicant-title">電話番号</label>
                        <p class="applicant-content">08011112222</p>
                    </div>
                    <div class="applicant-item">
                        <label class="applicant-title">性別</label>
                        <p class="applicant-content">男性</p>
                    </div>
                    <div class="applicant-item">
                        <label class="applicant-title">年齢</label>
                        <p class="applicant-content">17歳</p>
                    </div>
                </div>
                <div class="right-gropu__right-block">
                    <div class="applicant-item">
                        <label class="applicant-title">郵便番号</label>
                        <p class="applicant-content">111-1111</p>
                    </div>
                    <div class="applicant-item">
                        <label class="applicant-title">住所</label>
                        <p class="applicant-content">東京都新宿区西新宿111</p>
                    </div>
                    <div class="applicant-item">
                        <label class="applicant-title">建物の名前</label>
                        <p class="applicant-content">パークサイドビル1F</p>
                    </div>
                </div>
            </div>
            <div class="applicant-item appeal">
                <label class="applicant-title">アピール内容</label>
                <p class="applicant-content">コンサートスタッフの経験が多数あるため、その経験を生かして、ばりばり働きますので、よろしくお願いいたします。</p>
            </div>
            <div class="applicant-item experience">
                <label class="applicant-title">アルバイト経験</label>
                <p class="applicant-content">コンサートスタッフのアルバイトを3回行いました。準備～運営、片付けまで経験しています。</p>
            </div>
        </div>
    </div>
    <div class="bottom-wrapper">
        <form class="bottom-wrapper__form" action="">
            <label class="bottom-wrapper__title" for="question">質問内容</label>
            <p class="bottom-wrapper-content">シフトの変更はしやすいですか？</p>
            <textarea class="bottom-wrapper__input" name="question" id="question" cols="60" rows="3" placeholder="入力欄"></textarea>
            <button class="bottom-wrapper__button">返信する</button>
        </form>
    </div>
</div>
@endsection