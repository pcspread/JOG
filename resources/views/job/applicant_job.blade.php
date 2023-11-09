@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/job/applicant_job.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/job/applicant_job.js') }}" defer></script>
@endsection

@section('content')
<div class="applicant-section">
    <form class="applicant-form" action="/job/send/{{ $id }}" method="post" enctype="multipart/form-data">
    @csrf
        <h1 class="applicant-title">応募する</h1>
        <div class="applicant-item">
            <label class="applicant-item__title" for="image">証明写真(320px×240px)</label>
            <img class="applicant-item__image" src="{{ asset('img/applicant_img.png') }}" alt="照明写真">
            <input class="applicant-item__content image" type="file" name="image">
            <input class="applicant-item__image-select" type="button" value="画像を選択する">
            
            <p class="applicant-item__error">
                @error('image')
                    {{ $errors->first('image') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="name">氏名</label>
            <input class="applicant-item__content" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="例）山田太郎">
            <p class="applicant-item__error">
                @error('name')
                    {{ $errors->first('name') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="email">メールアドレス</label>
            <input class="applicant-item__content" id="email" type="text" name="email" value="{{ old('email') }}" placeholder="例）taro@example.com">
            <p class="applicant-item__error">
                @error('email')
                    {{ $errors->first('email') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title">性別</label>
            <select class="applicant-item__content" name="gender">
                <option class="applicant-item__option" value="男性" @if (old('gender') === '男性') selected @endif>男性</option>
                <option class="applicant-item__option" value="女性" @if (old('gender') === '女性') selected @endif>女性</option>
                <option class="applicant-item__option" value="その他" @if (old('gender') === 'その他') selected @endif>その他</option>
            </select>
            <p class="applicant-item__error">
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="age">年齢</label>
            <input class="applicant-item__content" id="age" type="text" name="age" value="{{ old('age') }}" placeholder="例）22">
            <p class="applicant-item__error">
                @error('age')
                    {{ $errors->first('age') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="tel">電話番号</label>
            <input class="applicant-item__content" id="tel" type="text" name="tel" value="{{ old('tel') }}" placeholder="例）01012345678">
            <p class="applicant-item__error">
                @error('tel')
                    {{ $errors->first('tel') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="postcode">郵便番号</label>
            <input class="applicant-item__content" id="postcode" type="text" name="postcode" value="{{ old('postcode') }}" placeholder="例）100-0014">
            <p class="applicant-item__error">
                @error('postcode')
                    {{ $errors->first('postcode') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="address">住所</label>
            <input class="applicant-item__content" id="address" type="text" name="address" value="{{ old('address') }}" placeholder="例）東京都千代田区永田町1丁目">
            <p class="applicant-item__error">
                @error('address')
                    {{ $errors->first('address') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="building">建物の名前</label>
            <input class="applicant-item__content" id="building" type="text" name="building" value="{{ old('building') }}" placeholder="例）コーポ11">
            <p class="applicant-item__error">
                @error('building')
                    {{ $errors->first('building') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="reason">志望動機</label>
            <textarea class="applicant-item__content textarea" name="reason" id="reason" cols="30" rows="7" placeholder="例）以前にコンサートスタッフを経験したことがあり、コンサートスタッフに興味があるからです。">{{ old('reason') }}</textarea>
            <p class="applicant-item__error">
                @error('reason')
                    {{ $errors->first('reason') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="appeal">アピール内容</label>
            <textarea class="applicant-item__content textarea" name="appeal" id="appeal" cols="30" rows="7" placeholder="例）長時間の立ち仕事に耐えられる体力があります。">{{ old('appeal') }}</textarea>
            <p class="applicant-item__error">
                @error('appeal')
                    {{ $errors->first('appeal') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="experience">アルバイト経験</label>
            <textarea class="applicant-item__content textarea" name="experience" id="experience" cols="30" rows="7" placeholder="例）コンサートスタッフ2回">{{ old('experience') }}</textarea>
            <p class="applicant-item__error">
                @error('experience')
                    {{ $errors->first('experience') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="question">質問内容</label>
            <textarea class="applicant-item__content textarea" name="question" id="question" cols="30" rows="7" placeholder="例）給料の支払日を教えていただきたいです。">{{ old('question') }}</textarea>
            <p class="applicant-item__error">
                @error('question')
                    {{ $errors->first('question') }}
                @enderror
            </p>
        </div>
        <div class="applicant-buttons">
            <button class="applicant-button" onClick="return confirmApplicant()">応募する</button>
            <a class="applicant-click" href="/job/detail/{{ $id }}">戻る</a>
        </div>
    </form>
</div>
@endsection