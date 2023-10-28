@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/company/create_job.css') }}">
@endsection

@section('content')
<div class="applicant-section">
    <form class="applicant-form" action="/company/create" method="POST">
    @csrf
        <h1 class="applicant-title">求人を出す</h1>
        <div class="applicant-item">
            <label class="applicant-item__title">ジャンル</label>
            <select class="applicant-item__content" name="genre_id">
                @foreach ($genres as $genre)
                <option class="applicant-item__option" value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                @endforeach
            </select>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="new_genre">ジャンル(上記に無いジャンルの場合)</label>
            <input class="applicant-item__content" id="new_genre" type="text" name="new_genre" value="{{ old('new_genre') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('new_genre')
                    {{ $errors->first('new_genre') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title">勤務地</label>
            <select class="applicant-item__content" name="area_id">
                @foreach ($areas as $area)
                <option class="applicant-item__option" value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                @endforeach
            </select>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="name">企業名</label>
            <input class="applicant-item__content" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('name')
                    {{ $errors->first('name') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="content">仕事の内容</label>
            <textarea class="applicant-item__content textarea" name="content" id="content" cols="30" rows="7" placeholder="入力欄">{{ old('content') }}</textarea>
            <p class="applicant-item__error">
                @error('content')
                    {{ $errors->first('content') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="email">メールアドレス</label>
            <input class="applicant-item__content" id="email" type="text" name="email" value="{{ old('email') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('email')
                    {{ $errors->first('email') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="tel">電話番号</label>
            <input class="applicant-item__content" id="tel" type="text" name="tel" value="{{ old('tel') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('tel')
                    {{ $errors->first('tel') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="salary">給料</label>
            <input class="applicant-item__content" id="salary" type="text" name="salary" value="{{ old('salary') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('salary')
                    {{ $errors->first('salary') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="time">勤務時間</label>
            <input class="applicant-item__content" id="time" type="text" name="time" value="{{ old('time') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('time')
                    {{ $errors->first('time') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="shift">シフト</label>
            <input class="applicant-item__content" id="shift" type="text" name="shift" value="{{ old('shift') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('shift')
                    {{ $errors->first('shift') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="location">勤務場所</label>
            <input class="applicant-item__content" id="location" type="text" name="location" value="{{ old('location') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('location')
                    {{ $errors->first('location') }}
                @enderror
            </p>
        </div>
        <div class="applicant-buttons">
            <button class="applicant-button">作成する</button>
            <a class="applicant-button back" href="/company">戻る</a>
        </div>
    </form>
</div>
@endsection